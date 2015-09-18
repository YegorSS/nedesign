<?php
namespace console\controllers;
use Yii;
use yii\console\Controller;
//use common\components\rbac\UserRoleRule;
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll(); //удаляем старые данные
   //     //Создадим для примера права для доступа к админке
   //     $dashboard = $auth->createPermission('dashboard');
   //     $dashboard->description = 'Админ панель';
   //     $auth->add($dashboard);
   //     //Включаем наш обработчик
   //     $rule = new UserRoleRule();
   //     $auth->add($rule);
        //Добавляем роли
        $user = $auth->createRole('user');
        $user->description = 'Пользователь';
        //$user->ruleName = $rule->name;
        $auth->add($user);
        $manager = $auth->createRole('manager');
        $manager->description = 'Менеджер';
        //$manager->ruleName = $rule->name;
        $auth->add($manager);

        $admin = $auth->createRole('admin');
        $admin->description = 'Администратор';
        //$admin->ruleName = $rule->name;
        $auth->add($admin);

        //Добавляем потомков
   //     $auth->addChild($manager, $user);
   //     $auth->addChild($manager, $dashboard);
   //     $admin = $auth->createRole('admin');
   //     $admin->description = 'Администратор';
   //     $admin->ruleName = $rule->name;
   //     $auth->add($admin);
   //     $auth->addChild($admin, $manager);
    }
}

