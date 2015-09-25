<?php
namespace backend\modules\subdomain\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\helpers\Url;
use yii\filters\VerbFilter;
use backend\modules\subdomain\models\Subdomain;


class SubdomainController extends Controller
{
    // ...
   public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'edit', 'delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    ],
                ]
            ];
    }
    
    public function actionIndex()
    {
      $subdomains = array_slice(scandir(Yii::getAlias('@common').'/config/db'), 2);
      return $this->render('index', ['subdomains' => $subdomains]);
    }

    public function actionCreate()
    {
      $subdomain = new Subdomain;

      if ($subdomain->load(Yii::$app->request->post()) && $subdomain->validate())
      {
        $db = $this->Db();

        $db->createCommand('CREATE DATABASE IF NOT EXISTS admin_' . $subdomain->name . ' DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;')->execute();
        $db = $this->Db('admin_' . $subdomain->name);
        $db->createCommand('GRANT ALL PRIVILEGES ON admin_' . $subdomain->name . '.* TO "admin_nedesign"@"localhost"; FLUSH PRIVILEGES;')->execute();
        $db->createCommand(file_get_contents(Yii::getAlias('@common').'/config/dump.sql'))->execute();

        $fileConfig = fopen(Yii::getAlias('@common').'/config/db/' . $subdomain->name .'.php', "w") or die("Unable to open file!");
        $txt = "<?php 

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=".MYSQL_HOST.";dbname=admin_".$subdomain->name."',
            'username' => '".DB_USER."',
            'password' => '".DB_PASS."',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
    ],
    'aliases' => [
        '@admin' => 'http://" .$subdomain->name .'.'. URL_ADMIN . "',
        '@front' => 'http://" .$subdomain->name .'.'. URL_FRONTEND . "',
    ],
];";
        fwrite($fileConfig, $txt);
        fclose($fileConfig);

        Yii::$app->session->setFlash('success', 'Поддомен создан!');
        return $this->redirect('index');
      } else{
        return $this->render('create', ['subdomain' => $subdomain]);
      }
    }

    public function actionEdit(){
        Yii::$app->session->setFlash('success', 'Поддомен удален!');
        return $this->redirect('index');
    }

    public function actionDelete($name){
        if(unlink(Yii::getAlias('@common').'/config/db/' . $name .'.php')){
            $db = $this->Db();
            if($db->createCommand('DROP DATABASE IF EXISTS admin_' . $name . ';')->execute()){
                Yii::$app->session->setFlash('success', 'Поддомен удален!');
                //Yii::$app->session->setFlash('success', 'Thank you ');
                return $this->redirect('index');
            }
        }
    }

    protected function Db($name = ROOT_DB_NAME){
      return new yii\db\Connection([
        'dsn' => 'mysql:host='.MYSQL_HOST.';dbname=' . $name,
        'username' => ROOT_DB_USER,
        'password' => ROOT_DB_PASS,
        'charset' => 'utf8',
      ]);
    }

    
   
}