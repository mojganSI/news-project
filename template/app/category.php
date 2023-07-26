<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Magazine</title>
    <?php require_once BASE_PATH . '/template/app/layouts/head-tag.php'; ?>

</head>

<body>
    <?php require_once BASE_PATH . '/template/app/layouts/header.php'; ?>


    <div class="site-main-container">
        <!-- Start top-post Area -->
        <div class="col-lg-12">
            <div class="hero-nav-area">
                <h1 class="text-white"><?= $category['name'] ?></h1>

            </div>
        </div>
        <!-- End top-post Area -->
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <!-- Start latest-post Area -->
                        <div class="latest-post-wrap">
                            <h4 class="cat-title">آخرین اخبار</h4>
                            <?php foreach ($posts as $post) { ?>

                            <div class="single-latest-post row align-items-center">
                                <div class="col-lg-5 post-left">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="<?= asset($post['image']) ?>" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="#"><?= $post['category_name'] ?></a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-7 post-right">
                                    <a href="image-post.html">
                                        <h4><?= $post['title'] ?></h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span><?= $post['username'] ?></a></li>
                                        <li><a href="#"><?= $post['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span><?= $post['comments_count'] ?></a></li>
                                    </ul>
                                    <p class="excert">  <?= substr($post['summary'], 0, 50) ?></p>
                                </div>
                            </div>
                            <?php } ?>  
                        </div>
                        <!-- End latest-post Area -->

                        <?php if (!empty($banner)) { ?>
                            <!-- Start banner-ads Area -->
                            <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                                <a href="<?= url($banner['url']) ?>">
                                    <img class="img-fluid" src="<?= asset($banner['image']) ?>" alt="">
                                </a>
                            </div>
                        <?php } ?>
                        <!-- End banner-ads Area -->
                        <!-- Start popular-post Area -->
                        <div class="popular-post-wrap">
                            <h4 class="title">اخبار پربازدید</h4>
                            <?php if (!empty($mostCommentedPosts[0])) { ?>
                                <div class="feature-post relative">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="<?= asset($mostCommentedPosts[0]['image']) ?>" alt="">
                                    </div>
                                    <div class="details">
                                        <ul class="tags">
                                            <li><a href="#" <?= $mostCommentedPosts[0]['category_name'] ?></a></li>
                                        </ul>
                                        <a href="image-post.html">
                                            <h3><?= $mostCommentedPosts[0]['title'] ?></h3>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-user"></span><?= $mostCommentedPosts[0]['username'] ?></a></li>
                                            <li><a href="#"><?= $mostCommentedPosts[0]['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                            <li><a href="#"><?= $mostCommentedPosts[0]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="row mt-20 medium-gutters">
                                <?php if (!empty($mostCommentedPosts[1])) { ?>
                                    <div class="feature-post relative">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid" src="<?= asset($mostCommentedPosts[1]['image']) ?>" alt="">
                                        </div>
                                        <div class="details">
                                            <ul class="tags">
                                                <li><a href="#" <?= $mostCommentedPosts[1]['category_name'] ?></a></li>
                                            </ul>
                                            <a href="image-post.html">
                                                <h3><?= $mostCommentedPosts[1]['title'] ?></h3>
                                            </a>
                                            <ul class="meta">
                                                <li><a href="#"><span class="lnr lnr-user"></span><?= $mostCommentedPosts[1]['username'] ?></a></li>
                                                <li><a href="#"><?= $mostCommentedPosts[1]['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                                <li><a href="#"><?= $mostCommentedPosts[1]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if (!empty($mostCommentedPosts[2])) { ?>
                                    <div class="feature-post relative">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid" src="<?= asset($mostCommentedPosts[2]['image']) ?>" alt="">
                                        </div>
                                        <div class="details">
                                            <ul class="tags">
                                                <li><a href="#" <?= $mostCommentedPosts[2]['category_name'] ?></a></li>
                                            </ul>
                                            <a href="image-post.html">
                                                <h3><?= $mostCommentedPosts[2]['title'] ?></h3>
                                            </a>
                                            <ul class="meta">
                                                <li><a href="#"><span class="lnr lnr-user"></span><?= $mostCommentedPosts[2]['username'] ?></a></li>
                                                <li><a href="#"><?= $mostCommentedPosts[2]['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                                <li><a href="#"><?= $mostCommentedPosts[2]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- End popular-post Area -->
                    </div>
                    <?php require_once BASE_PATH . '/template/app/layouts/sidebar.php'; ?>
                </div>
            </div>
        </section>
        <!-- End latest-post Area -->
    </div>

    <!-- start footer Area -->
    <?php require_once BASE_PATH . '/template/app/layouts/footer.php'; ?>

    <?php require_once BASE_PATH . '/template/app/layouts/scripts.php'; ?>
    <!-- End footer Area -->

</body>

</html>