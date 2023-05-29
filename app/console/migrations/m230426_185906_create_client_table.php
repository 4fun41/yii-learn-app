<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m230426_185906_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'phone' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%client}}');
    }
}
