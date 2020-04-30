<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%exam}}`.
 */
class m200430_140325_create_exam_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%exam}}', [
            'id' => $this->primaryKey(),
            'name_exam' => $this->string(),
            'engl_name_exam' => $this->string(),
            'number_of_questions' => $this->integer()->notNull(),
            'time_of_action' => $this->timestamp(),
            'validity' => $this->boolean(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%exam}}');
    }
}
