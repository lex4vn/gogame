<?php
/* @var $this yii\web\View */
/* @var $model common\models\Article */

?>

<?php 
echo \yii\widgets\ListView::widget([
    'dataProvider'=>$dataProvider,
    'pager'=>[
        'hideOnSinglePage'=>true, 
        // Fix number on page
    ],
    'itemView'=>'_item',
    'layout' => "{pager}\n{items}\n{summary}",
])
?>