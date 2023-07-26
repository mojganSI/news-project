<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <title>Magazine</title>
    <?php require_once BASE_PATH . '/template/app/layouts/head-tag.php'; ?>
</head>

<body>
    <?php require_once BASE_PATH . '/template/app/layouts/header.php'; ?>

    <div class="site-main-container">
        <!-- Start top-post Area -->
        <section class="top-post-area pt-10">
            <div class="container no-padding">
                <div class="row small-gutters">
                   <?php  if (!empty($topSelectedPosts[0])) { ?>
                        <div class="col-lg-8 top-post-left">
                            <div class="feature-image-thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="<?= asset($topSelectedPosts[0]['image']) ?>" alt="">
                            </div>
                            <div class="top-post-details">
                                <ul class="tags">
                                    <li><a href="<?= url('category/'. $topSelectedPosts[0]['cat_id']) ?>"><?= $topSelectedPosts[0]['category_name'] ?></a></li>
                                </ul>
                                <a href="image-post.html">
                                    <h3><?= $topSelectedPosts[0]['title'] ?></h3>
                                </a>
                                <ul class="meta">
                                    <li><a href="#"><span class="lnr lnr-user"></span><?= $topSelectedPosts[0]['username'] ?></a></li>
                                    <li><a href="#"><?= $topSelectedPosts[0]['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="#"><?= $topSelectedPosts[0]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-lg-4 top-post-right">
                        <?php if (!empty($topSelectedPosts[1])) { ?>
                            <div class="single-top-post">
                                <div class="feature-image-thumb relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="<?= asset($topSelectedPosts[1]['image']) ?>" alt="">
                                </div>
                                <div class="top-post-details">
                                    <ul class="tags">
                                        <li><a href="<?= url('category/'. $topSelectedPosts[1]['cat_id']) ?>"><?= $topSelectedPosts[1]['category_name'] ?></a></li>
                                    </ul>
                                    <a href="image-post.html">
                                        <h4><?= $topSelectedPosts[1]['title'] ?></h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span><?= $topSelectedPosts[1]['username'] ?></a></li>
                                        <li><a href="#"><?= $topSelectedPosts[1]['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"><?= $topSelectedPosts[1]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php }
                        if (!empty($topSelectedPosts[2])) { ?>
                            <div class="single-top-post mt-10">
                                <div class="feature-image-thumb relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="<?= asset($topSelectedPosts[2]['image']) ?>" alt="">
                                </div>
                                <div class="top-post-details">
                                    <ul class="tags">
                                        <li><a href="<?= url('category/'. $topSelectedPosts[2]['cat_id']) ?>"><?= $topSelectedPosts[2]['category_name'] ?></a></li>
                                    </ul>
                                    <a href="image-post.html">
                                        <h4><?= $topSelectedPosts[2]['title'] ?></h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span><?= $topSelectedPosts[2]['username'] ?></a></li>
                                        <li><a href="#"><?= $topSelectedPosts[2]['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"><?= $topSelectedPosts[2]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if (!empty($breakingNews)) { ?>
                        <div class="col-lg-12">
                            <div class="news-tracker-wrap">
                                <h6><span>خبر فوری:</span> <a href="#"><?= $breakingNews['title'] ?></a></h6>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            

        </section>
        <!-- End top-post Area -->
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <!-- Start latest-post Area -->
                        <div class="latest-post-wrap">
                            <h4 class="cat-title">آخرین اخبار</h4>
                            <?php foreach ($lastPosts as $lastPost) { ?>
                                <div class="single-latest-post row align-items-center">
                                    <div class="col-lg-5 post-left">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid" src="<?= asset($lastPost['image']) ?>" alt="">
                                        </div>
                                        <ul class="tags">
                                            <li><a href="#"><?= $lastPost['category_name'] ?></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-7 post-right">
                                        <a href="<?= url('show-post/' . $lastPost['id']) ?>">
                                            <h4><?= $lastPost['title'] ?></h4>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-user"></span><?= $lastPost['username'] ?></a></li>
                                            <li><a href="#"><?= $lastPost['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                            <li><a href="#"> <?= $lastPost['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                        </ul>
                                        <p class="excert">
                                            <?= substr($lastPost['summary'], 0, 50) ?>
                                        </p>
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
                            <?php if (!empty($popularPosts[0])) { ?>
                            <div class="feature-post relative">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="<?= asset($popularPosts[0]['image']) ?>" alt="">
                                </div>
                                <div class="details">
                                    <ul class="tags">
                                        <li><a href="#" ><?= $popularPosts[0]['category_name'] ?></a></li>
                                    </ul>
                                    <a href="image-post.html">
                                        <h3><?= $popularPosts[0]['title'] ?></h3>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span><?= $popularPosts[0]['username'] ?></a></li>
                                        <li><a href="#"><?= $popularPosts[0]['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"><?= $popularPosts[0]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>

                            <div class="row mt-20 medium-gutters">
                            <?php if (!empty($popularPosts[1])) { ?>
                                <div class="feature-post relative">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="<?= asset($popularPosts[1]['image']) ?>" alt="">
                                </div>
                                <div class="details">
                                    <ul class="tags">
                                        <li><a href="#" <?= $popularPosts[1]['category_name'] ?></a></li>
                                    </ul>
                                    <a href="image-post.html">
                                        <h3><?= $popularPosts[1]['title'] ?></h3>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span><?= $popularPosts[1]['username'] ?></a></li>
                                        <li><a href="#"><?= $popularPosts[1]['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"><?= $popularPosts[1]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                                <?php } ?>
                                <?php if (!empty($popularPosts[2])) { ?>
                                    <div class="feature-post relative">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="<?= asset($popularPosts[2]['image']) ?>" alt="">
                                </div>
                                <div class="details">
                                    <ul class="tags">
                                        <li><a href="#" <?= $popularPosts[2]['category_name'] ?></a></li>
                                    </ul>
                                    <a href="image-post.html">
                                        <h3><?= $popularPosts[2]['title'] ?></h3>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span><?= $popularPosts[2]['username'] ?></a></li>
                                        <li><a href="#"><?= $popularPosts[2]['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"><?= $popularPosts[2]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
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



    <?php require_once BASE_PATH . '/template/app/layouts/footer.php'; ?>

    <?php require_once BASE_PATH . '/template/app/layouts/scripts.php'; ?>

</body>

</html>