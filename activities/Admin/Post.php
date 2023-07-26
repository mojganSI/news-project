<?php

namespace Activities\Admin;

use Database\Database;

class Post extends Admin
{

    public function index()
    {
        $db = new Database();
        $posts = $db->select('SELECT posts.*, users.username as user_name, categories.name as title FROM posts LEFT JOIN users ON posts.user_id = users.id LEFT JOIN categories ON posts.cat_id = categories.id')->fetchAll();
        require_once BASE_PATH . '/template/admin/post/index.php';
    }

    public function create()
    {
        $db = new Database();
        $categories = $db->select('SELECT * FROM categories')->fetchAll();
        require_once BASE_PATH . '/template/admin/post/create.php';
    }

    public function store($request)
    {
        // date_default_timezone_set("Asia/Tehran");
        $realTime = substr($request['published_at'], 0, 10);
        $request['published_at'] = date("Y-m-d H:i:s", (int)$realTime);
        $db = new Database();
        if ($request['cat_id'] != null) {
            $request['image'] = $this->saveImage($request['image'], 'post-images');
            if ($request['image']) {
                $request = array_merge($request, ['user_id' => $_SESSION['user']]);
                $db->insert('posts', array_keys($request), $request);
                $this->redirect('admin/post');
            } else {
                $this->redirectBack();
            }
        } else {
            $this->redirectBack();
        }
    }

    public function edit($id)
    {
        $db = new Database();
        $categories = $db->select('SELECT * FROM categories')->fetchAll();
        $post = $db->select("SELECT * FROM posts WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/post/edit.php';
    }

    public function update($request, $id)
    {
        // date_default_timezone_set("Asia/Tehran");
        $realTime = substr($request['published_at'], 0, 10);
        $request['published_at'] = date("Y-m-d H:i:s", (int)$realTime);
        $db = new Database();
        if ($request['cat_id'] != null) {
            if ($request['image']['tmp_name'] != null) {
                $post = $db->select('SELECT * FROM posts WHERE id = ?', [$id])->fetch();
                $this->removeImage($post['image']);
                $request['image'] = $this->saveImage($request['image'], 'post-images');
            } else {
                unset($request['image']);
            }
            $db->update('posts', $id, array_keys($request), $request);
            $this->redirect('admin/post');
        } else {
            $this->redirectBack();
        }
    }

    public function delete($id)
    {
        $db = new Database();
        $post = $db->select('SELECT * FROM posts WHERE id = ?', [$id])->fetch();
        // $this->removeImage($post['image']);
        $db->delete('posts', $id);
       
    }

    public function breakingNews($id)
    {

        header('Access-Control-Allow-Origin: *');

        header('Access-Control-Allow-Methods: GET, POST');

        header("Access-Control-Allow-Headers: X-Requested-With");
        $db = new Database();
        $post = $db->select('SELECT * FROM posts WHERE id = ?', [$id])->fetch();
        if (empty($post)) {
            $response = ['status' => 'failed', 'code' => 404];
            $response = json_encode($response);
            echo $response;

            // $this->redirectBack();
        } else {
            if ($post['breaking_news'] == 1) {
                $db->update('posts', $id, ['breaking_news'], [2]);
                $response = ['status' => 'success', 'code' => 200, 'data' => 2];
                $response = json_encode($response);
                echo $response;
            } else {
                $db->update('posts', $id, ['breaking_news'], [1]);
                $response = ['status' => 'success', 'code' => 200, 'data' => 1];
                $response = json_encode($response);
                echo $response;
            }
        }
    }



    public function selected($id)
    {

        header('Access-Control-Allow-Origin: *');

        header('Access-Control-Allow-Methods: GET, POST');

        header("Access-Control-Allow-Headers: X-Requested-With");
        $db = new Database();
        $post = $db->select('SELECT * FROM posts WHERE id = ?', [$id])->fetch();
        if (empty($post)) {
            $response = ['status' => 'failed', 'code' => 404];
            $response = json_encode($response);
            echo $response;

            // $this->redirectBack();
        } else {
            if ($post['selected'] == 1) {
                $db->update('posts', $id, ['selected'], [2]);
                $response = ['status' => 'success', 'code' => 200, 'data' => 2];
                $response = json_encode($response);
                echo $response;
            } else {
                $db->update('posts', $id, ['selected'], [1]);
                $response = ['status' => 'success', 'code' => 200, 'data' => 1];
                $response = json_encode($response);
                echo $response;
            }
        }
    }

}
