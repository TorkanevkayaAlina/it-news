<?php
use yii\helpers\Url;
?>

<!-- Single Post -->
<div class="col-12">
    <div class="list-blog single-post d-sm-flex wow fadeInUpBig" data-wow-delay=".2s">
        <!-- Post Thumb -->
        <div class="post-thumb">
            <img src="<?= isset($model->image) ? '/web/'.$model->image : '' ?>" alt="post_image">
        </div>
        <!-- Post Content -->
        <div class="post-content">
            <div class="post-meta d-flex">
                <div class="post-author-date-area d-flex">
                    <!-- Post Author -->
                    <div class="post-author">
                        <a href="#"><?= $model->user->name ?></a>
                    </div>
                    <!-- Post Date -->
                    <div class="post-date">
                        <a href="<?= Url::to(['/site/single', 'post_id' => $model->id]) ?>"><?= date('F d, Y', strtotime($model->created_at)) ?></a>
                    </div>
                </div>
                <!-- Post Comment & Share Area -->
                <div class="post-comment-share-area d-flex">
                    <!-- Post Comments -->
                    <div class="post-comments">
                        <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>
                    </div>
                </div>
            </div>
            <a href="<?= Url::to(['/site/single', 'post_id' => $model->id]) ?>">
                <h4 class="post-headline"><?= $model->title ?></h4>
            </a>
            <p><?= $model->short_description ?></p>
            <a href="<?= Url::to(['/site/single', 'post_id' => $model->id]) ?>" class="read-more">Читать далее..</a>
        </div>
    </div>
</div>
