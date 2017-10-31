<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GameTerms */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Game Terms',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Game Terms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->term_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="game-terms-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
