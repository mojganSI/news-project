<?php

namespace Activities\Admin;

use Database\Database;

class Category extends Admin
{

    public function index()
    {
        $db = new Database();
        $categories = $db->select('SELECT * FROM categories')->fetchAll();
        require_once BASE_PATH . '/template/admin/category/index.php';
    }

    public function create()
    {
        require_once BASE_PATH . '/template/admin/category/create.php';
    }

    public function store($request)
    {
        $titlePattern = "/^[a-zA-Z ]+$/";
        $db = new Database();
        if (strlen($request['name']) > 3 && strlen($request['name']) < 20) {
            if (preg_match($titlePattern, $request['name'])) {
                $db->insert('categories', array_keys($request), $request);
                $this->redirect('admin/category');
            } else {
                flash('create_error', 'title must be characters');
                $this->redirectBack();
            }
        } else {
            flash('create_error', 'title must be 3-20 characters & can not be empty');
            $this->redirectBack();
        }
    }



    public function edit($id)
    {
        $db = new Database();
        $category = $db->select("SELECT * FROM categories WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/category/edit.php';
    }

    public function update($request, $id)
    {
        $titlePattern = "/^[a-zA-Z ]+$/";
        $db = new Database();
        if (strlen($request['name']) > 3 && strlen($request['name']) < 20) {
            if (preg_match($titlePattern, $request['name'])) {
                $db->update('categories', $id, array_keys($request), $request);
                $this->redirect('admin/category');
            } else {
                flash('update_error', 'title must be characters');
                $this->redirectBack();
            }
        } else {
            flash('update_error', 'title must be 3-20 characters & can not be empty');
            $this->redirectBack();
        }
    }

    public function delete($id)
    {
        $db = new Database();
        $db->delete('categories', $id);
        $this->redirectBack();
    }
}
