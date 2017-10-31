<?php

use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
$this->title = Yii::$app->name;
?>
<div class="site-index">
    <div class="most-play-game">
        <h2><?php echo Yii::t('frontend', 'Most play game') ?></h2>
        <?php
        $dataProvider = new ActiveDataProvider([
            'query' => \common\models\Game::find()->orderBy('created_at'),
//            'pagination' => [
//                'pagesize' => 4,
//            ],
        ]);
        echo \yii\widgets\ListView::widget([
            'dataProvider'=>$dataProvider,
            'pager'=>[
                'hideOnSinglePage'=>true,
            ],
            'itemView'=>'../game/_item'
        ])?>
        <div class="clearfix"></div>
    </div>

    <div class="new-game">
        <h2><?php echo Yii::t('frontend', 'New game') ?></h2>
        <?php
        $dataProvider = new ActiveDataProvider([
            'query' => \common\models\Game::find()->orderBy('created_at'),
//            'pagination' => [
//                'pagesize' => 4,
//            ],
        ]);
        echo \yii\widgets\ListView::widget([
            'dataProvider'=>$dataProvider,
            'pager'=>[
                'hideOnSinglePage'=>true,
            ],
            'itemView'=>'../game/_item'
        ])?>
        <div class="clearfix"></div>
    </div>

    <div class="popular-category-game">
        <h2><?= Yii::t('frontend', 'Popular game categories') ?></h2>
        <?php
        $dataProvider = new ActiveDataProvider([
            'query' => \common\models\GameCategory::find()->where('parent_id is null'),
//            'pagination' => [
//                'pagesize' => 4,
//            ],
        ]);
        echo \yii\widgets\ListView::widget([
            'dataProvider'=>$dataProvider,
            'pager'=>[
                'hideOnSinglePage'=>true,
            ],
            'itemView'=>'../game/_item_category'
        ])?>
        <div class="clearfix"></div>
    </div>
</div>
