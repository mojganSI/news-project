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
                    <h1 class=h5"><i class=" fas fa-newspaper"></i> Users</h1>
                    <div class=btn-toolbar mb-2 mb-md-0">
                        <a role=button" href="<?= url('admin/user') ?>" class=btn btn-sm btn-success disabled">create</a>
                    </div>
                </div>
                <section class=table-responsive">
                    <table class=table table-striped table-sm">
                        <caption>List of users</caption>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>username</th>
                                <th>email</th>
                                <th>password</th>
                                <th>permission</th>
                                <th>created at</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php foreach($users as  $user){  ?>

                                <td><?=  $user['id'] ?></td>
                                <td><?=  $user['username'] ?></td>
                                <td><?=  $user['email'] ?></td>
                                <td>###</td>
                                <td><?=  $user['permission'] ?></td>
                                <td><?=  $user['created_at'] ?></td>
                                <td></td>
                                <td>
                            
                                <?php if($user['permission'] == 'user'){ ?>
                                    <a role="button" class="btn btn-sm btn-success text-white" href="<?= url('admin/user/admin-or-user/' . $user['id']) ?>">click to be admin</a>
                                <?php }else{ ?>
                                    <a role="button" class="btn btn-sm btn-warning text-white" href="<?= url('admin/user/admin-or-user/' . $user['id']) ?>">click not to be admin</a>
                                <?php } ?>

                                    <a role="button" class="btn btn-sm btn-primary text-white" href="<?= url('admin/user/edit/' . $user['id']) ?>">edit</a>
                                    <a role="button" class="btn btn-sm btn-danger text-white" href="<?= url('admin/user/delete/' . $user['id']) ?>">delete</a>
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