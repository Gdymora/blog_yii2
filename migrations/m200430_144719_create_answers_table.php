<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%answers}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%questions}}`
 */
class m200430_144719_create_answers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%answers}}', [
            'id' => $this->primaryKey(),
            'question_id' => $this->integer()->notNull(),
            'answers_name' => $this->string(),
            'status' => $this->boolean(),
        ]);

        // creates index for column `question_id`
        $this->createIndex(
            '{{%idx-answers-question_id}}',
            '{{%answers}}',
            'question_id'
        );

        // add foreign key for table `{{%questions}}`
        $this->addForeignKey(
            '{{%fk-answers-question_id}}',
            '{{%answers}}',
            'question_id',
            '{{%questions}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%questions}}`
        $this->dropForeignKey(
            '{{%fk-answers-question_id}}',
            '{{%answers}}'
        );

        // drops index for column `question_id`
        $this->dropIndex(
            '{{%idx-answers-question_id}}',
            '{{%answers}}'
        );

        $this->dropTable('{{%answers}}');
    }
}
