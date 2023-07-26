<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ساخت خبر</title>
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
                    <h1 class="h5">Create Article</h1>
                </section>

                <section class="row my-3">
                    <section class="col-12">

                        <form method="post" action="<?= url('admin/post/store') ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title ..." required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="cat_id">Category</label>
                                <select name="cat_id" id="cat_id" class="form-control" required autofocus>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?= $category['id'] ?>">
                                            <?= $category['name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" class="form-control-file" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="published_at">published at</label>
                                <input type="text" class="form-control d-none" id="published_at" name="published_at" required autofocus>
                                <input type="text" class="form-control" id="published_at_view" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="summary">summary</label>
                                <textarea class="form-control" id="summary" name="summary" placeholder="summary ..." rows="3" required autofocus></textarea>
                            </div>

                            <div class="form-group">
                                <label for="body">body</label>
                                <textarea class="form-control" id="body" name="body" placeholder="body ..." rows="5" required autofocus></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm">store</button>
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