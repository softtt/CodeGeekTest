<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation of table `event`.
 */
class m170118_111322_create_event_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('event', [
            'id' => $this->primaryKey(),
            'name' => Schema::TYPE_STRING . '(255)',
            'cover' => Schema::TYPE_STRING . '(255)' ,
            'place' => Schema::TYPE_STRING . '(255)' ,
            'start_date' => Schema::TYPE_DATE,
            'end_date' => Schema::TYPE_DATE,
            'created_at' => $this->timestamp()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('event');
    }
}
