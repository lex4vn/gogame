<?php
/* @var $this yii\web\View */
use \russ666\widgets\Countdown;
$this->title = Yii::t('frontend', 'Articles')
?>
<?php
    echo Countdown::widget([
        //'tagName' => 'span',
        'datetime' => date('Y-m-d H:i:s O', $remain), // TODO fix time 
        'format' => '<span>%M</span><span>%S</span>',
        'events' => [
            'finish' => 'function(){$("#takeForm").submit()}',
        ],
    ])
?>
