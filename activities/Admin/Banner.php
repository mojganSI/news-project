<?php

namespace Activities\Admin;

use Database\Database;

class Banner extends Admin
{
    public function index()
    {
        $db = new Database();
        $banners = $db->select('SELECT * FROM banners')->fetchAll();
        require_once BASE_PATH . '/template/admin/banner/index.php';
    }
    public function create()
    {
        require_once BASE_PATH . '/template/admin/banner/create.php';
    }

    public function store($request)
    {
        $img = $request['image']['type'];
        $img = explode('/', $img);
        $extentionImg = $img[1];
        // dd($extentionImg);
        $db = new Database();

        if ($request['image']) {
                $allowedMimes = ['png', 'jpg', 'jpeg', 'gif'];
                if(!in_array($extentionImg, $allowedMimes)){
                    flash('banner_error', 'image must be valid.');
                    $this->redirectBack();

            } else {
                $request['image'] = $this->saveImage($request['image'], 'banner-images');
                $db->insert('banners', array_keys($request), $request);
                $this->redirect('admin/banner');
            }
        } else {
            flash('banner_error', 'image must be choosen.');
            $this->redirectBack();
        }
    }

    public function edit($id)
    {
        $db = new Database();
        $banner = $db->select("SELECT * FROM banners WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/banner/edit.php';
    }

    public function update($request, $id)
    {
        $urlPattern = "/^[a-zA-Z ]+$/";  
        $img = $request['image']['type'];
        $img = explode('/', $img);
        $extentionImg = $img[1];
        $db = new Database();     
        if (preg_match($urlPattern, $request['url'])) {
            $allowedMimes = ['png', 'jpg', 'jpeg', 'gif'];
            if(!in_array($extentionImg, $allowedMimes)){
                flash('banner_error', 'image must be valid.');
                $this->redirectBack();
            }else {
                $request['image'] = $this->saveImage($request['image'], 'banner-images');
                $db->update('banners', $id, array_keys($request), $request);
                $this->redirect('admin/banner');
            }

            // $banner = $db->select('SELECT * FROM banners WHERE id = ?', [$id])->fetch();
            // $this->removeImage($banner['image']);
            // $request['image'] = $this->saveImage($request['image'], 'banner-images');
        } else {
            flash('banner_error', 'url must be valid.');
                $this->redirectBack();
        }
    }

    public function delete($id)
    {
        $db = new Database();
        $banner = $db->select('SELECT * FROM banners WHERE id = ?', [$id])->fetch();
        $this->removeImage($banner['image']);
        $db->delete('banners', $id);
        $this->redirectBack();
    }
}
