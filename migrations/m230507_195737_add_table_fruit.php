<?php

use yii\db\Migration;

/**
 * Class m230507_195737_add_table_fruit
 */
class m230507_195737_add_table_fruit extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%fruit}}',
            [
                'id' => $this->primaryKey(),
                'external_id' => $this->integer()->notNull(),
                'name' => $this->string(50)->notNull(),
                'family' => $this->string(50)->notNull(),
                'order' => $this->string(50)->notNull(),
                'genus' => $this->string(50)->notNull(),
                'created_at' => $this->integer()->notNull(),
                'updated_at' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%fruit}}');
    }
}
