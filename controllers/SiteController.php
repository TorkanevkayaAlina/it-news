<?php

namespace app\controllers;

use app\models\Categories;
use app\models\Post;
use app\models\PostSearch;
use app\models\PostToTag;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        $slider_posts = Post::find()
            ->orderBy(['rand()' => SORT_DESC])
            ->limit(5)
            ->all();

        $last_three_categories = Categories::find()
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(3)
            ->all();

        $last_five_posts = Post::find()
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(5)
            ->all();

        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'slider_posts' => $slider_posts,
            'last_categories' => $last_three_categories,
            'last_posts' => $last_five_posts,
            'dataProvider' => $dataProvider
        ]);
    }


    public function actionSingle($post_id)
    {
        $post = Post::findOne(['id' => $post_id]);

        $tags = PostToTag::find()
            ->where(['post_id' => $post->id])
            ->all();

        $last_five_posts = Post::find()
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(5)
            ->all();

        return $this->render('single', [
            'post' => $post,
            'tags' => $tags,
            'last_posts' => $last_five_posts
        ]);
    }


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }


    public function actionAbout()
    {
        return $this->render('about');
    }
}
