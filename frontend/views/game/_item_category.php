<?php
/**
 * @var $this yii\web\View
 * @var $model common\models\Article
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
?>
<div class="col-xs-6">
    <div class="game-category-item">
        <h2 class="item-heder">
            <a class="game-category-slug" title="<?php echo $model->title ?>"
               href="<?php echo Url::to(['view', 'slug'=>$model->slug]) ?>">
                <figure class="game-thumb-holder">
                    <picture>
        
                        <?php echo Html::img(
                            'http://img.poki.com/'.$model->image.'.jpg',
                            [
                                'class' => 'game-category-thumb',
                                'alt' => $model->title,
                                'title' => $model->title,
                            ]
                        ) ?>
                    </picture>
                </figure>
                <span class="game-category-title"><?php echo $model->title ?></span></a>
        </h2>
        
        <div class="item-content">
            <?php 
            $dataProvider = new ActiveDataProvider([
            'query' => \common\models\GameCategory::find()->where(['parent_id'=>$model->id]),
            'pagination' => [
                'pagesize' => 4,
            ],
            ]);
            echo \yii\widgets\ListView::widget([
                'dataProvider'=>$dataProvider,
                'pager'=>[
                    'hideOnSinglePage'=>true,
                ],
                'itemView'=>'../game/_item_category_sub',
                'layout' => "{items}",
            ])
            ?>
        </div>
    </div>
</div>