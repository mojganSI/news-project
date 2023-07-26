<?php

//category
uri('admin/category', 'Activities\Admin\Category', 'index');
uri('admin/category/create', 'Activities\Admin\Category', 'create');
uri('admin/category/store', 'Activities\Admin\Category', 'store',"POST");
uri('admin/category/show/{id}', 'Activities\Admin\Category', 'show');
uri('admin/category/edit/{id}', 'Activities\Admin\Category', 'edit');
uri('admin/category/update/{id}', 'Activities\Admin\Category', 'update',"POST");
uri('admin/category/delete/{id}', 'Activities\Admin\Category', 'delete');


//post
uri('admin/post', 'Activities\Admin\Post', 'index');
uri('admin/post/create', 'Activities\Admin\Post', 'create');
uri('admin/post/store', 'Activities\Admin\Post', 'store',"POST");
uri('admin/post/show/{id}', 'Activities\Admin\Post', 'show');
uri('admin/post/edit/{id}', 'Activities\Admin\Post', 'edit');
uri('admin/post/update/{id}', 'Activities\Admin\Post', 'update',"POST");
uri('admin/post/delete/{id}', 'Activities\Admin\Post', 'delete');
uri('admin/post/breaking-news/{id}', 'Activities\Admin\Post', 'breakingNews');
uri('admin/post/selected/{id}', 'Activities\Admin\Post', 'selected');



//Banners
uri('admin/banner', 'Activities\Admin\Banner', 'index');
uri('admin/banner/create', 'Activities\Admin\Banner', 'create');
uri('admin/banner/store', 'Activities\Admin\Banner', 'store',"POST");
uri('admin/banner/show/{id}', 'Activities\Admin\Banner', 'show');
uri('admin/banner/edit/{id}', 'Activities\Admin\Banner', 'edit');
uri('admin/banner/update/{id}', 'Activities\Admin\Banner', 'update',"POST");
uri('admin/banner/delete/{id}', 'Activities\Admin\Banner', 'delete');



//Menus
uri('admin/menu', 'Activities\Admin\Menu', 'index');
uri('admin/menu/create', 'Activities\Admin\Menu', 'create');
uri('admin/menu/store', 'Activities\Admin\Menu', 'store',"POST");
uri('admin/menu/show/{id}', 'Activities\Admin\Menu', 'show');
uri('admin/menu/edit/{id}', 'Activities\Admin\Menu', 'edit');
uri('admin/menu/update/{id}', 'Activities\Admin\Menu', 'update',"POST");
uri('admin/menu/delete/{id}', 'Activities\Admin\Menu', 'delete');




//comments
uri('admin/comment', 'Activities\Admin\Comment', 'index');
uri('admin/comment/create', 'Activities\Admin\Comment', 'create');
uri('admin/comment/store', 'Activities\Admin\Comment', 'store',"POST");
uri('admin/comment/show/{id}', 'Activities\Admin\Comment', 'show');
uri('admin/comment/edit/{id}', 'Activities\Admin\Comment', 'edit');
uri('admin/comment/update/{id}', 'Activities\Admin\Comment', 'update',"POST");
uri('admin/comment/delete/{id}', 'Activities\Admin\Comment', 'delete');


//users
uri('admin/user', 'Activities\Admin\User', 'index');
uri('admin/user/show/{id}', 'Activities\Admin\User', 'show');
uri('admin/user/edit/{id}', 'Activities\Admin\User', 'edit');
uri('admin/user/update/{id}', 'Activities\Admin\User', 'update',"POST");
uri('admin/user/delete/{id}', 'Activities\Admin\User', 'delete');
uri('admin/user/admin-or-user/{id}', 'Activities\Admin\User', 'adminOrUser');

//web-setting
uri('admin/web-setting', 'Activities\Admin\WebSetting', 'index');
uri('admin/web-setting/set', 'Activities\Admin\WebSetting', 'set');
uri('admin/web-setting/update', 'Activities\Admin\WebSetting', 'update',"POST");

//auth
uri('register', 'Activities\Auth\Auth', 'register');
uri('register-store', 'Activities\Auth\Auth', 'registerStore', 'POST');
uri('activation/{verify_token}', 'Activities\Auth\Auth', 'activation');
uri('login', 'Activities\Auth\Auth', 'login');
uri('login-store', 'Activities\Auth\Auth', 'loginStore', 'POST');
uri('logout', 'Activities\Auth\Auth', 'logout');
uri('forget-password', 'Activities\Auth\Auth', 'forgetPassword');
uri('forget-password-store', 'Activities\Auth\Auth', 'forgetPasswordStore', 'POST');
uri('reset-password/{forgot_token}', 'Activities\Auth\Auth', 'resetPassword');
uri('reset-password-store/{forgot_token}', 'Activities\Auth\Auth', 'resetPasswordStore', 'POST');


//app
uri('/', 'Activities\Home\Home', 'index');
uri('/home', 'Activities\Home\Home', 'index');
uri('/show-post/{id}', 'Activities\Home\Home', 'show');
uri('/comment-store', 'Activities\Home\Home', 'commentStore', 'POST');
uri('/category/{id}', 'Activities\Home\Home', 'categoriesShow');



//dashboard
uri('admin/dashboard', 'Activities\Admin\Dashboard', 'index');
uri('admin/dashboard/create', 'Activities\Admin\Dashboard', 'create');



//error
uri('admin/error', 'Activities\Admin\Error', 'index');

exit;
?>