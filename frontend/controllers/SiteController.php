<?php
namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
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
use common\models\Orders;

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
        $query = Posts::find()->where(['active' => true])->andWhere(['category_id' => $category->id])->orderBy('header_meny');
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
          $model->time = isset(Yii::$app->request->post()['hour']) ? Yii::$app->request->post()['hour'] .":". Yii::$app->request->post()['minute'] : false;
          $model->save();

          Yii::$app->mailer->compose('collback', ['model' => $model])
            ->setFrom('p@charlotteprinting.net')
            ->setTo('w0683636476@yandex.ru')
            ->setSubject('Поступил заказ звонка')
            ->send();





                  ////////////Отправка формы в vTiger /////
                  $url = 'http://vtiger.charlotteprinting.net/modules/Webforms/capture.php';
                  $data = array('__vtrftk' => 'sid:c275c26e496f98ef30c0d6da84dac639f505eb33,1442308885',
                                'publicid' => 'eb54b85589b95d803a520c39749ef85b',
                                'name' => 'Заказ звонка',
                                'VTIGER_RECAPTCHA_PUBLIC_KEY' => 'RECAPTCHA PUBLIC KEY FOR THIS DOMAIN',
                                'lastname' => ($model->name) ? $model->name : 'Аноним',
                                'phone' => $model->tel,
                                'label:1DesignUrl' => $model->post,
                                );
                  
                  // use key 'http' even if you send the request to https://...
                  $options = array(
                      'http' => array(
                          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                          'method'  => 'POST',
                          'content' => http_build_query($data),
                      ),
                  );
                  $context  = stream_context_create($options);
                  file_get_contents($url, false, $context);

                  ////////////Отправка формы в vTiger /////



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
            ->setFrom('p@charlotteprinting.net')
            ->setTo('w0683636476@yandex.ru')
            ->setSubject('Поступил заказ консультации')
            ->send();




            ////////////Отправка формы в vTiger /////
                  $url = 'http://vtiger.charlotteprinting.net/modules/Webforms/capture.php';
                  $data = array('__vtrftk' => 'sid:a42bdbd6466eda20665dc342b948083a3b799b90,1442314590',
                                'publicid' => '28901a50c809686a7aee88c23c5e78ef',
                                'name' => 'Заказ консультации',
                                'VTIGER_RECAPTCHA_PUBLIC_KEY' => 'RECAPTCHA PUBLIC KEY FOR THIS DOMAIN',
                                'lastname' => $model->name,
                                'company' => $model->company,
                                'email' => $model->email,
                                'phone' => $model->tel,
                                'description' => $model->coment,
                                'label:1DesignUrl' => $model->post,
                                );
                  
                  // use key 'http' even if you send the request to https://...
                  $options = array(
                      'http' => array(
                          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                          'method'  => 'POST',
                          'content' => http_build_query($data),
                      ),
                  );
                  $context  = stream_context_create($options);
                  file_get_contents($url, false, $context);

            ////////////Отправка формы в vTiger /////




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
      
      return json_encode($posts->asArray()->all());
      
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
          $link = Url::toRoute(['site/post', 'alias'=> $query->one()->alias], true);
          $description = StringHelper::truncateWords($query->one()->description, 50);
          break;
        case 'News':
          $query = News::find()->where(['id' => $id]);
          $title = $query->one()->title;
          $link = Url::toRoute(['site/news', 'alias'=> $query->one()->alias], true);
          $description = StringHelper::truncateWords($query->one()->description, 50);
          $itemLink = 'news';
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

        default:
          $query = Pages::find()->where(['id' => 1]);
          $title = $query->one()->title;
          $link = Url::toRoute($query->one()->alias, true);
          $description = StringHelper::truncateWords($query->one()->description, 50);
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
                    if (isset($model->categories)){
                      if( $model->categories->type == 'news'){
                        return Url::toRoute( '/news/'.$model->alias, true);
                      }
                    }
                        return Url::toRoute( '/'.$model->alias, true);
                    },
               // 'author' => function ($model, $widget) {
               //         return $model->user->email . ' (' . $model->user->username . ')';
               //     },
               // 'guid' => function ($model, $widget) {
               //     if (isset($model->categories)){
               //       if( $model->categories->type == 'news'){
               //         $date = \DateTime::createFromFormat('Y-m-d H:i:s', $model->created);
               //         return Url::toRoute('/news/'.$model->alias, true) . ' ' . $date->format(DATE_RSS);
               //       }
               //     }
               //         $date = \DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
               //         return Url::toRoute('/'.$model->alias, true) . ' ' . $date->format(DATE_RSS);
               //     },
                'pubDate' => function ($model, $widget) {
                    if (isset($model->categories)){
                      if( $model->categories->type == 'news'){
                        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $model->created);
                        return $date->format(DATE_RSS);
                      }
                    }

                        $date = \DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
                        return $date->format(DATE_RSS);
                      }
            ]
      ]);
    }

    public function actionCreateorder(){
      $model = new Orders();
      if ($model->load(Yii::$app->request->post()) && $model->validate()) {
          $model->created = date("Y-m-d H:i:s");
          $model->save();





          ////////////Отправка формы в vTiger /////
                  $url = 'http://vtiger.charlotteprinting.net/modules/Webforms/capture.php';
                  $data = array('__vtrftk' => 'sid:f182bcf6aa4d36711be81cb6fc31a042c99c177e,1442315451',
                                'publicid' => 'fccfe2cd1b000adc906feb325f4a2939',
                                'name' => 'Заказ продукции',
                                'VTIGER_RECAPTCHA_PUBLIC_KEY' => 'RECAPTCHA PUBLIC KEY FOR THIS DOMAIN',
                                'lastname' => $model->name,
                                'email' => $model->mail,
                                'phone' => $model->telephone,
                                'description' => $model->details,
                                );
                  
                  // use key 'http' even if you send the request to https://...
                  $options = array(
                      'http' => array(
                          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                          'method'  => 'POST',
                          'content' => http_build_query($data),
                      ),
                  );
                  $context  = stream_context_create($options);
                  file_get_contents($url, false, $context);

            ////////////Отправка формы в vTiger /////

          //Yii::$app->mailer->compose('feedback', ['model' => $model])
          //  ->setFrom('p@charlotteprinting.net')
          //  ->setTo('w0683636476@yandex.ru')
          //  ->setSubject('Поступил заказ консультации')
          //  ->send();

          Yii::$app->session->setFlash('success', 'Заказ отправлен!');
          return $this->redirect(Yii::$app->request->referrer);
        } else {
            return $this->redirect(Yii::$app->request->referrer);
        }
    }


    public function actionLogin()
    {
      $categories = Categories::find()->where(['active' => true]);
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        } else {
            return $this->render('login', [
                'model' => $model,
                'categories' => $categories,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRequestPasswordReset()
    {
      $categories = Categories::find()->where(['active' => true]);
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'На Ваш email было отправленно письмо с дальнейшей инструкцией.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    public function actionResetPassword($token)
    {
      $categories = Categories::find()->where(['active' => true]);
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'Новый пароль сохранен.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    public function actionSignup()
    {
      $categories = Categories::find()->where(['active' => true]);
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
            'categories' => $categories,
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
