<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%questions}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%discipline}}`
 */
class m200430_144245_create_questions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%questions}}', [
            'id' => $this->primaryKey(),
            'discipline_id' => $this->integer()->notNull(),
            'questions_text' => $this->text(),
            'picture' => $this->text(),
            'view' => $this->string(),
        ]);

        // creates index for column `discipline_id`
        $this->createIndex(
            '{{%idx-questions-discipline_id}}',
            '{{%questions}}',
            'discipline_id'
        );

        // add foreign key for table `{{%discipline}}`
        $this->addForeignKey(
            '{{%fk-questions-discipline_id}}',
            '{{%questions}}',
            'discipline_id',
            '{{%discipline}}',
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
            '{{%fk-questions-discipline_id}}',
            '{{%questions}}'
        );

        // drops index for column `discipline_id`
        $this->dropIndex(
            '{{%idx-questions-discipline_id}}',
            '{{%questions}}'
        );

        $this->dropTable('{{%questions}}');
    }
}
