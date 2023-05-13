<?php

use yii\db\Migration;

/**
 * Class m230513_173543_rbac_for_guaranty
 */
class m230513_173543_rbac_for_guaranty extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $auth = Yii::$app->authManager;

        $permissions = [
            'guaranty/index' => 'Страница гарантии - просмотр списка',
            'guaranty/view' => 'Страница гарантии - просмотр',
            'guaranty/create' => 'Страница гарантии - создание',
            'guaranty/update' => 'Страница гарантии - обновление',
            'guaranty/delete' => 'Страница гарантии - удаление',
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
