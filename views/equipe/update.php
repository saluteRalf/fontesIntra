<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equipe */

$this->title = 'Editar equipe: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Equipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="equipe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
