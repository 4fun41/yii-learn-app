<?php

use yii\db\Migration;

/**
 * Class m230510_181424_dev
 */
class m230510_181424_dev extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $auth = Yii::$app->authManager;

        $developerRole = $auth->createRole('Developer');

        $auth->add($developerRole);

        $permissions = $auth->getPermissions();

        foreach ($permissions as $permission) {
            $auth->addChild($developerRole, $permission);
        }

        $this->batchInsert(
            'user', ['email', 'auth_key', 'username', 'password_hash', 'created_at', 'updated_at'], [
                [
                    'Developer@mail.ru',
                    'Developer',
                    'Developer',
                    '$2y$13$DlHGpyqt4gLQaTymkGoRR.gPDBKCTDTrB/xarORCVa4WkGJyCJuFC',
                    '0',
                    '0',
                ],
            ]
        );

        $auth->assign($developerRole, $this->db->lastInsertID);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230510_181424_dev cannot be reverted.\n";

        return false;
    }

}
