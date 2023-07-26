<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="shortcut icon" href="" type="image/x-icon" />

    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">

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
                    <h1 class="h5"><i class="fas fa-newspaper"></i> Website Setting</h1>

                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a role="button" href="<?= url('admin/web-setting/set') ?>" class="btn btn-sm btn-success">set web setting</a>
                    </div>

                </div>
                <section class="table-responsive">
                    <table class="table table-striped table-sm">
                        <caption>Website setting</caption>
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>VALUE</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>TITLE</td>
                                <td>
                                    <?= $web ? $web['title'] : "-"  ?>
                                </td>
                            </tr>
                            <tr>
                                <td>DESCRIPTION</td>
                                <td>
                                    <?= $web ? $web['description'] : "-"  ?>

                                </td>
                            </tr>
                            <tr>
                                <td>KEY WORD</td>
                                <td>
                                    <?= $web ? $web['keywords'] : "-"  ?>

                                </td>
                            </tr>
                            <tr>
                                <td>LOGO</td>

                                <?php if ($web) { ?>

                                    <td><img style=" width: 80px;" src=" <?= asset($web['logo']) ?>" alt=""></td>
                                <?php } else { ?>
                                    <td>-</td>

                                <?php } ?>

                            </tr>
                            <tr>
                                <td>ICON</td>

                                <?php if ($web) { ?>
                                    <td>
                                        <img style=" width: 80px;" src=" <?= asset($web['icon']) ?>" alt="">
                                    </td>
                                <?php } else { ?>
                                    <td>-</td>
                                <?php } ?>

                            </tr>
                            <tr>
                                <td>EMAIL</td>
                                <td>
                                    <?= $web ? $web['email'] : "-"  ?>
                                </td>
                            </tr>
                            <tr>
                                <td>PHONE</td>
                                <td>
                                    <?= $web ? $web['phone'] : "-"  ?>
                                </td>
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