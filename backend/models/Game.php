<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "game".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property string $view
 * @property integer $category_id
 * @property string $embed_url
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property integer $status
 * @property integer $like
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $published_at
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $createdBy
 * @property GameCategory $category
 * @property User $updatedBy
 */
class Game extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'title', 'body'], 'required'],
            [['body'], 'string'],
            [['category_id', 'status', 'like', 'created_by', 'updated_by', 'published_at', 'created_at', 'updated_at'], 'integer'],
            [['slug', 'embed_url', 'thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
            [['title'], 'string', 'max' => 512],
            [['view'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => GameCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'slug' => Yii::t('app', 'Slug'),
            'title' => Yii::t('app', 'Title'),
            'body' => Yii::t('app', 'Body'),
            'view' => Yii::t('app', 'View'),
            'category_id' => Yii::t('app', 'Category ID'),
            'embed_url' => Yii::t('app', 'Embed Url'),
            'thumbnail_base_url' => Yii::t('app', 'Thumbnail Base Url'),
            'thumbnail_path' => Yii::t('app', 'Thumbnail Path'),
            'status' => Yii::t('app', 'Status'),
            'like' => Yii::t('app', 'Like'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'published_at' => Yii::t('app', 'Published At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(GameCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
