<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "muzik".
 *
 * @property int $id
 * @property string $name
 * @property string $artist
 * @property string $file
 * @property string $url
 */
class Muzik extends \yii\db\ActiveRecord
{
    public $file1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'muzik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'artist',  'url'], 'required'],
            [['name', 'artist', 'file'], 'string', 'max' => 256],
            [['file1'], 'file'],
            [['url'], 'string', 'max' => 200],
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
            'file' => 'FileUpload',
            'url' => 'Url',
        ];
    }
}
