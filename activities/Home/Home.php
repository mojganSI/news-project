<?php

namespace Activities\Home;

use Database\Database;


class Home
{
    public function index()
    {

        $db = new Database();
        $setting = $db->select('SELECT * FROM `websetting`')->fetch();
        $menus = $db->select('SELECT * FROM `menus` WHERE parent_id IS NULL')->fetchAll();

        $topSelectedPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT `name` FROM categories WHERE posts.cat_id = categories.id) AS category_name FROM posts WHERE posts.selected = 1 ORDER BY `created_at` DESC LIMIT 0, 3')->fetchAll();

        $breakingNews = $db->select('SELECT * FROM `posts` WHERE `breaking_news` = 1 ORDER BY `created_at` DESC LIMIT 0, 1')->fetch();

        $lastPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT `name` FROM categories WHERE posts.cat_id = categories.id) AS category_name FROM posts  ORDER BY `created_at` DESC LIMIT 0, 6')->fetchAll();


        $banner = $db->select("SELECT * FROM `banners` ORDER BY `created_at` DESC LIMIT 0, 1")->fetch();
        $sildeBarbanner = $db->select("SELECT * FROM `banners` ORDER BY `created_at` DESC LIMIT 2, 3")->fetch();

        $popularPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT `name` FROM categories WHERE posts.cat_id = categories.id) AS category_name FROM posts  ORDER BY `view` DESC LIMIT 0, 3')->fetchAll();



        $mostCommentedPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT `name` FROM categories WHERE posts.cat_id = categories.id) AS category_name FROM posts ORDER BY `comments_count` DESC LIMIT 0, 2')->fetchAll();


        require_once BASE_PATH . '/template/app/index.php';
    }


    public function show($id)
    {
        $db = new Database();
        $post = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT `name` FROM categories WHERE posts.cat_id = categories.id) AS category_name FROM posts WHERE `id` = ?", [$id])->fetch();

        $db->update('posts', $id, ['view'], [$post['view'] + 1]);

        $comments = $db->select("SELECT *, (SELECT username FROM users WHERE users.id = comments.user_id) AS username FROM comments WHERE `post_id` = ? AND `status` = 'approved'", [$id]);

        $setting = $db->select('SELECT * FROM `websetting`')->fetch();
        $menus = $db->select('SELECT * FROM `menus` WHERE parent_id IS NULL')->fetchAll();
        $mostCommentedPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT `name` FROM categories WHERE posts.cat_id = categories.id) AS category_name FROM posts ORDER BY `comments_count` DESC LIMIT 0, 2')->fetchAll();
        
        $topSelectedPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT `name` FROM categories WHERE posts.cat_id = categories.id) AS category_name FROM posts WHERE posts.selected = 1 ORDER BY `created_at` DESC LIMIT 0, 3')->fetchAll();


        require_once BASE_PATH . '/template/app/show.php';
    }


    public function commentStore($request)
    {

        if (isset($_SESSION['user'])) {
            if ($_SESSION['user'] != null) {
                $db = new Database();
                $db->insert('comments', ['comment', 'user_id', 'post_id'], [$request['message'], $_SESSION['user'], $request['post_id']]);
                $this->redirectBack();
            }
        }
    }

    public function categoriesShow($id)
    {

        $db = new Database();
        $category = $db->select("SELECT * FROM categories WHERE id = ?", [$id])->fetch();        
        $posts = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT `name` FROM categories WHERE posts.cat_id = categories.id) AS category_name FROM posts WHERE `cat_id` = ?", [$id])->fetchAll();

        $setting = $db->select('SELECT * FROM `websetting`')->fetch();
        $menus = $db->select('SELECT * FROM `menus` WHERE parent_id IS NULL')->fetchAll();

        $topSelectedPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT `name` FROM categories WHERE posts.cat_id = categories.id) AS category_name FROM posts WHERE posts.selected = 1 ORDER BY `created_at` DESC LIMIT 0, 1')->fetchAll();

        $breakingNews = $db->select('SELECT * FROM `posts` WHERE `breaking_news` = 1 ORDER BY `created_at` DESC LIMIT 0, 1')->fetch();

    
        $banner = $db->select("SELECT * FROM `banners` ORDER BY `created_at` DESC LIMIT 0, 1")->fetch();
        $sildeBarbanner = $db->select("SELECT * FROM `banners` ORDER BY `created_at` DESC LIMIT 2, 3")->fetch();

        $mostCommentedPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT `name` FROM categories WHERE posts.cat_id = categories.id) AS category_name FROM posts ORDER BY `comments_count` DESC LIMIT 0, 2')->fetchAll();

        require_once BASE_PATH . '/template/app/category.php';
    }


    protected function redirectBack()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
