<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%discipline_exam}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%discipline}}`
 * - `{{%exam}}`
 */
class m200430_144123_create_discipline_exam_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%discipline_exam}}', [
            'id' => $this->primaryKey(),
            'discipline_id' => $this->integer()->notNull(),
            'exam_id' => $this->integer()->notNull(),
            'number_of_questions' => $this->integer(),
        ]);

        // creates index for column `discipline_id`
        $this->createIndex(
            '{{%idx-discipline_exam-discipline_id}}',
            '{{%discipline_exam}}',
            'discipline_id'
        );

        // add foreign key for table `{{%discipline}}`
        $this->addForeignKey(
            '{{%fk-discipline_exam-discipline_id}}',
            '{{%discipline_exam}}',
            'discipline_id',
            '{{%discipline}}',
            'id',
            'CASCADE'
        );

        // creates index for column `exam_id`
        $this->createIndex(
            '{{%idx-discipline_exam-exam_id}}',
            '{{%discipline_exam}}',
            'exam_id'
        );

        // add foreign key for table `{{%exam}}`
        $this->addForeignKey(
            '{{%fk-discipline_exam-exam_id}}',
            '{{%discipline_exam}}',
            'exam_id',
            '{{%exam}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%discipline}}`
        $this->dropForeignKey(
            '{{%fk-discipline_exam-discipline_id}}',
            '{{%discipline_exam}}'
        );

        // drops index for column `discipline_id`
        $this->dropIndex(
            '{{%idx-discipline_exam-discipline_id}}',
            '{{%discipline_exam}}'
        );

        // drops foreign key for table `{{%exam}}`
        $this->dropForeignKey(
            '{{%fk-discipline_exam-exam_id}}',
            '{{%discipline_exam}}'
        );

        // drops index for column `exam_id`
        $this->dropIndex(
            '{{%idx-discipline_exam-exam_id}}',
            '{{%discipline_exam}}'
        );

        $this->dropTable('{{%discipline_exam}}');
    }
}
