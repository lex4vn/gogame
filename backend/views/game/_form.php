<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use trntv\filekit\widget\Upload;
/* @var $this yii\web\View */
/* @var $model common\models\Game */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="game-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'view')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'category_id')->dropdownList(
        ArrayHelper::map(\common\models\GameCategory::find()->all(), 'id', 'title'),
        ['prompt' => 'Chọn danh mục']
    );
    ?>
    <?php echo $form->field($model, 'type_id')->dropdownList(
        ArrayHelper::map(\common\models\GameType::find()->all(), 'id', 'name')
    );
    ?>

    <?php echo $form->field($model, 'embed_url')->textInput(['maxlength' => true]) ?>
    <?php echo $form->field($model, 'thumbnail')->widget(
        Upload::className(),
        [
            'url' => ['/file-storage/upload'],
            'maxFileSize' => 5000000, // 5 MiB
        ]);
    ?>

    <?php echo $form->field($model, 'status')->checkbox(
        [
            'label' => 'Kích hoạt',
        ]
    ) ?>

    <?php //echo $form->field($model, 'like')->textInput() ?>

    <?php //echo $form->field($model, 'created_by')->textInput() ?>

    <?php //echo $form->field($model, 'updated_by')->textInput() ?>

    <?php echo $form->field($model, 'published_at')->textInput() ?>

    <?php //echo $form->field($model, 'created_at')->textInput() ?>

    <?php //echo $form->field($model, 'updated_at')->textInput() ?>

    <?php echo $form->field($model, 'size')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
