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
            <form method="post" action="<?= url('admin/post/show/' . $post['id']) ?>">


                <main role=" main" class=" col-md-9 ml-sm-auto col-lg-10 px-4">

                    <section class=" pt-3 pb-1 mb-2 border-bottom">
                        <h1 class=" h5"><?= $post['title'] ?></h1>
                    </section>
                    <section class=" row my-3">
                        <section class=" col-12">
                            <h1 class=" h4 border-bottom"><?= $post['summary'] ?></h1>
                            <p class=" text-secondary border-bottom"><?= $post['body'] ?></p>
                            <section class="">
                                <img src="<?php $post['image'] ?>" alt="">
                            </section>
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