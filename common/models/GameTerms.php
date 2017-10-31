<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "game_terms".
 *
 * @property string $term_id
 * @property string $name
 * @property string $slug
 * @property string $term_group
 */
class GameTerms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game_terms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['term_group'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'term_id' => Yii::t('common', 'Term ID'),
            'name' => Yii::t('common', 'Name'),
            'slug' => Yii::t('common', 'Slug'),
            'term_group' => Yii::t('common', 'Term Group'),
        ];
    }
}
