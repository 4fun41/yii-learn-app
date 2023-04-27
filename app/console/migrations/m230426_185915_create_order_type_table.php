<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_type}}`.
 */
class m230426_185915_create_order_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_type}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_type}}');
    }
}
