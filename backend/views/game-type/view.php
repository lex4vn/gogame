<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\GameType */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Game Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-type-view">

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
            'name',
            'name_ascii',
            'status',
            'description',
        ],
    ]) ?>

</div>
