<?php

use yii\db\Migration;

/**
 * Class m230426_190850_rbac_for_client
 */
class m230426_190850_rbac_for_client extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $auth = Yii::$app->authManager;

        $permissions = [
            'client/index' => 'Страница клиента - просмотр списка',
            'client/view' => 'Страница клиента - просмотр',
            'client/create' => 'Страница клиента - создание',
            'client/update' => 'Страница клиента - обновление',
            'client/delete' => 'Страница клиента - удаление',
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
