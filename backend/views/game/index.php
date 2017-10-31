<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel common\models\GameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Games');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => Yii::t('backend', 'Game'),
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'category_id',
                'value' => function ($model) {
                    return $model->category_id ? $model->category->title : null;
                },
                'filter' => ArrayHelper::map(\common\models\GameCategory::find()->all(), 'id', 'title'),
                'options' => [
                    'style' => 'width:120px;',
                ]
            ],
            [
                'attribute' => 'type_id',
                'value' => function ($model) {
                    return $model->type_id ? $model->type->name : null;
                },
                'filter' => ArrayHelper::map(\common\models\GameType::find()->all(), 'id', 'name'),
                'options' => [
                    'style' => 'width:120px;',
                ]
            ],
            'slug',
            'title',
            'view',

            // 'embed_url:url',
            // 'thumbnail_base_url:url',
            // 'thumbnail_path',
             'status',
             'like',
            // 'created_by',
            // 'updated_by',
            // 'published_at',
            // 'created_at',
            // 'updated_at',
            // 'size',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
