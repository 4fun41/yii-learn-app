<?php

use yii\db\Migration;

/**
 * Class m230421_180850_rbac_for_user
 */
class m230421_180850_rbac_for_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $auth = Yii::$app->authManager;

        $permissions = [
            'user/index' => 'Страница пользователя - просмотр списка',
            'user/view' => 'Страница пользователя - просмотр',
            'user/create' => 'Страница пользователя - создание',
            'user/update' => 'Страница пользователя - обновление',
            'user/delete' => 'Страница пользователя - удаление',
        ];

        foreach ($permissions as $permission => $description) {
            if (!$auth->getPermission($permission)) {
                $permission = $auth->createPermission($permission);
                $permission->description = $description;
                $auth->add($permission);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }
}
