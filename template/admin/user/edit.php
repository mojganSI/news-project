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
                    <h1 class="h5">Edit User</h1>
                </section>

                <section class="row my-3">
                    <section class="col-12">

                        <form method="post" action="<?= url('admin/user/update/' . $user['id']) ?>">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter title ..."value="<?= $user['username'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter title ..." value="<?= $user['email'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="permission">permission</label>
                                <select name="permission" id="permission" class="form-control" required autofocus>
                                    <option value="user">user</option>
                                    <option value="admin">admin</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">update</button>
                        </form>

                    </section>
                </section>




            </main>
        </div>
    </div>

    <?php
    require_once BASE_PATH . '/template/admin/layouts/scripts.php';
    ?>


</body>

</html>