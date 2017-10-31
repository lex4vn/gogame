<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GameTerms */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Game Terms',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Game Terms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-terms-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
