<?php

namespace Activities\Admin;

use Database\Database;

class WebSetting extends Admin
{
    public function index()
    {
        $db = new Database();
        $web = $db->select('SELECT * FROM websetting')->fetch();
        require_once BASE_PATH . '/template/admin/web-setting/index.php';
    }

    public function set()
    {
        $db = new Database();
        $web = $db->select('SELECT * FROM websetting')->fetch();
      

        require_once BASE_PATH . '/template/admin/web-setting/set.php';
    }





    public function update($request)
    {
        $db = new Database();
        $web = $db->select('SELECT * FROM websetting')->fetch();

        if ($request['logo']['tmp_name'] != null) {
            $request['logo'] = $this->saveImage($request['logo'], 'setting', 'logo');
        } else {
            unset($request['logo']);
        }
        if ($request['icon']['tmp_name'] != null) {
            $request['icon'] = $this->saveImage($request['icon'], 'setting', 'icon');
        } else {
            unset($request['icon']);
        }
        if ($web) {
            $db->update('websetting', $web['id'], array_keys($request), $request);
        } else {
            $db->insert('websetting', array_keys($request), $request);
        }
        $this->redirect('admin/web-setting');

    }
}
