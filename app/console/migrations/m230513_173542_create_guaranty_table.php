<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%guaranty}}`.
 */
class m230513_173542_create_guaranty_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%guaranty}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%guaranty}}');
    }
}
