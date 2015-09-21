<?php
namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\helpers\Url;
use common\models\User;
use common\models\Categories;

class AccountController extends Controller
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $categories = Categories::find()->where(['active' => true]);
        return $this->render('index', ['categories' => $categories]);
    }

    public function actionUpdate()
    {
    	$categories = Categories::find()->where(['active' => true]);
        $user = $this->findModel(Yii::$app->user->identity->id);

        if ($user->load(Yii::$app->request->post()) && $user->validate()){
            $user->save();
            Yii::$app->session->setFlash('success', 'Ваши данные изменены!');
        }
    	return $this->render('update', ['categories' => $categories, 'user' => $user]);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}