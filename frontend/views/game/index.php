<?php
/* @var $this yii\web\View */
$this->title = Yii::t('frontend', 'Game')
?>
<div class="container-fluid luck">
  <div class="row">
    <h1 class="green"><?php echo Yii::t('frontend', 'Game') ?></h1>
    <?php echo \yii\widgets\ListView::widget([
        'dataProvider'=>$dataProvider,
        'pager'=>[
            'hideOnSinglePage'=>true,
        ],
        'itemOptions'=> ['class'=> 'col-lg-3 col-md-4','tag' => false,],
        'itemView'=>'_item',
        // 'itemView' => function ($model, $key, $index, $widget) {
        //     $itemContent = $this->render('_item',['model' => $model]);

        //     /* Display an Advertisement after the first list item */
        //     // if ($index == 0) {
        //     //     $adContent = $this->render('_item_ad');
        //     //     $itemContent .= $adContent;
        //     // }
        //     if ($index == 0) {
        //         $itemContent .= '<div class="row">';
        //     }
            
        //     if ($index == 3) {
        //         $itemContent .= '</div><div class="row">';
        //     }

        //     return $itemContent;

        //     /* Or if you just want to display the list item only: */
        //     // return $this->render('_list_item',['model' => $model]);
        // },
        //'layout' => '{summary}\n<div class="row">{items}</div>\n{pager}',
    ])?>
    </div>
</div>