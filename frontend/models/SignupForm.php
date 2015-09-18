<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required', 'message' => 'Данное поле необходимо заполнить.'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Этот логин уже занят.'],
            ['username', 'string', 'min' => 2, 'max' => 255, 'message' => 'Логин должен быть длиннее 2-х символов.'],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required', 'message' => 'Данное поле необходимо заполнить.'],
            ['email', 'email', 'message' => 'Неверный формат email.'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Пользователь с таким email уже существует.'],

            ['password', 'required', 'message' => 'Данное поле необходимо заполнить.'],
            ['password', 'string', 'min' => 6, 'message' => 'Пароль должен состоять из 6-и и более символов.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня'
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {

                // RBAC
                $auth = Yii::$app->authManager;
                $authorRole = $auth->getRole('user');
                $auth->assign($authorRole, $user->getId());
                // RBAC

                return $user;
            }
        }

        return null;
    }
}
