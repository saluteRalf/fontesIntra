<?php

namespace app\controllers;

use Yii;
use app\models\Ocorrencia;
use app\models\OcorrenciaSearch;
use app\models\Queixa;
use app\models\OcorrenciaQueixa;
use app\models\Cliente;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * OcorrenciaController implements the CRUD actions for Ocorrencia model.
 */
class OcorrenciaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ocorrencia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OcorrenciaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ocorrencia model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Ocorrencia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ocorrencia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$this->updateOcorrenciaQueixa($_POST['Ocorrencia']['idQueixas'], $model->id);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ocorrencia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$this->updateOcorrenciaQueixa($_POST['Ocorrencia']['idQueixas'], $model->id);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ocorrencia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ocorrencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ocorrencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ocorrencia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionGetclientebyid($id){
		//echo 'Olá';
		//return true;
		//if ($id = Yii::$app->request->post('id')) {
			$nrClientes = Cliente::find()
				->where(['id' => $id])
				->count();
	 
			if ($nrClientes == 1) {
				$cliente = Cliente::find()
					->where(['id' => $id])
					->all();
					
				echo \yii\helpers\Json::encode($cliente);
			}
			else{
				echo 'Endereço não encontrado';
			}
		//}
	}
	
	private function updateOcorrenciaQueixa($queixasEscolhidas, $ocorrenciaId){
		$queixasItems = Queixa::find()->all();
		foreach($queixasItems as $valueTd){
			$queixaBanco = OcorrenciaQueixa::findOne([
				'id_ocorrencia'=>$ocorrenciaId,
				'id_queixa'=>$valueTd->id,
			]);
			if (!$queixaBanco){
				if ($queixasEscolhidas){
					foreach ($queixasEscolhidas as $value){
						if ($valueTd->id == $value){
							$newQueixas = new OcorrenciaQueixa();
							$newQueixas->id_ocorrencia = $ocorrenciaId;
							$newQueixas->id_queixa = $valueTd->id;
							$newQueixas->save();
							
							break;
						}
					}
				}
			}
			else{
				$deleta = true;
				if ($queixasEscolhidas){
					foreach ($queixasEscolhidas as $value){
						if ($valueTd->id == $value){
							$deleta = false;
							break;
						}
					}
				}
				
				if ($deleta){
					$queixaBanco->delete();
				}
			}				
		}
	}
}
