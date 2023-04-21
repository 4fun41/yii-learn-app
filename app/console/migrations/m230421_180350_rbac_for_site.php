<?php

use yii\db\Migration;

/**
 * Class m230421_180350_rbac_for_site
 */
class m230421_180350_rbac_for_site extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $auth = Yii::$app->authManager;

        $permissions = [
            'site/index' => 'Страница сайта - просмотр',
        ];

        foreach ($permissions as $permission => $description)
        {
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
