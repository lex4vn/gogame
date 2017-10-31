<?php
/**
 * @var $this yii\web\View
 * @var $model common\models\Article
 */
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="game-item col-lg-3 col-md-4">
    <a class="game-slug" title="<?php echo $model->title ?>"
       href="<?php echo Url::to(['view', 'slug'=>$model->slug]) ?>">
        <figure class="game-thumb-holder">
            <picture>
                <?php echo Html::img(
                    'http://img.poki.com/'.$model->image.'.jpg',
                    [
                        'class' => 'game-thumb',
                        'alt' => $model->title,
                        'title' => $model->title,
                    ]
                ) ?>
                
            </picture>
        </figure>
        <span class="game-title"><?php echo $model->title ?></span>
    </a>
</div>

