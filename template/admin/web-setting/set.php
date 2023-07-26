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


                <section class="pt-3 pb-1 mb-2 border-bottom">
                    <h1 class="h5">Create Web</h1>
                </section>
                <section class="row my-3">
                    <section class="col-12">
                        <form method="post" enctype="multipart/form-data"  action="<?= url('admin/web-setting/update') ?>">
                            <div class="form-group">
                                <label for="title">Title</label>

                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title ..." required value="<?=  $web ? $web['title'] : '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Enter description ..." required value="<?=  $web ? $web['description'] : '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="keywords">Key Words</label>
                                <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Enter key words ..." required value="<?=  $web ? $web['keywords'] : '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" id="logo" name="logo" class="form-control-file"  autofocus>
                                <?php if ($web) { ?>
                                    <img src="<?= asset($web['logo']) ?>" alt="" class="img-fluid" width="100px">
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <input type="file" id="icon" name="icon" class="form-control-file"  autofocus>
                                <?php if ($web) { ?>
                                    <img src="<?= asset($web['icon']) ?>" alt="" class="img-fluid" width="100px">
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="email ..." required value="<?=  $web ? $web['email'] : '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="phone ..." required value="<?=  $web ? $web['phone'] : '' ?>">
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm">store</button>
                        </form>
                    </section>
                </section>
           

            </main>
        </div>
    </div>



    </main>
    </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/mdb.min.js"></script>

</body>

</html>