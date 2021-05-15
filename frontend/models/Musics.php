<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "musics".
 *
 * @property int $id
 * @property string $name
 * @property string $artist
 * @property string $url
 */
class Musics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'musics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'artist', 'url'], 'required'],
            [['name', 'artist'], 'string', 'max' => 100],
            [['url'], 'string', 'max' => 200],
            [['file'], 'file', 'skipOnEmpty'=>true ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'artist' => 'Artist',
            'url' => 'Url',
            'file' => 'File',
        ];
    }
}
