<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PreExistentes */

$this->title = 'Cadastrar Preexistentes';
$this->params['breadcrumbs'][] = ['label' => 'Preexistentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pre-existentes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
