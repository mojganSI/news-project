<?php

namespace Activities\Auth;

use Database\Database;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Auth
{

    protected function redirect($url)
    {
        header("Location: " . trim(CURRENT_DOMAIN, '/ ') . '/' . trim($url, '/ '));
        exit;
    }

    protected function redirectBack()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    private function hash($password)
    {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        return $hashPassword;
    }

    private function random()
    {
        return bin2hex(openssl_random_pseudo_bytes(32));
    }

    private function activationMessage($username, $verifyToken)
    {
        $message = '<h1>فعال سازی حساب کاریری</h1>
        <p>' . $username . 'عزیز برای فعال سازی حساب کاریری خود روی لینک زیر کلیک نمایید</p>
        <a href="' . url('activation/' . $verifyToken) . '">فعال سازی</a>';
        return $message;
    }

    private function resetPasswordMessage($email, $verifyToken)
    {
        $message = '<h1>reset Password</h1>
        <p>' . $email . ' click here</p>
        <a href="' . url('reset-password/' . $verifyToken) . '">reset</a>';
        return $message;
    }

    public function sendMail($emailAddress, $subject, $body)
    {

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->CharSet       = 'UTF-8';                     //Set the SMTP server to send through
            $mail->Host = MAIL_HOST;                     //Set the SMTP server to send through
            $mail->SMTPAuth = SMTP_AUTH;                                   //Enable SMTP authentication
            $mail->Username = MAIL_USERNAME;                     //SMTP username
            $mail->Password   = MAIL_PASSWORD;                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = MAIL_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(SENDER_MAIL, SENDER_NAME);
            $mail->addAddress($emailAddress);     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }

    public function register()
    {
        require_once BASE_PATH . '/template/auth/register.php';
    }

    public function registerStore($request)
    {
        if (empty($request['email']) || empty($request['password']) || empty($request['username'])) {
            flash('register_error', 'تمامی فیلد ها الزامی میباشند');
            $this->redirectBack();
        } else if (strlen($request['password']) < 8) {
            flash('register_error', 'رمز عبور نباید کمتر از ۸ کاراکتر باشد');
            $this->redirectBack();
        } else if (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            flash('register_error', 'ایمیل وارد شده صحیح نیست');
            $this->redirectBack();
        } else {
            $db = new Database();
            $user = $db->select('SELECT * FROM users WHERE email = ?', [$request['email']])->fetch();
            if ($user != null) {
                flash('register_error', 'ایمیل وارد شده تکراری میباشد');
                $this->redirectBack();
            } else {
                $randomToken = $this->random();
                $activationMessage = $this->activationMessage($request['username'], $randomToken);
                $result = $this->sendMail($request['email'], 'ایمیل فعال سازی', $activationMessage);
                if ($result) {
                    $request['verify_token'] = $randomToken;
                    $request['verify_token'] = date('Y-m-d H:i:s', strtotime('+1 day'));
                    $request['password'] = $this->hash($request['password']);
                    $db->insert('users', array_keys($request), $request);
                    $this->redirect('login');
                } else {
                    flash('register_error', 'فرایند ارسال ایمیل با خطا مواجه شد');
                    $this->redirectBack();
                }
            }
        }
    }

    public function activation($verify_token)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE `verify_token` = ?", [$verify_token])->fetch();
        if ($user == null) {
            flash('activation_error', 'کاربری یافت نشد');
            $this->redirect('register');
        } else {
            $db->update('users', $user['id'], ['is_active'], [1]);
            $this->redirect('login');
        }
    }


    public function login()
    {
        require_once BASE_PATH . '/template/auth/login.php';
    }


    public function forgetPassword()
    {
        require_once BASE_PATH . '/template/auth/forget-password.php';
    }


    public function resetPassword($forgot_token)

    {
        require_once BASE_PATH . '/template/auth/reset-password.php';
    }


    public function resetPasswordStore($request, $forgot_token)

    {
        
        if (empty($request['password'])) {
            flash('reset_error', 'all fields are required');
            $this->redirectBack();
        } else if (strlen($request['password']) < 8) {
            flash('reset_error', 'password must be at least 8 characters');
            $this->redirectBack();
        } else {
            $db = new Database();
            $user = $db->select('SELECT * FROM users WHERE `forgot_token` = ? ',[$forgot_token])->fetch();          
            if ($user == null) {
                flash('reset_error', 'user not found');
                $this->redirectBack();
            } else if ($user['forgot_token_expire'] < date('Y-m-d H:i:s')) {
                flash('reset_error', 'token expired');
                $this->redirectBack();
            } else {
                $request['password'] = $this->hash($request['password']);
                $db->update('users', $user['id'], ['password'], [$request['password']]);
                $this->redirect('login');
            }
        }
    }
   
    public function forgetPasswordStore($request)
    {
        if (empty($request['email'])) {
            flash('forget_error', 'all fields are required');
            $this->redirectBack();
        } else if (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            flash('forget_error', 'email is not valid');
            $this->redirectBack();
        } else {
            $db = new Database();
            $user = $db->select('SELECT * FROM users WHERE email = ?', [$request['email']])->fetch();
            if ($user == null) {
                flash('forget_error', 'user not found');
                $this->redirectBack();
            } else {
                $randomForgetToken = $this->random();
                $resetPasswordMessage = $this->resetPasswordMessage($request['email'], $randomForgetToken);
                $result = $this->sendMail($request['email'], 'reset', $resetPasswordMessage);
                if ($result) {
                    $request['forgot_token'] = $randomForgetToken;
                    $request['forgot_token_expire'] = date('Y-m-d H:i:s', strtotime('+1 day'));
                    $db->update('users', $user['id'],array_keys($request), $request);
                    $this->redirect('login');
                } else {
                    flash('forget_error', 'error in sending email');
                    $this->redirectBack();
                }
            }
        }
    }
    


    public function loginStore($request)
    {
        if (empty($request['email']) || empty($request['password'])) {
            flash('login_error', 'تمامی فیلد ها الزامی میباشند');
            $this->redirect('login');
        } else {
            $db = new Database();
            $user = $db->select('SELECT * FROM users WHERE `email` = ?', [$request['email']])->fetch();
            if ($user != null) {
                if (password_verify($request['password'], $user['password']) && $user['is_active'] == 1) {
                    $_SESSION['user'] = $user['id'];
                    $this->redirect('admin/category');
                } else {
                    flash('login_error', 'رمز عبور یا ایمیل نامعتبر است');
                    $this->redirect('login');
                }
            } else {
                flash('login_error', 'رمز عبور یا ایمیل نامعتبر است');
                $this->redirect('login');
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
        }
        $this->redirect('login');
    }
}
