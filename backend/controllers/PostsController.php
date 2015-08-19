<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\Posts;
use common\models\Postimage;
use common\models\Categories;
use common\models\Products;
use common\models\CategoriesSearch;
use common\models\PostsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\helpers\Url;

/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'view', 'create', 'update', 'delete', 'url', 'upload', 'deletemainimage', 'deleteimage'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Posts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Posts model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Posts();
        $categories = Categories::find()->where(['type' => 'post'])->orderBy('title')->all();
        $products = Products::find()->all();
        $postimage = new Postimage;

        if ($model->load(Yii::$app->request->post())) {
          
          if(!empty(UploadedFile::getInstance($model, 'mainimage'))){
          $model->mainimage = UploadedFile::getInstance($model, 'mainimage');
          $model->uploadmainimage();
          }
          
          
          $postimage->image = UploadedFile::getInstances($postimage, 'image');
          $postimage->uploadimages();
          
          $model->save();
          
          foreach(UploadedFile::getInstances($postimage, 'image') as $image){
            $postimage = new Postimage;
            $postimage->image = $image;
            $postimage->post_id = $model->id;
            $postimage->save();
          }
          
          
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model, 
                'categories' => $categories,
                'products' => $products,
                'postimage' => $postimage,
            ]);
        }
    }

    /**
     * Updates an existing Posts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
      
      
        $model = $this->findModel($id);
        $products = Products::find()->all();
        $categories = Categories::find()->all();
        $postimage = new Postimage;

        if ($model->load(Yii::$app->request->post())) {
          
         
          if(!empty(UploadedFile::getInstance($model, 'mainimage'))){
          $model->mainimage = UploadedFile::getInstance($model, 'mainimage');
          $model->uploadmainimage();
          }
          
          
          $postimage->image = UploadedFile::getInstances($postimage, 'image');
          $postimage->uploadimages();
          $model->save();
          
          foreach(UploadedFile::getInstances($postimage, 'image') as $image){
            $postimage = new Postimage;
            $postimage->image = $image;
            $postimage->post_id = $model->id;
            $postimage->save();
          }
            return $this->redirect(['index']);
            
           
         
        } else {
            return $this->render('update', [
                'model' => $model,
                'categories' => $categories,
                'products' => $products,
                'postimage' => $postimage,
            ]);
        }
    }

    /**
     * Deletes an existing Posts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $post = $this->findModel($id);
        
        $imageUrl = Yii::getAlias('@webroot').'/../../frontend/web/uploads/post/main/';
        
       if($post->mainimage)
       {
          unlink($imageUrl . $post->mainimage);
          unlink($imageUrl .'155/155'. $post->mainimage);
          unlink($imageUrl .'200/200'. $post->mainimage);
          unlink($imageUrl .'300/300'. $post->mainimage);
          unlink($imageUrl .'65/65'. $post->mainimage);
       }
       
       
       $imageUrl = Yii::getAlias('@webroot').'/../../frontend/web/uploads/post/images/';
        
       foreach($post->postimage as $image)
       {
         
        unlink($imageUrl . '90/90' . $image->image);
        unlink($imageUrl . $image->image);
        $image->delete();
       }
       
        
        $post->delete();
        
        
        

        return $this->redirect(['index']);
    }
    
    
    public function actionUrl()
    {

      $uploadedFile = UploadedFile::getInstanceByName('upload'); 
      $mime = \yii\helpers\FileHelper::getMimeType($uploadedFile->tempName);
      $file = time()."_".$uploadedFile->name;


      $url = Url::to('@front/uploads/ckeditor/'.$file);
      $uploadPath = Yii::getAlias('@webroot').'/../../frontend/web/uploads/ckeditor/'.$file;

      //$url = Url::to('@web/../../frontend/web/uploads/ckeditor/'.$file, true);
      //$uploadPath = Url::to('@webroot/../../frontend/web/uploads/ckeditor/'.$file, true);
      //extensive suitability check before doing anything with the file…
      if ($uploadedFile==null)
      {
        $message = "No file uploaded.";
      }
      else if ($uploadedFile->size == 0)
      {
        $message = "The file is of zero length.";
      }
      //else if ($mime!="image/jpeg" && $mime!="image/png")
      //{
      //  $message = "The image must be in either JPG or PNG format. Please upload a JPG or PNG instead.";
      //}
      else if ($uploadedFile->tempName==null)
      {
        $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
      }
      else {
        $message = "";
        $move = $uploadedFile->saveAs($uploadPath);
        if(!$move)
        {
          $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
        } 
      }
      $funcNum = $_GET['CKEditorFuncNum'];
      echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
    }
    
    
    
    
    public function actionUpload($main)
    {
   
    //$postimage = new Postimage;
    $fileName = 'file';
    $uploadPath = Yii::getAlias('@webroot').'/../../frontend/web/uploads/post/img/';

    if (isset($_FILES[$fileName])) {
        $file = \yii\web\UploadedFile::getInstanceByName($fileName);
        
        
        

        //Print file data
        //print_r($file);

        if ($file->saveAs($uploadPath . $file->name)) {
          
          if($main == 1){
          Image::thumbnail($uploadPath . $file->name, 300, 300)
            ->save($uploadPath . '300x300' . $file->name);
          Image::thumbnail($uploadPath . $file->name, 65, 65)
            ->save($uploadPath . '65x65' . $file->name);
          Image::thumbnail($uploadPath . $file->name, 155, 155)
            ->save($uploadPath . '155x155' . $file->name);
          Image::thumbnail($uploadPath . $file->name, 200, 200)
            ->save($uploadPath . '200x200' . $file->name);
          }
          
            //Now save file data to database
            //$postimage->image = $file->name;
            //$postimage->save();
            echo \yii\helpers\Json::encode($file);
        }
    }

      return false;
    }
    
    
    public function actionDeletemainimage($id){
      $model = $this->findModel($id);
      
       $products = Products::find()->all();
        $categories = Categories::find()->all();
        $postimage = new Postimage;
        
        
        $imageUrl = Yii::getAlias('@webroot').'/../../frontend/web/uploads/post/main/';
        
        if(file_exists($imageUrl . $model->mainimage)){
          unlink($imageUrl . $model->mainimage);
          unlink($imageUrl .'155/155'. $model->mainimage);
          unlink($imageUrl .'200/200'. $model->mainimage);
          unlink($imageUrl .'300/300'. $model->mainimage);
          unlink($imageUrl .'65/65'. $model->mainimage);
        }
       $model->mainimage = false;
       $model->save();
      
     
      return $this->render('update', [
                'model' => $model,
                'categories' => $categories,
                'products' => $products,
                'postimage' => $postimage,
            ]);
    }
    
    
    
    public function actionDeleteimage($id){
      $image = $this->findImage($id);
      $post = $this->findModel($image->post_id);
      
       $products = Products::find()->all();
        $categories = Categories::find()->all();
        $postimage = new Postimage;
        
        
        $imageUrl = Yii::getAlias('@webroot').'/../../frontend/web/uploads/post/images/';
        if(file_exists($imageUrl . $image->image)){
          unlink($imageUrl . '90/90' . $image->image);
          unlink($imageUrl . $image->image);
        }
        
        
      $image->delete();
      
      
      return $this->render('update', [
                'model' => $post,
                'categories' => $categories,
                'products' => $products,
                'postimage' => $postimage,
            ]);
    }
    

    /**
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findImage($id)
    {
        if (($model = Postimage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    
}
