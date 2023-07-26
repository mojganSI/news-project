<?php

namespace Activities\Admin;

use Database\Database;

class User extends Admin
{

    public function index()
    {
        $db = new Database();
        $users = $db->select('SELECT * FROM users')->fetchAll();
        require_once BASE_PATH . '/template/admin/user/index.php';
    }

    public function delete($id)

    {
        $db = new Database();
        $db->delete('users', $id);
        $this->redirectBack();
    }


    public function edit($id)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/user/edit.php';
    }

    public function update($request, $id)
    {
        $db = new Database();
        $request = [
            'username' => $request['username'],
            'permission' => $request['permission']];
        $db->update('users', $id, array_keys($request), $request);
        $this->redirect('admin/user');
    }


    public function adminOrUser($id)
    {
        $db = new Database();
        $user = $db->select('SELECT * FROM users WHERE id = ?', [$id])->fetch();
        if (empty($user)) {
            $this->redirectBack();
        }
        if ($user['permission'] == 'admin') {
            $db->update('users', $id, ['permission'], ['user']);
            $response = ['status' => 'success', 'code' => 200, 'data' => 'user'];
            $response = json_encode($response);
            // echo $response;
        } else {
            $db->update('users', $id, ['permission'], ['admin']);
            $response = ['status' => 'success', 'code' => 200, 'data' => 'admin'];
            $response = json_encode($response);
            // echo $response;
        }
        $this->redirectBack();
    }
}
