<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;


class MailController extends Controller
{
    
    public function actionIndex()
    {   
      $mailbox = yii::$app->imap->connection;
      $boxs = $mailbox->setBox('INBOX');
      $mailIds = $mailbox->searchMailBox('ALL');
      $mails = $mailbox->getMailsInfo($mailIds);
      return $this->render('index', ['mails' => $mails, 'boxs' => $boxs]);
    }

    public function actionView($mailId){
        $mailbox = yii::$app->imap->connection;
        $mail = $mailbox->getMail($mailId);
        return $this->render('view', ['mail' => $mail]);
    }

}