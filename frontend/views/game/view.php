<?php
/* @var $this yii\web\View */
/* @var $model common\models\Game */
$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Game'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//$model->file_content = 'https://googame-lex4vn.c9users.io/storage/web/18822.swf';
//$model->file_content = 'http://slither.io/';
// $this->registerJs('swfobject.embedSWF("'.$model->file_content .'", "game_object", "300", "140", "9.0.0", "expressInstall.swf");');
?>
<div class="content">
    <div class="row">
        <div class="col-md-9 col-xs-12">        
            
            <div id="game-holder">
        
                    <div class="ads-left" style="background:green;width:120px;height:599px;display:none">
                
                    </div>
                    
                    <div class="game-center">
                        <?php if($model->file_content_type == 'html5'){ ?>
                            <iframe class="game-object"
                                    frameborder="0"
                                    scrolling="no"
                                    width="<?= $model->file_width ?>"
                                    height="<?= $model->file_height ?>"
                                    src="<?= $model->file_content ?>">
                                </iframe>
                        <?php }else if($model->file_content_type == 'flash'){ ?>
                            <object 
                            class="game-object"
                            width="<?= $model->file_width ?>"
                            height="<?= $model->file_height ?>"
                            data="<?= $model->file_content ?>">
                            </object>
                         <?php }else{ ?>
                             <h1>Chua ho tro dinh dang <?= $model->file_content_type ?></h1>
                         <?php } ?>
                    </div>
                    
                    <div class="ads-right" style="background:red;width:120px;height:599px;display:none">
        
                    </div>
        
                    <div class="game-bottom">
        
                    </div>
        
            </div> <!--End game-holder -->
            
            <div class="game-info">
                <h3 class="luck green"><?php echo $model->title ?></h3>
                <p>123030 luot choi</p>
                
                <div class="game-nav">
                        <div class="game-nav-left">
                            <ul>
                                <li>Facebook</li>
                                <li>Youtube</li>
                            </ul>
                        </div>
                        <div class="game-nav-right">
                            <ul>
                                <li>Comment</li>
                                <li>Like</li>
                                <li>Dislike</li>
                                <li>Guide</li>
                            </ul>
                        </div>
                </div>
                
                <?php echo $model->description ?>
            </div>
            
        </div>
        
        <div class="col-md-3 col-xs-12">        
            <div class="game-related">
                <?php echo \yii\widgets\ListView::widget([
                'dataProvider'=>$dataProvider,
                'pager'=>[
                    'hideOnSinglePage'=>true,
                ],
                'itemOptions'=> ['class'=> 'col-lg-3 col-md-4','tag' => false,],
                'itemView'=>'_item_related',
                'layout' => "{items}",
                ])?>
            </div>
        </div>
    </div>

    
</div>