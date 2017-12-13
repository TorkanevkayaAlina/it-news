<?php
use yii\helpers\Url;
use isaurssaurav\yii\comment\widgets\CommentWidget;

$this->title = 'Просмотр новости';
?>

<!-- ****** Single Blog Area Start ****** -->
<section class="single_blog_area section_padding_80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="row no-gutters">

                    <!-- Single Post Share Info -->
                    <div class="col-2 col-sm-1">
                        <div class="single-post-share-info mt-100">
                            <?= $post->f_status == 1 ? '<a href="'.$post->facebook.'" class="facebook" target=_blank><i class="fa fa-facebook" aria-hidden="true"></i></a>' : '' ?>
                            <?= $post->t_status == 1 ? '<a href="'.$post->twitter.'" class="twitter" target=_blank><i class="fa fa-twitter" aria-hidden="true"></i></a>' : '' ?>
                            <?= $post->g_status == 1 ? '<a href="'.$post->google.'" class="googleplus" target=_blank><i class="fa fa-google-plus" aria-hidden="true"></i></a>' : '' ?>
                            <?= $post->i_status == 1 ? '<a href="'.$post->instagram.'" class="instagram" target=_blank><i class="fa fa-instagram" aria-hidden="true"></i></a>' : '' ?>
                            <?= $post->p_status == 1 ? '<a href="'.$post->pinterest.'" class="pinterest" target=_blank><i class="fa fa-pinterest" aria-hidden="true"></i></a>' : '' ?>
                        </div>
                    </div>

                    <!-- Single Post -->
                    <div class="col-10 col-sm-11">
                        <div class="single-post">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <img src="<?= isset($post->image) ? '/web/'.$post->image : '' ?>" alt="post_image">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-meta d-flex">
                                    <div class="post-author-date-area d-flex">
                                        <!-- Post Author -->
                                        <div class="post-author">
                                            <a href="#"><?= $post->user->name ?></a>
                                        </div>
                                        <!-- Post Date -->
                                        <div class="post-date">
                                            <a href="#"><?= date('F d, Y', strtotime($post->created_at)) ?></a>
                                        </div>
                                    </div>
                                    <!-- Post Comment & Share Area -->
                                    <div class="post-comment-share-area d-flex">
                                        <div class="post-comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= isset($comment_count) ? $comment_count : 0 ?></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <h2 class="post-headline"><?= $post->title ?></h2>
                                </a>
                                <?= $post->description ?>
                            </div>
                        </div>

                        <!-- Tags Area -->
                        <?php if(isset($tags)): ?>
                            <div class="tags-area">
                                <?php foreach($tags as $tag): ?>
                                    <a href="#"><?= $tag->tag->name ?></a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?= CommentWidget::widget([
                            'post_id' => $_GET['post_id']
                        ]); ?>

                    </div>
                </div>
            </div>

            <!-- ****** Blog Sidebar ****** -->
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="blog-sidebar mt-5 mt-lg-0">

                    <!-- Single Widget Area -->
                    <div class="single-widget-area subscribe_widget text-center">
                        <div class="widget-title">
                            <h6>Подписаться</h6>
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
<!-- ****** Single Blog Area End ****** -->
