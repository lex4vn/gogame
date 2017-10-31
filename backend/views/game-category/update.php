<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GameCategory */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Game Category',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Game Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="game-category-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
