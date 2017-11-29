<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Usuario;
use app\models\Classificacao;

/* @var $this yii\web\View */
/* @var $model app\models\Equipe */
/* @var $form yii\widgets\ActiveForm */
$usuariosTipos = Usuario::find()->innerJoinWith('tipoUsuario', true);
?>

<div class="equipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'classificacao_id')->dropDownList(ArrayHelper::map(Classificacao::find()->asArray()->all(), 'id', 'sigla'), ['prompt'=>'Selecionar'])?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'motorista_id')->dropDownList(ArrayHelper::map($usuariosTipos->where(['nomenclatura'=>'Motorista'])->asArray()->all(), 'id', 'nome'), ['prompt'=>'Selecionar'])?>

    <?= $form->field($model, 'tecnico_enfermeiro_id')->dropDownList(ArrayHelper::map($usuariosTipos->where(['nomenclatura'=>'Técnico de Enfermagem'])->asArray()->all(), 'id', 'nome'), ['prompt'=>'Selecionar'])?>

    <?= $form->field($model, 'enfermeiro_id')->dropDownList(ArrayHelper::map($usuariosTipos->where(['nomenclatura'=>'Enfermeiro'])->asArray()->all(), 'id', 'nome'), ['prompt'=>'Selecionar'])?>

    <?= $form->field($model, 'medico_id')->dropDownList(ArrayHelper::map($usuariosTipos->where(['nomenclatura'=>'Médico'])->asArray()->all(), 'id', 'nome'), ['prompt'=>'Selecionar'])?>

    <?php //$form->field($model, 'em_atendimento')->textInput() ?>

    <?php //$form->field($model, 'localizacao_atual')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
