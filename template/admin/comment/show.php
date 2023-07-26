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
            <form method="post" action="<?= url('admin/comment/show/' . $comment['id']) ?>">
                <main role="main " class="col-md-9 ml-sm-auto col-lg-10 px-4 ">
                    <section class="pt-3 pb-1 mb-2 border-bottom ">
                        <h1 class="h5 ">Show Comment</h1>
                    </section>
                    <section class="row my-3 ">
                        <section class="col-12 ">
                            <h1 class="h4 border-bottom "><?= $comment['comment'] ?></h1>
                            <p class="text-secondary border-bottom "><?= $comment['user_id'] ?></p>
                            <p class="text-secondary border-bottom "><?= $comment['post_id'] ?></p>
                            <p class="text-secondary border-bottom "><?= $comment['status'] ?></p>
                            <p class="text-secondary border-bottom "><?= $comment['created_at'] ?></p>
                            <p class="text-secondary border-bottom "><?= $comment['updated_at']!= null ? $comment['updated_at'] : "no apdate available" ?></p>
                            <?php if($comment['status'] == "seen"){ ?>
                            <a role="button " class="btn btn-sm btn-success text-white " href=" ">click to approved</a>
                                <?php }else{ ?>
                            <a role="button " class="btn btn-sm btn-warning text-white " href=" ">click not to approved</a>
                                <?php }?>
                        </section>
                    </section>


                </main>
            </form>
        </div>
    </div>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/scripts.php';
    ?>

</body>

</html>