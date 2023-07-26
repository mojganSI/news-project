<?php

namespace Activities\Admin;

use Database\Database;

class Menu extends Admin
{
    public function index()
    {
        $db = new Database();
        // $menus = $db->select('SELECT * FROM menus')->fetchAll();
        $menus = $db->select('SELECT m1.* , m2.name AS parentName FROM menus m1 LEFT JOIN menus m2 ON m1.parent_id = m2.id')->fetchAll();
        // dd($menus);
        require_once BASE_PATH . '/template/admin/menu/index.php';
    }

    public function create()
    {
        $db = new Database();

        $menus = $db->select('SELECT * FROM menus WHERE  `parent_id` IS NULL')->fetchAll();
        require_once BASE_PATH . '/template/admin/menu/create.php';
    }

    public function store($request)
    {
        // dd($request);
        $titlePattern = "/^[a-zA-Z ]+$/";
        $db = new Database();
        if (strlen($request['name']) > 3 && strlen($request['name']) < 20) {
            if (preg_match($titlePattern, $request['name'])) {
                $db->insert('menus', array_keys($request), $request);
                $this->redirect('admin/menu');
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

        $menus = $db->select('SELECT * FROM menus WHERE  `parent_id` IS NULL')->fetchAll();
        $joinMenus = $db->select('SELECT * FROM menus JOIN menus AS menusCopy ON menus.id = menusCopy.parent_id')->fetchAll();
        $menu = $db->select("SELECT * FROM menus WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/menu/edit.php';
    }

    public function update($request, $id)
    {
        $titlePattern = "/^[a-zA-Z ]+$/";
        $db = new Database();
        if (strlen($request['name']) > 3 && strlen($request['name']) < 20) {
            if (preg_match($titlePattern, $request['name'])) {
                $db->update('menus', $id, array_keys($request), $request);
                $this->redirect('admin/menu');
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
        $db->delete('menus', $id);
        $this->redirectBack();
    }
}
