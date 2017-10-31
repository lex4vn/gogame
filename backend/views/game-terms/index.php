<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GameTermsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Game Terms');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-terms-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Game Terms',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'term_id',
            'name',
            'slug',
            'term_group',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
