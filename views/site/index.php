<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = 'Вайти_вайти';
?>

<?php if(isset($slider_posts) && !empty($slider_posts)): ?>
    <!-- ****** Welcome Post Area Start ****** -->
    <section class="welcome-post-sliders owl-carousel">

        <?php foreach($slider_posts as $item): ?>
        <!-- Single Slide -->
            <div class="welcome-single-slide">
                <!-- Post Thumb -->
                <img class="main-carousel" src="<?= isset($item->image) ? '/web/'.$item->image : '' ?>" alt="slider_image">
                <!-- Overlay Text -->
                <div class="project_title">
                    <div class="post-date-commnents d-flex">
                        <a href="<?= Url::to(['/site/single', 'post_id' => $item->id]) ?>"><?= date('F d, Y', strtotime($item->created_at)) ?>May 19, 2017</a>
                        <a href="<?= Url::to(['/site/single', 'post_id' => $item->id]) ?>">5 Comment</a>
                    </div>
                    <a href="<?= Url::to(['/site/single', 'post_id' => $item->id]) ?>">
                        <h5><?= $item->title ?></h5>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>

    </section>
    <!-- ****** Welcome Area End ****** -->
<?php endif; ?>

<!-- ****** Categories Area Start ****** -->
<?php if(isset($last_categories) && !empty($last_categories)): ?>
    <section class="categories_area clearfix" id="about">
        <div class="container">
            <div class="row">
                <?php foreach($last_categories as $category): ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single_catagory wow fadeInUp" data-wow-delay=".3s">
                        <img class="img img-responsive" src="<?= isset($category->image) ? '/web/'.$category->image : '' ?>" alt="category_image">
                        <div class="catagory-title">
                            <a href="<?= Url::to(['/site/index', 'PostSearch[category]' => $category->id]) ?>">
                                <h5><?= $category->title ?></h5>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- ****** Categories Area End ****** -->

<!-- ****** Blog Area Start ****** -->
<section class="blog_area section_padding_0_80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="row">
                    <!-- ******* List Blog Area Start ******* -->

                    <?php Pjax::begin(['id' => 'a_list']); ?>
                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'summary' => '',
                        'itemView' => '_post',
                        'options' => [
                            'tag' => false,
                        ],
                        'itemOptions' => [
                            'tag' => false
                        ]
                    ]); ?>
                    <?php Pjax::end() ?>


                </div>
            </div>

            <!-- ****** Blog Sidebar ****** -->
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="blog-sidebar mt-5 mt-lg-0">

                    <!-- Single Widget Area -->
                    <div class="single-widget-area subscribe_widget text-center">
                        <div class="widget-title">
                            <h6>Subscribe &amp; Follow</h6>
                        </div>
                        <div class="subscribe-link">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <!-- Single Widget Area -->
                    <?php if(isset($last_posts) && !empty($last_posts)): ?>
                        <div class="single-widget-area popular-post-widget">
                            <div class="widget-title text-center">
                                <h6>Последние новости</h6>
                            </div>
                            <?php foreach($last_posts as $post): ?>
                                <!-- Single Popular Post -->
                                <div class="single-populer-post d-flex">
                                    <img src="<?= isset($post->image) ? '/web/'.$post->image : '' ?>" alt="post_image">
                                    <div class="post-content">
                                        <a href="<?= Url::to(['/site/single', 'post_id' => $post->id]) ?>">
                                            <h6><?= $post->title ?></h6>
                                        </a>
                                        <p><?= date('l, F d, Y', strtotime($post->created_at)) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ****** Blog Area End ****** -->

<!-- ****** Instagram Area Start ****** -->
<div class="instargram_area owl-carousel section_padding_100_0 clearfix" id="portfolio">

    <!-- Instagram Item -->
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="/web/img/instagram-img/1.jpg" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instagram Item -->
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="/web/img/instagram-img/2.jpg" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instagram Item -->
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="/web/img/instagram-img/3.jpg" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instagram Item -->
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="/web/img/instagram-img/4.jpg" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instagram Item -->
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="/web/img/instagram-img/5.jpg" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instagram Item -->
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="/web/img/instagram-img/6.jpg" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instagram Item -->
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="/web/img/instagram-img/1.jpg" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instagram Item -->
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="/web/img/instagram-img/2.jpg" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ****** Our Creative Portfolio Area End ****** -->

<!-- ****** Footer Social Icon Area Start ****** -->
<div class="social_icon_area clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-social-area d-flex">
                    <div class="single-icon">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i><span>facebook</span></a>
                    </div>
                    <div class="single-icon">
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twitter</span></a>
                    </div>
                    <div class="single-icon">
                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i><span>GOOGLE+</span></a>
                    </div>
                    <div class="single-icon">
                        <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i><span>linkedin</span></a>
                    </div>
                    <div class="single-icon">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
                    </div>
                    <div class="single-icon">
                        <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i><span>VIMEO</span></a>
                    </div>
                    <div class="single-icon">
                        <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i><span>YOUTUBE</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ****** Footer Social Icon Area End ****** -->