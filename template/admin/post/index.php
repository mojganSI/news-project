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
                    <h1 class="h5"><i class="fas fa-newspaper"></i> Articles</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a role="button" href="<?= url('admin/post/create') ?>" class="btn btn-sm btn-success">create</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <caption>List of posts</caption>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>summary</th>
                                <th>view</th>
                                <th>status</th>
                                <th>user ID</th>
                                <th>cat ID</th>
                                <th>image</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($posts as $post) { ?>
                                <tr data-id="<?= $post['id'] ?>">
                                    <td>
                                        <a class="text-primary" href="">
                                            <?= $post['id'] ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?= $post['title'] ?>
                                    <td>
                                        <?= substr($post['summary'], 0, 20) ?>
                                    </td>
                                    <td>
                                        <?= $post['view'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($post['breaking_news'] == 1) {
                                        ?>
                                            <span class="badge badge-success break">#breaking_news</span>
                                        <?php }
                                        if ($post['selected'] == 1) { ?>
                                            <span class="badge badge-dark select">#editor_selected</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?= $post['user_name'] ?>
                                    </td>
                                    <td>
                                        <?= $post['title'] ?>
                                    </td>
                                    <td><img style="width: 80px;" src="<?= asset($post['image']) ?>" alt=""></td>
                                    <td style="width: 25rem;" data-id="<?= $post['id'] ?>">
                                        <!-- <a role="button" class="btn btn-sm btn-warning btn-dark text-white" href="<?= url('admin/post/breaking-news/' . $post['id']) ?>">
                                            <?php if ($post['breaking_news'] == 1) echo  'remove breaking news';
                                            else echo 'add breaking news'; ?>
                                        </a> -->

                                        <button data-id="<?= $post['id'] ?>" role="button" class="btn btn-sm btn-warning btn-dark text-white breaking-news-btn">
                                            <?php if ($post['breaking_news'] == 1) echo  'remove_breaking_newws ';
                                            else echo 'add_breaking_news'; ?>
                                        </button>

                                        <button data-id="<?= $post['id'] ?>"  
                                        role=" button" class="btn btn-sm btn-warning btn-dark text-white selected">
                                            <?php if ($post['selected'] == 1) echo  'Remove_selected';
                                            else echo 'add_selected'; ?>
                                        </button>
                                        <hr class="my-1" />
                                        <a role="button" class="btn btn-sm btn-primary text-white" href="<?= url('admin/post/edit/' . $post['id']) ?>"><i class="fa fa-edit"></i></a>
                                        <button data-id="<?= $post['id'] ?>"  role="button" class="btn btn-sm btn-danger text-white delete-btn" href="<?= url('admin/post/delete/' . $post['id']) ?>"><i class="fa fa-trash"></i></button>
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


    <script>
        let breakingNewsBtns = document.querySelectorAll('.breaking-news-btn');
        breakingNewsBtns.forEach((btn) => {
            btn.addEventListener('click', async function() {
                let id = this.dataset.id;
                console.log(id);
                let statusContainer = this.parentElement.parentElement.children[4];
                let statusContainerFirst = this.parentElement.parentElement.children[4].children[0];
               
             
                try {
                    let response = await fetch(`http://localhost/news-project/admin/post/breaking-news/${id}`);
                    let data = await response.json();
                    if (data.data == 1) {
                        this.innerHTML = 'remove_breaking_news';
                        statusContainerFirst.innerHTML = '<span class="badge badge-success break">#breaking_news</span>';

                    } else {
                        this.innerHTML = 'add_breaking_news';
                        statusContainerFirst.innerHTML = '';

                    }
                } catch (error) {
                    console.log(error);
                }

            })
        })
    </script>

    <script>
        let selectedBtns = document.querySelectorAll('.selected');
        selectedBtns.forEach((btn) => {
            btn.addEventListener('click', async function() {
                let id = this.dataset.id;
                let containerSelected = this.parentElement.parentElement.children[4].children[1];
            
                try {
                    let response = await fetch(`http://localhost/news-project/admin/post/selected/${id}`);
                    let data = await response.json();
                    if (data.data == 1) {
                        this.innerHTML = 'remove_selected';
                        containerSelected.innerHTML = '<span class="badge badge-dark select">#editor_selected</span>';

                    } else {
                        this.innerHTML = 'add_selected';
                        containerSelected.innerHTML = '';

                    }
                } catch (error) {
                    console.log(error);
                }

            })
        })
    </script>
<script>
    let deleteBtns = document.querySelectorAll('.delete-btn');
    deleteBtns.forEach((btn) => {
        btn.addEventListener('click', async function() {
            let id = this.dataset.id;
            let tr = this.parentElement.parentElement;
            console.log(tr);
            console.log(id);
            try {
                let response = await fetch(`http://localhost/news-project/admin/post/delete/${id}`);
                let data = await response.json();
                if (data.data == 1) {
                    tr.remove();
                }
            } catch (error) {
                console.log(error);
            }

        })
    })
</script>


</body>

</html>