<?php

namespace app\controllers;

use Yii;
use app\models\Sentitems;
use app\models\SentitemsSearch;
use yii\web\NotFoundHttpException;

/**
 * SentitemsController implements the CRUD actions for Sentitems model.
 */
class SentitemsController extends BaseController
{
    /**
     * Lists all Sentitems models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SentitemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sentitems model.
     * @param string $ID
     * @param integer $SequencePosition
     * @return mixed
     */
    public function actionView($ID, $SequencePosition)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $SequencePosition),
        ]);
    }

    /**
     * Creates a new Sentitems model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sentitems();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'SequencePosition' => $model->SequencePosition]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sentitems model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $ID
     * @param integer $SequencePosition
     * @return mixed
     */
    public function actionUpdate($ID, $SequencePosition)
    {
        $model = $this->findModel($ID, $SequencePosition);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'SequencePosition' => $model->SequencePosition]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sentitems model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ID
     * @param integer $SequencePosition
     * @return mixed
     */
    public function actionDelete($ID, $SequencePosition)
    {
        $this->findModel($ID, $SequencePosition)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sentitems model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ID
     * @param integer $SequencePosition
     * @return Sentitems the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $SequencePosition)
    {
        if (($model = Sentitems::findOne(['ID' => $ID, 'SequencePosition' => $SequencePosition])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
