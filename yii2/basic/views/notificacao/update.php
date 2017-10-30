<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Notificacao */

$this->title = 'Update Notificacao: ' . $model->id_notificacao;
$this->params['breadcrumbs'][] = ['label' => 'Notificacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_notificacao, 'url' => ['view', 'id' => $model->id_notificacao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notificacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
