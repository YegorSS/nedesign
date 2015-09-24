<?php
namespace backend\modules\subdomain\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
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
        $db->createCommand(file_get_contents(Yii::getAlias('@common').'/config/db/dump.sql'))->execute();

        $fileConfig = fopen(Yii::getAlias('@common').'/config/db/' . $subdomain->name .'.php', "w") or die("Unable to open file!");
        $txt = "<?php 

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=admin_".$subdomain->name."',
            'username' => 'admin_nedesign',
            'password' => '204766',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
    ],
    'aliases' => [
        '@admin' => 'http://" .$subdomain->name .'.'. $_SERVER['HTTP_HOST'] . "/admin',
        '@front' => 'http://" .$subdomain->name .'.'. $_SERVER['HTTP_HOST'] . "',
    ],
];";
        fwrite($fileConfig, $txt);
        fclose($fileConfig);

        return $this->redirect('index');
      } else{
        return $this->render('create', ['subdomain' => $subdomain]);
      }
    }

    public function actionEdit(){

    }

    public function actionDelete(){

    }

    protected function Db($name = 'admin_test'){
      return new yii\db\Connection([
        'dsn' => 'mysql:host=localhost;dbname=' . $name,
        'username' => 'root',
        'password' => 'lopes',
        'charset' => 'utf8',
      ]);
    }

    
   
}