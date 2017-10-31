<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Game */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Games'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'slug',
            'title',
            'body:ntext',
            'view',
            'category_id',
            'embed_url:url',
            'thumbnail_base_url:url',
            'thumbnail_path',
            'status',
            'like',
            'created_by',
            'updated_by',
            'published_at',
            'created_at:datetime',
            'updated_at:datetime',
            'size',
        ],
    ]) ?>

</div>
