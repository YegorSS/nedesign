<?php

namespace backend\controllers;

use Yii;
use common\models\News;
use common\models\NewsSearch;
use common\models\Categories;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();
        $categories = Categories::find()->where(['type' => 'news'])->orderBy('title')->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'categories' => $categories,
            ]);
        }
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $categories = Categories::find()->where(['type' => 'news'])->orderBy('title')->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'categories' => $categories,
            ]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionUrl()
    {

      $uploadedFile = UploadedFile::getInstanceByName('upload'); 
      $mime = \yii\helpers\FileHelper::getMimeType($uploadedFile->tempName);
      $file = time()."_".$uploadedFile->name;

      $url = Yii::getAlias('@web').'/../../frontend/web/uploads/ckeditor/'.$file;

      $uploadPath = Yii::getAlias('@webroot').'/../../frontend/web/uploads/ckeditor/'.$file;
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

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
