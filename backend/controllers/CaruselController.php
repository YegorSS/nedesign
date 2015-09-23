<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\Carusel;
use common\models\CaruselSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * CaruselController implements the CRUD actions for Carusel model.
 */
class CaruselController extends Controller
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
                        'actions' => ['logout', 'index', 'view', 'create', 'update', 'delete', 'upload', 'deleteimage'],
                        'allow' => true,
                        'roles' => ['admin', 'manager'],
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
     * Lists all Carusel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CaruselSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Carusel model.
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
     * Creates a new Carusel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Carusel();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
          
          
          if(!empty(UploadedFile::getInstance($model, 'image'))){
          $model->image = UploadedFile::getInstance($model, 'image');
          $model->uploadimage();
          }
          
          if($model->save()){
            return $this->redirect(['index']);
          }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

  
    /**
     * Updates an existing Carusel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
          
          if(!empty(UploadedFile::getInstance($model, 'image'))){
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->uploadimage();
          }
           if( $model->save()){
              return $this->redirect(['index']);
           }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    

    /**
     * Deletes an existing Carusel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    
    public function actionUpload()
    {
    
    //$postimage = new Postimage;
    $fileName = 'file';
    $uploadPath = Yii::getAlias('@frontend').'/web/uploads/carusel/img/';

    if (isset($_FILES[$fileName])) {
        $file = \yii\web\UploadedFile::getInstanceByName($fileName);
        
        

        //Print file data
        //print_r($file);

        if ($file->saveAs($uploadPath . $file->name)) {
            //Now save file data to database
            //$postimage->image = $file->name;
            //$postimage->save();
            echo \yii\helpers\Json::encode($file);
        }
    }

      return false;
    }
    
    public function actionDeleteimage($id){
      $model = $this->findModel($id);
        
        
        $imageUrl = Yii::getAlias('@frontend').'/web/uploads/carusel/img/';
        
        if(file_exists($imageUrl . $model->image)){
          unlink($imageUrl . $model->image);
        }
       $model->image = false;
       $model->save();
      
     
      return $this->render('update', [
                'model' => $model
            ]);
    }

    /**
     * Finds the Carusel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Carusel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Carusel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
