<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <div class="form-group field-usuario-tipo required">
        <label class="control-label" for="usuario-tipo">Tipo</label>
        <select class="form-control" id="usuario-tipo" name="Usuario[tipo]">
            <option value="1" selected>Aluno</option>
            <option value="2">Professor</option>
        </select>
    </div>
    <?= $form->field($model, 'senha')->textInput(['maxlength' => true,'type'=>'password']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>

</script>