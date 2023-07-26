<?php

namespace Activities\Admin;



class Error extends Admin
{
    public function index()
    {
        require_once BASE_PATH . '/template/admin/error/index.php';
    }
}