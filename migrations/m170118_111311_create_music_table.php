<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation of table `music`.
 */
class m170118_111311_create_music_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('music', [
            'id' => $this->primaryKey(),
            'name' => Schema::TYPE_STRING . '(255)',
            'cover' => Schema::TYPE_STRING . '(255)',
            'performer' => Schema::TYPE_STRING . '(255)',
            'album_name' => Schema::TYPE_STRING . '(255)',
            'release_date' => Schema::TYPE_DATE,
            'created_at' => $this->timestamp()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('music');
    }
}
