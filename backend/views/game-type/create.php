<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GameType */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Game Type',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Game Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-type-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
