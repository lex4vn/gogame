<?php

namespace common\models;

use Yii;
use mongosoft\file\UploadImageBehavior;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "game_category".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property string $icon
 * @property string $image
 * @property string $meta_title
 * @property string $meta_description
 * @property integer $parent_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Game[] $games
 * @property GameCategory $parent
 * @property GameCategory[] $gameCategories
 */
class GameCategory extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'title'], 'required'],
            [['body','meta_title','meta_description'], 'string'],
            [['parent_id', 'status', 'id', 'created_at', 'updated_at'], 'integer'],
            [['slug'], 'string', 'max' => 1024],
            [['title'], 'string', 'max' => 512],
            [['icon'], 'string', 'max' => 256],
            ['image', 'image', 'extensions' => 'png, jpg', 'on' => ['insert', 'update']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => GameCategory::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'slug' => Yii::t('common', 'Slug'),
            'title' => Yii::t('common', 'Title'),
            'body' => Yii::t('common', 'Body'),
            'icon' => Yii::t('common', 'Icon'),
            'image' => Yii::t('common', 'Image'),
            'parent_id' => Yii::t('common', 'Parent ID'),
            'meta_title' => Yii::t('common', 'Meta Title'),
            'meta_description' => Yii::t('common', 'Meta Description'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }
    /**
     * @inheritdoc
     */
    function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => UploadImageBehavior::className(),
                'attribute' => 'image',
                'scenarios' => ['insert', 'update'],
                'path' => '@storage/web/images/categories',
               // 'url' => '@web/images/categories',
                'url' => '@storageUrl/images/categories',
            ],
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGames()
    {
        return $this->hasMany(Game::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(GameCategory::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGameCategories()
    {
        return $this->hasMany(GameCategory::className(), ['parent_id' => 'id']);
    }

    public static function popularCategories()
    {
        return GameCategory::find()->orderBy('created_at')->all();
    }
}
