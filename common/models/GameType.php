<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "game_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $name_ascii
 * @property integer $status
 * @property string $description
 *
 * @property Game[] $games
 */
class GameType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id', 'status'], 'integer'],
            [['name', 'name_ascii'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name' => Yii::t('common', 'Name'),
            'name_ascii' => Yii::t('common', 'Name Ascii'),
            'status' => Yii::t('common', 'Status'),
            'description' => Yii::t('common', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGames()
    {
        return $this->hasMany(Game::className(), ['type_id' => 'id']);
    }
}
