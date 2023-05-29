<?php

namespace console\controllers;

use common\models\User;
use Yii;
use yii\console\Controller;

/**
 *
 * @property-write string $password
 */
class UserController extends Controller
{
    protected string $username;


    public function actionCreate(): bool
    {
        $user = new User();
        $user->username = 'admin';
        $user->password_reset_token;
        $user->password_hash = Yii::$app->security->generatePasswordHash('Password123');
        $user->auth_key = Yii::$app->security->generateRandomString();
        $user->email = 'admin@test.ru';
        $user->status = 10;
        $user->created_at = 0;
        $user->updated_at = 0;
        $user->validate();
        var_dump($user->getErrors());

        $auth = Yii::$app->authManager;

        $adminRole = $auth->createRole('admin');

        $auth->add($adminRole);

        $permissions = $auth->getPermissions();

        foreach ($permissions as $permission) {
            $auth->addChild($adminRole, $permission);
        }
        $user->find->where(['Username'=>'admin'])->one();
        $auth->assign($adminRole, $user->id);
        return $user->save();
    }
//

}