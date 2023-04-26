<?php

use yii\db\Migration;

/**
 * Class m230426_190851_rbac_for_order_type
 */
class m230426_190851_rbac_for_order_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $auth = Yii::$app->authManager;

        $permissions = [
            'order-type/index' => 'Страница типа заказа - просмотр списка',
            'order-type/view' => 'Страница типа заказа - просмотр',
            'order-type/create' => 'Страница типа заказа - создание',
            'order-type/update' => 'Страница типа заказа - обновление',
            'order-type/delete' => 'Страница типа заказа - удаление',
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
