<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation of table `movie`.
 */
class m170118_104651_create_movie_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('movie', [
            'id' => $this->primaryKey(),
            'name' => Schema::TYPE_STRING . '(255)' ,
            'cover' => Schema::TYPE_STRING . '(255)' ,
            'release_date' => Schema::TYPE_DATE ,
            'created_at' => $this->timestamp()->notNull(),
        ]);
        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('movie');
    }
}
