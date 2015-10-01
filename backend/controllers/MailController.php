<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;


class MailController extends Controller
{
    
    public function actionIndex()
    {   
      $mailbox = yii::$app->imap->connection;
      return $this->render('index', ['mailbox' => $mailbox]);
    }

    public function actionView($mailId){
        $mailbox = yii::$app->imap->connection;
        $mail = $mailbox->getMail($mailId);
        return $this->render('view', ['mail' => $mail]);
    }

}