<?php

namespace Activities\Admin;

use Database\Database;

class Dashboard extends Admin
{
    public function index()
    {
        $db = new Database();
        $categories = $db->select('SELECT COUNT(*) as cat_count FROM categories')->fetch();

        $allUsers = $db->select('SELECT COUNT(*) as alluser_count FROM users')->fetch();
        $admins = $db->select('SELECT COUNT(*) as admin_count FROM users WHERE `permission` = "admin"')->fetch();
        $users = $db->select('SELECT COUNT(*) as user_count FROM users WHERE `permission` = "user"')->fetch();


        $posts = $db->select('SELECT COUNT(*) as post_count FROM posts')->fetch();
        $views = $db->select('SELECT SUM(`view`) as view_count FROM posts')->fetch();

        $comments = $db->select('SELECT COUNT(*) as comment_count FROM comments')->fetch();
        $approvedComments = $db->select('SELECT COUNT(*) as approved_comment_count FROM comments WHERE `status` = "approved"')->fetch();

        $unSeenComments = $db->select('SELECT COUNT(*) as unseen_comment_count FROM comments WHERE `status` = "unseen"')->fetch();
        require_once BASE_PATH . '/template/admin/dashboard/index.php';
    }
    public function create()
    {
        require_once BASE_PATH . '/template/admin/dashboard/create.php';
    }
}