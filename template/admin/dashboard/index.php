<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DASHBOARD</title>
    <link rel="shortcut icon" href="#" type="image/x-icon" />

    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet">

    <?php
    require_once BASE_PATH . '/template/admin/layouts/styles.php';
    ?>
</head>

<body>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/top-nav.php';
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php
            require_once BASE_PATH . '/template/admin/layouts/sidebar.php';
            ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="row mt-3">

                    <div class="col-sm-6 col-lg-3">
                        <a href="<?= url('admin/banner/create') ?>" class="text-decoration-none">
                            <div class="card text-white bg-gradiant-green-blue mb-3">
                                <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-clipboard-list"></i> Categories</span> <span class="badge badge-pill right"><?= $categories['cat_count'] ?></span></div>
                                <div class="card-body">
                                    <section class="font-12 my-0"><i class="fas fa-clipboard-list"></i> GO TO Categories!</section>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <a href="" class="text-decoration-none">
                            <div class="card text-white bg-juicy-orange mb-3">
                                <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-users"></i> Users</span><?= $users['user_count'] ?><span class="badge badge-pill right"></span></div>
                                <div class="card-body">
                                    <section class="d-flex justify-content-between align-items-center font-12">
                                        <span class=""><i class="fas fa-users-cog"></i> Admin <span class="badge badge-pill mx-1"></span><?= $admins['admin_count'] ?></span>
                                        <span class=""><i class="fas fa-user"></i> All Users <span class="badge badge-pill mx-1"></span><?= $allUsers['alluser_count'] ?></span>
                                    </section>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <a href="" class="text-decoration-none">
                            <div class="card text-white bg-dracula mb-3">
                                <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-newspaper"></i> Article</span><?= $posts['post_count'] ?> <span class="badge badge-pill right"></span></div>
                                <div class="card-body">
                                    <section class="d-flex justify-content-between align-items-center font-12">
                                        <span class=""><i class="fas fa-bolt"></i> Views <span class="badge badge-pill mx-1"></span><?= $views['view_count'] ?></span>
                                    </section>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <a href="" class="text-decoration-none">
                            <div class="card text-white bg-neon-life mb-3">
                                <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-comments"></i> Comment</span> <?= $comments['comment_count'] ?><span class="badge badge-pill right"></span></div>
                                <div class="card-body">
                                    <!--                        <h5 class="card-title">Info card title</h5>-->
                                    <section class="d-flex justify-content-between align-items-center font-12">
                                        <span class=""><i class="far fa-eye-slash"></i> Unseen <span class="badge badge-pill mx-1"></span><?= $unSeenComments['unseen_comment_count'] ?></span>
                                        <span class=""><i class="far fa-check-circle"></i> Approved <span class="badge badge-pill mx-1"></span><?= $approvedComments['approved_comment_count'] ?></span>
                                    </section>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>


                <div class="row mt-2">
                    <div class="col-4">
                        <h2 class="h6 pb-0 mb-0">
                            Most viewed posts
                        </h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>title</th>
                                        <th>view</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <a class="text-primary" href="">
                                                ss
                                            </a>
                                        </td>
                                        <td>
                                            ss
                                        </td>
                                        <td><span class="badge badge-secondary">ss</span></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-4">
                        <h2 class="h6 pb-0 mb-0">
                            Most commented posts

                        </h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>title</th>
                                        <th>comment</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <a class="text-primary" href="">
                                                ss
                                            </a>
                                        </td>
                                        <td>
                                            ss
                                        </td>
                                        <td><span class="badge badge-success">ss</span></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-4">
                        <h2 class="h6 pb-0 mb-0">
                            Comments
                        </h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>username</th>
                                        <th>comment</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <tr>
                                        <td>
                                            <a class="text-primary" href="">
                                                ss
                                            </a>
                                        </td>
                                        <td>
                                            ss
                                        </td>
                                        <td>
                                            ss
                                        </td>
                                        <td><span class="badge badge-warning">ss</span></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </main>
        </div>
    </div>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/scripts.php';
    ?>
</body>

</html>