<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student}}`.
 */
class m200430_144758_create_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'suname' => $this->string(),
            'midlename' => $this->string(),
            'engl_name' => $this->string(),
            'birthday' => $this->date(),
            'login' => $this->string(),
            'password' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%student}}');
    }
}
