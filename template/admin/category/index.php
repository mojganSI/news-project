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
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h5"><i class="fas fa-newspaper"></i> Categories</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a role="button" href="<?= url('admin/category/create') ?>" class="btn btn-sm btn-success">
                            create
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <caption>List of categories</caption>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category) { ?>
                                <tr>
                                    <td>
                                        <?= $category['id'] ?>
                                    </td>
                                    <td>
                                        <?= $category['name'] ?>
                                    </td>
                                    <td>
                                        <a role="button" href="<?= url('admin/category/edit/' . $category['id']) ?>" class="btn btn-sm btn-info my-0 mx-1 text-white">update</a>
                                        <a role="button" href="<?= url('admin/category/delete/' . $category['id']) ?>" class="btn btn-sm btn-danger my-0 mx-1 text-white">delete</a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>


            </main>
        </div>
    </div>


    <?php
    require_once BASE_PATH . '/template/admin/layouts/scripts.php';
    ?>



</body>

</html>