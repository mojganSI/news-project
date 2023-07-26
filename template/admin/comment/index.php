<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="shortcut icon" href="" type="image/x-icon" />

    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet">

    <link href="../../css/style.css" rel="stylesheet" type="text/css">
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
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h5"><i class="fas fa-newspaper"></i> Comments</h1>
                    <div class=" btn-toolbar mb-2 mb-md-0">
                        <a role=" button" href="<?= url('admin/comment/create') ?>" class=" btn btn-sm btn-success">create</a>
                    </div>
                </div>
                <section class="table-responsive">
                    <table class="table table-striped table-sm">
                        <caption>List of comments</caption>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>user ID</th>
                                <th>post ID</th>
                                <th>comment</th>
                                <th>status</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($comments as  $comment) {  ?>
                                <tr>
                                    <td><a href="<?= url('admin/comment/show/'.$comment['id']) ?>"><?= $comment['id'] ?></a>
                                    </td>
                                    <td>
                                        <?= $comment['user_name'] ?>
                                    </td>
                                    <td>
                                        <?= $comment['title'] ?>
                                    </td>
                                    <td>
                                        <?= $comment['comment'] ?>
                                    </td>
                                    <td>
                                        <?php if($comment['status'] == "seen") echo "dide shode"; elseif($comment['status'] == "unseen") echo "dide nashode"; else echo "taide shide"; ?>
                                    </td>
                                    <td>
                                        <?= $comment['created_at'] ?>
                                    </td>
                                    <td>
                                        <?= $comment['updated_at'] != null ? $comment['updated_at'] : "no update" ?>
                                    </td>
                                    <td>
                                        <?php if ($comment['status'] == "seen") { ?>
                                            <a role="button" class="btn btn-sm btn-success text-white" href="">click to approved</a>
                                        <?php } else { ?>
                                            <a role="button" class="btn btn-sm btn-warning text-white" href="">click not to approved</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>


            </main>
        </div>
    </div>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/scripts.php';
    ?>
</body>

</html>