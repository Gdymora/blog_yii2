<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%discipline}}`.
 */
class m200430_120456_create_discipline_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%discipline}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'engl_name' => $this->string(),
            'author' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%discipline}}');
    }
}
