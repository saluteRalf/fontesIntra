<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Usuario;
use app\models\TipoUsuario;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'tipo_usuario_id')->dropDownList(ArrayHelper::map(TipoUsuario::find()->asArray()->all(), 'id', 'nomenclatura'), ['prompt'=>'Selecionar','onchange'=>'changeLabel(this.value);'])?>
    <?= $form->field($model, 'cpf')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nr_classe')->textInput(['maxlength' => true])->label($model->tipoUsuario ? $model->tipoUsuario->sigla_classe : null, ['id'=>'usuario-nr_classe-label']) ?>
    <?= $form->field($model, 'senha')->passwordInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'repeatSenha')->passwordInput(['maxlength' => true, 'value'=>$model->isNewRecord ? null : $model->senha]) ?>
	
	<script>
		var tiposUsuario = <?= json_encode(TipoUsuario::find()->asArray()->all()); ?>;
		function changeLabel(value){		
			for(var i in tiposUsuario){
				if (tiposUsuario[i].id == value){
					$('#usuario-nr_classe-label').html(tiposUsuario[i].sigla_classe || 'N/D');
					return true;
				}
			}
			$('#usuario-nr_classe-label').html('N/D');
			return false;
		}
	</script>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
