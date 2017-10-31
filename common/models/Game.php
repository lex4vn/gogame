<?php

namespace common\models;

use common\models\query\GameQuery;
use trntv\filekit\behaviors\UploadBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use Yii;
/**
 * This is the model class for table "game".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property integer $category_id
 * @property string $meta_title
 * @property string $meta_description
 * @property string $image
 * @property string $file_content
 * @property string $file_content_type
 * @property integer $file_height
 * @property integer $file_width
 * @property string $file_render_type
 * @property string $file_networking
 * @property string $file_orientation
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property integer $status
 * @property integer $liked
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $published_at
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $size
 * @property integer $mobile_available
 * @property integer $desktop_available
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Game extends \yii\db\ActiveRecord
{
    
    /**
     * @var array
     */
    public $thumbnail;

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
            [['id', 'slug', 'title'], 'required'],
            [['id', 'category_id', 'file_height', 'file_width', 'status', 'liked', 'created_by', 'updated_by', 'published_at', 'created_at', 'updated_at', 'mobile_available', 'desktop_available'], 'integer'],
            [['description'], 'string'],
            [['slug', 'file_content', 'thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
            [['title'], 'string', 'max' => 512],
            [['meta_title', 'size'], 'string', 'max' => 100],
            [['meta_description'], 'string', 'max' => 1000],
            [['image'], 'string', 'max' => 200],
            [['file_content_type', 'file_render_type'], 'string', 'max' => 50],
            [['file_networking', 'file_orientation'], 'string', 'max' => 20],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
    
    /**
    * @inheritdoc
    */
   public function behaviors()
   {
       return [
           TimestampBehavior::className(),
           BlameableBehavior::className(),
           [
               'class' => SluggableBehavior::className(),
               'attribute' => 'title',
               'immutable' => true
           ],
           [
               'class' => UploadBehavior::className(),
               'attribute' => 'thumbnail',
               'pathAttribute' => 'thumbnail_path',
               'baseUrlAttribute' => 'thumbnail_base_url'
           ]
       ];
   }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'title' => 'Title',
            'description' => 'Description',
            'category_id' => 'Category ID',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'image' => 'Image',
            'file_content' => 'File Content',
            'file_content_type' => 'File Content Type',
            'file_height' => 'File Height',
            'file_width' => 'File Width',
            'file_render_type' => 'File Render Type',
            'file_networking' => 'File Networking',
            'file_orientation' => 'File Orientation',
            'thumbnail_base_url' => 'Thumbnail Base Url',
            'thumbnail_path' => 'Thumbnail Path',
            'status' => 'Status',
            'liked' => 'Liked',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'published_at' => 'Published At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'size' => 'Style for game',
            'mobile_available' => 'Mobile Available',
            'desktop_available' => 'Desktop Available',
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
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
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
   public function getType() 
   { 
       return $this->hasOne(GameType::className(), ['id' => 'type_id']); 
   }

 
   public static function newGames() 
   { 
       return Game::find()->orderBy('created_at')->all(); 
   } 
 
   public static function hotGames() 
   { 
       return Game::find()->orderBy('created_at')->all(); 
   } 
 
   public function getUrl() 
   { 
       return $this->thumbnail_base_url . '/' . $this->thumbnail_path; 
   } 
   
    /**
     * @inheritdoc
     * @return \common\models\query\GameQuery the active query used by this AR class.
     */
     
    public static function find()
    {
        return new \common\models\query\GameQuery(get_called_class());
    }
}
