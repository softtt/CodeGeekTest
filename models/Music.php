<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "music".
 *
 * @property integer $id
 * @property string $name
 * @property string $cover
 * @property string $performer
 * @property string $album_name
 * @property string $release_date
 * @property string $created_at
 */
class Music extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'music';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['release_date', 'created_at'], 'safe'],
            [['name', 'cover', 'performer', 'album_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'cover' => 'Cover',
            'performer' => 'Performer',
            'album_name' => 'Album Name',
            'release_date' => 'Release Date',
            'created_at' => 'Created At',
        ];
    }
}
