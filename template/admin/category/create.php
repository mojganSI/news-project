<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="shortcut icon" href="" type="image/x-icon" />

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
                <section class="pt-3 pb-1 mb-2 border-bottom">
                    <h1 class="h5">Create Category</h1>
                </section>
                <section class="row my-3">
                    <section class="col-12">
                        <form method="post" action="<?= url('admin/category/store') ?>">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name ...">
                            </div>

                            <?php
                            $message = flash('create_error');
                            if (!empty($message)) {
                            ?>
                                <div class="mb-2 alert alert-danger">
                                    <small class="form-text text-danger"><?= $message ?></small>
                                </div>
                            <?php  } ?>
                            <button type="submit" class="btn btn-primary btn-sm">store</button>
                        </form>
                    </section>
            </main>
        </div>
    </div>


    <?php
    require_once BASE_PATH . '/template/admin/layouts/scripts.php';
    ?>



</body>

</html>