<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Cliente;
use app\models\ClienteSearch;
use app\models\PreExistentes;
use app\models\ClientePree;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * ClienteController implements the CRUD actions for Cliente model.
 */
class ClienteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cliente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cliente model.
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
     * Creates a new Cliente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cliente();
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$this->updateClientePree($_POST['Cliente']['idPreExistentes'], $model->id);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
			//$preexistentesItems = PreExistentes::find()->orderBy(['desc_pre_existente' => SORT_ASC])->all();
            return $this->render('create', [
                'model' => $model,
				//'preexistentesItems' => $preexistentesItems,
            ]);
        }
    }

    /**
     * Updates an existing Cliente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			/*foreach ($model->idPreExistentes as $value){
				if (!$model->id, ['id_pre_existente' => $value->id_pre_existente]))
				$model->link('idPreExistentes', $value);
			}*/
			//$model->link('idPreExistentes', $model->idPreExistentes);
			//print_r(json_encode(ArrayHelper::map(PreExistentes::findAll($_POST['Cliente']['idPreExistentes']), 'id_pre_existente', 'desc_pre_existente')));
			//die();
			/*foreach ($_POST['Cliente']['idPreExistentes'] as $value){
				$model->link('idPreExistentes', PreExistentes::find()->where(['id_pre_existente'=>$value]));//($_POST['Cliente']['idPreExistentes']));
			}*/
			$this->updateClientePree($_POST['Cliente']['idPreExistentes'], $model->id);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
				//'preexistentesItems' => $preexistentesItems,
            ]);
        }
    }

    /**
     * Deletes an existing Cliente model.
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
     * Finds the Cliente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cliente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cliente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	private function updateClientePree($preexistentesEscolhidos, $clienteId){
		$preexistentesItems = PreExistentes::find()->all();
		foreach($preexistentesItems as $valueTd){
			$preexistenteBanco = ClientePree::findOne([
				'id_cliente'=>$clienteId,
				'id_pre_existente'=>$valueTd->id_pre_existente,
			]);
			if (!$preexistenteBanco){
				foreach ($preexistentesEscolhidos as $value){
					if ($valueTd->id_pre_existente == $value){
						$newPreexistentes = new ClientePree();
						$newPreexistentes->id_cliente = $clienteId;
						$newPreexistentes->id_pre_existente = $valueTd->id_pre_existente;
						$newPreexistentes->save();
						
						break;
					}
				}
			}
			else{
				$deleta = true;
				foreach ($preexistentesEscolhidos as $value){
					if ($valueTd->id_pre_existente == $value){
						$deleta = false;
						break;
					}
				}
				
				if ($deleta){
					$preexistenteBanco->delete();
				}
			}				
		}
	}
}
