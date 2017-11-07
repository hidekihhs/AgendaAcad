<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Usuario;

/* @var $this yii\web\View */
/* @var $model app\models\Disciplina */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disciplina-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome_disciplina')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'id_monitor')->dropDownList(
        ArrayHelper::map(Usuario::find()->all(),'codigo','nome'),['prompt'=>'Selecione Aluno']
    ) ?>
    <?= $form->field($model, 'datafim')->textInput(['type'=>'date']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
