<?php

use yii\db\Migration;

/**
 * Class m230426_190852_rbac_for_order
 */
class m230426_190852_rbac_for_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $auth = Yii::$app->authManager;

        $permissions = [
            'order/index' => 'Страница заказа - просмотр списка',
            'order/view' => 'Страница заказа - просмотр',
            'order/create' => 'Страница заказа - создание',
            'order/update' => 'Страница заказа - обновление',
            'order/delete' => 'Страница заказа - удаление',
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
