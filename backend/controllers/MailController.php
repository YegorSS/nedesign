<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;


class MailController extends Controller
{
    // ...
   public function behaviors()
    {
        return [
            //'access' => [
            //    'class' => AccessControl::className(),
            //    'rules' => [
            //        [
            //            'actions' => ['index', 'create', 'edit', 'delete'],
            //            'allow' => true,
            //            'roles' => ['admin'],
            //        ],
            //    ],
            //],
            //'verbs' => [
            //    'class' => VerbFilter::className(),
            //    'actions' => [
            //        'delete' => ['post'],
            //        ],
            //    ]
            ];
    }
    
    public function actionIndex()
    {
      return $this->render('index');
    }

    

    
   
}