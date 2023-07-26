<?php

namespace Activities\Admin;

use Database\Database;

class Comment extends Admin
{
    public function index()
    {
        $db = new Database();
        $comments = $db->select('SELECT comments.*, users.username as user_name, posts.title as title FROM comments LEFT JOIN users ON comments.user_id = users.id LEFT JOIN posts ON comments.post_id = posts.id')->fetchAll();
        require_once BASE_PATH . '/template/admin/comment/index.php';
    }

    public function show($id)
    {
        $db = new Database();
        $comment = $db->select('SELECT comments.*, users.username as user_name, posts.title as title FROM comments LEFT JOIN users ON comments.user_id = users.id LEFT JOIN posts ON comments.post_id = posts.id WHERE comments.id = ?', [$id])->fetch();
        require_once BASE_PATH . '/template/admin/comment/show.php';
    }
}


