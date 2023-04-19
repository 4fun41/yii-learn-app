<?php

namespace backend\forms;

use common\models\User;
use Yii;
use yii\base\Model;

/**
 *
 * @property-read mixed $user
 */
class LoginForm extends Model
{
    public string $username = '';
    public string $password;
    private $_user;

    public function rules(): array
    {
        return [
            [['username', 'password'], 'required'],
            [['password'], 'validatePassword'],
        ];
    }

    public function attributeLabels(): array
    {
        return [

            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    public function validatePassword($attribute, $params): void
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    protected function getUser(): ?User
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }
        return $this->_user;
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), 0);
        }

        return false;
    }

}