<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\helpers\StringHelper;

use common\models\Categories;
use common\models\Carusel;
use common\models\Posts;
use common\models\Rating;
use common\models\Collback;
use common\models\Feedback;
use common\models\SearchForm;
use common\models\Pages;

use common\models\Products;
use common\models\Prices;
use common\models\Services;
use common\models\Variants;
use common\models\Size;
use common\models\Colors;
use common\models\Relations;
use common\models\News;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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

    /**
     * @inheritdoc
     */
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
      $this->view->params['model'] = 'Pages';
      $this->view->params['id'] = 1;
      $categories = Categories::find()->where(['active' => true]);
      $carusel = Carusel::find()->where(['active' => true])->all();
      $page = $this->findPages(1);
      return $this->render('index', ['categories' => $categories, 'carusel' => $carusel, 'page' => $page]);
    }

    
    public function actionPost($alias)
    {
      $post = $this->findPost($alias);
      $categories = Categories::find()->where(['active' => true]);
      $topposts = Posts::find()->where(['active' => true])->limit(5)->orderBy('(rate / voites) DESC')->all();
      
      $collback = new Collback();
      $feedback = new Feedback();
      
      $this->view->params['model'] = 'Posts';
      $this->view->params['id'] = $post->id;
      
      $_SESSION = Yii::$app->session;
      //$_SESSION->remove('viewPost');
      if (!isset($_SESSION['viewPost'])){
        $_SESSION['viewPost'][] = (int)$post->id;
      }else{
        if(in_array($post->id, $_SESSION['viewPost'])){
        }else{
        $_SESSION['viewPost'][] = (int)$post->id;
        }
        $_SESSION['viewPost'] = array_slice($_SESSION['viewPost'], -4);
      }
        $lastposts = Posts::find()->where(['id' => $_SESSION['viewPost']])->andWhere(['active' => true])->all();
        
      
       if($post->product_id){
        $product = $this->findProduct($post->product_id);
        //$workprice = Prices::find()->where(['product_id' => $product->id]);
        $services = Services::find()->all();
       }else{
         $product = false;
         $services = false;
       }
      
      
      return $this->render('viewpost', ['post' => $post,
          'categories' => $categories,
          'topposts' => $topposts,
          'collback' => $collback,
          'feedback' => $feedback,
          'lastposts' => $lastposts,
          'product' => $product,
          'services' => $services,
          ]);
    }

    public function actionNews($alias)
    {
      $news = $this->findNews($alias);
      $categories = Categories::find()->where(['active' => true]);
      $topposts = Posts::find()->where(['active' => true])->limit(5)->orderBy('(rate / voites) DESC')->all();
      
      $collback = new Collback();
      $feedback = new Feedback();
      
      $this->view->params['model'] = 'News';
      $this->view->params['id'] = $news->id;
      
      return $this->render('viewnews', ['news' => $news,
          'categories' => $categories,
          'topposts' => $topposts,
          'collback' => $collback,
          'feedback' => $feedback,
          ]);
    }
    
    public function actionCategory($id){
      $category = $this->findCategory($id);
      $categories = Categories::find()->where(['active' => true]);
      $topposts = Posts::find()->where(['active' => true])->limit(5)->orderBy('(rate / voites) DESC')->all();
      $collback = new Collback;
      $feedback = new Feedback();

      $this->view->params['model'] = 'Category';
      $this->view->params['id'] = $id;

      if($category->type == 'post')
      {
        $query = Posts::find()->where(['active' => true])->andWhere(['category_id' => $category->id]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>20]);
        $posts = $query->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();

      } elseif($category->type == 'news') {
        $query = News::find()->where(['active' => true])->andWhere(['category_id' => $category->id]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>20]);
        $posts = $query->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();
      }
      
      return $this->render('viewcategory', ['category' => $category,
                                            'categories' => $categories,
                                            'topposts' => $topposts,
                                            'collback' => $collback,
                                            'feedback' => $feedback,
                                            'posts' => $posts,
                                            'pages' => $pages,
                                            ]);
    }
    
    public function actionRating(){
      $type = $_POST['type'];
      $id = (int)$_POST['id'];
      $ratingAjax=isset($_POST['rate']) ? $_POST['rate'] : 0;
      switch ($type) {
          case 'post':
            $rating = Posts::findOne($id);
            break;
          case 'news':
            $rating = News::findOne($id);
            break;
          case 'category':
           $rating = $this->findCategory($id);
            break;
          case 'page':
           $rating = $this->findPages($id);
            break;
      }
       $rating->rate += $ratingAjax;
       $rating->voites ++ ;
       if($rating->validate()){
          $rating->save();
       }
    }

    public function actionTeg($teg)
    {
      $tegname = str_replace("-", " ", $teg);
      $categories = Categories::find()->where(['active' => true]);
      $post = Posts::find()->where(['like', 'tegs', $tegname])->one();
      $topposts = Posts::find()->where(['active' => true])->limit(5)->orderBy('(rate / voites) DESC')->all();
      $collback = new Collback();
      $feedback = new Feedback();

      return $this->render('teg', ['categories' => $categories,
                                  'post' => $post,
                                  'tegname' => $tegname,
                                  'topposts' => $topposts,
                                  'collback' => $collback,
                                  'feedback' => $feedback,
                                  ]);
    }

    public function actionContact()
    {
      $categories = Categories::find()->where(['active' => true]);
      $page = $this->findPages(2);

      $this->view->params['model'] = 'Pages';
      $this->view->params['id'] = 2;

      return $this->render('contact', ['categories' => $categories, 'page' => $page]);
    }

    public function actionAbout()
    {   
        $page = $this->findPages(3);
        $categories = Categories::find()->where(['active' => true]);
        $topposts = Posts::find()->where(['active' => true])->limit(5)->orderBy('(rate / voites) DESC')->all();
      
        $collback = new Collback();
        $feedback = new Feedback();

        $this->view->params['model'] = 'Pages';
        $this->view->params['id'] = 3;
        
        return $this->render('about', ['page' => $page, 'categories' => $categories, 'topposts' => $topposts, 'collback' => $collback, 'feedback' => $feedback]);
    }
    
    public function actionCreatecollback()
    {
        $model = new Collback();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
          $model->post = Yii::$app->request->referrer;
          $model->save();

          Yii::$app->mailer->compose('collback', ['model' => $model])
            ->setFrom('lalala@gmail.com')
            ->setTo('w0683636476@yandex.ru')
            ->setSubject('Поступил заказ звонка')
            ->send();

          Yii::$app->session->setFlash('success', 'Заказ звонка отправлен!');
          return $this->redirect(Yii::$app->request->referrer);
        } else {
            return $this->redirect(Yii::$app->request->referrer);
        }
    }
    
    public function actionCreatefeedback()
    {
        $model = new Feedback();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
          $model->post = Yii::$app->request->referrer;
          $model->save();

          Yii::$app->mailer->compose('feedback', ['model' => $model])
            ->setFrom('lalala@gmail.com')
            ->setTo('w0683636476@yandex.ru')
            ->setSubject('Поступил заказ консультации')
            ->send();

          Yii::$app->session->setFlash('success', 'Заказ консультации отправлен!');
          return $this->redirect(Yii::$app->request->referrer);
        } else {
            return $this->redirect(Yii::$app->request->referrer);
        }
    }
    
    public function actionSearch(){
      
      $verb = new SearchForm;
      $verb->text = Yii::$app->request->queryParams["SearchForm"]['text'];
      
      if($verb->validate()){
        $posts = Posts::find()->where(['like', 'text', $verb->text])->orWhere(['like', 'header_meny', $verb->text])->andWhere(['active' => true]);
      } else {
        return false;
      }
      
      return json_encode($posts->limit(10)->asArray()->all());
      
    }

    public function actionRss($type, $id)
    { 
      //if($type == 'Pages'){
      //  $query = Pages::find($id);
      //}

      switch($type){
        case 'Pages':
          $query = Pages::find()->where(['id' => $id]);
          $title = $query->one()->title;
          $link = Url::toRoute($query->one()->alias, true);
          $description = StringHelper::truncateWords($query->one()->description, 50);
          break;
        case 'Posts':
          $query = Posts::find()->where(['id' => $id]);
          $title = $query->one()->title;
          $link = Url::toRoute(['site/posts', 'alias'=> $query->one()->alias], true);
          $description = StringHelper::truncateWords($query->one()->description, 50);
          break;
        case 'News':
          $query = News::find()->where(['id' => $id]);
          $title = $query->one()->title;
          $link = Url::toRoute(['site/news', 'alias'=> $query->one()->alias], true);
          $description = StringHelper::truncateWords($query->one()->description, 50);
          break;
        case 'Category':
          $category = $this->findCategory($id);

          if($category->type == 'post'){
            $query = Posts::find()->where(['category_id' => $id]);
          }else{
            $query = News::find()->where(['category_id' => $id]);
          }

          $title = $category->title;
          $link = Url::toRoute(['site/category', 'id'=> $category->id], true);
          $description = StringHelper::truncateWords($category->description, 50);
          break;
      }

      $dataProvider = new ActiveDataProvider([
          'query' => $query,
      ]);
  
        $response = Yii::$app->getResponse();
        $headers = $response->getHeaders();
  
        $headers->set('Content-Type', 'application/rss+xml; charset=utf-8');
  
        $response->content = \Zelenin\yii\extensions\Rss\RssView::widget([
            'dataProvider' => $dataProvider,
            'channel' => [
                'title' => $title,
                'link' => $link,
                'description' => $description,
                'language' => Yii::$app->language
            ],
            'items' => [
                'title' => function ($model, $widget) {
                        return $model->title;
                    },
                'description' => function ($model, $widget) {
                        return StringHelper::truncateWords($model->description, 50);
                    },
                'link' => function ($model, $widget) {
                        return Url::toRoute(['post/view', 'id' => $model->id], true);
                    },
               // 'author' => function ($model, $widget) {
               //         return $model->user->email . ' (' . $model->user->username . ')';
               //     },
                //'guid' => function ($model, $widget) {
                //        $date = \DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
                //        return 'https://www.1design.org ' . $date->format(DATE_RSS);
                //    },
                'pubDate' => function ($model, $widget) {
                        $date = \DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
                        return $date->format(DATE_RSS);
                      }
            ]
      ]);
    }
    
    protected function findPost($alias)
    {
        if (($model = Posts::findOne(['alias' => $alias])) !== null && $model->active) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findNews($alias)
    {
        if (($model = News::findOne(['alias' => $alias])) !== null && $model->active) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findCategory($id)
    {
        if (($model = Categories::findOne($id)) !== null && $model->active) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findProduct($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findPages($id)
    {
      if (($model = Pages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
