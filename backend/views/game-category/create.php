<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GameCategory */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Game Category',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Game Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-category-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
