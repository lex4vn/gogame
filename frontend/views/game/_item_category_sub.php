<?php
/**
 * @var $this yii\web\View
 * @var $model common\models\Article
 */
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="game-category-sub-item">
    <a title="<?php echo $model->title ?>"
       href="<?php echo Url::to(['view', 'slug'=>$model->slug]) ?>">
        <figure class="game-sub-thumb-holder">
            <picture>
                <?php echo Html::img(
                    'http://img.poki.com/'.$model->image.'.jpg',
                    [
                        'class' => 'game-category-sub-thumb pull-left',
                        'alt' => $model->title,
                        'title' => $model->title,
                    ]
                ) ?>                
            </picture>
        </figure>
        <span class="game-category-sub-title"><?php echo $model->title ?></span>
    </a>
</div>