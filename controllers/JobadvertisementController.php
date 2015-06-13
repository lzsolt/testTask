<?php

namespace app\controllers;

use app\models\POrientation;
use Yii;
use yii\filters\AccessControl;
use app\models\BJobAdvertisement;
use app\models\BJobAdvertisementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;

/**
 * JobadvertisementController implements the CRUD actions for BJobAdvertisement model.
 */
class JobadvertisementController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => ['login', 'error'],
						'allow' => true,
					],
					[
						'actions' => ['index', 'create', 'edit', 'update', 'delete', 'setstatus'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'logout' => ['post'],
				],
			],
		];
	}

    /**
     * Lists all BJobAdvertisement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BJobAdvertisementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new BJobAdvertisement model.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BJobAdvertisement();
		$model->status = 'new';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'orientationList' => $this->getOrientationList(),
            ]);
        }
    }

    /**
     * Updates an existing BJobAdvertisement model.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
			$this->setStatus($model, $model->status);

			if ($this->isSendMail($model) & $model->save())
				$this->sendMail($model);
        }

		return $this->render('update', [
			'model' => $model,
			'orientationList' => $this->getOrientationList(),
		]);
    }

    /**
     * Deletes an existing BJobAdvertisement model.
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
	 * @throws NotFoundHttpException
	 */
	public function actionSetstatus()
	{
		if (isset(Yii::$app->request->post('BJobAdvertisement')['id'])) {
			$model = $this->findModel(Yii::$app->request->post('BJobAdvertisement')['id']);

			$this->setStatus($model, 'active');

			if ($this->isSendMail($model) & $model->save()) {
				$this->sendMail($model);
			}
		}

		$this->redirect($_SERVER['HTTP_REFERER']);
	}

	/**
	 * @param $model
	 * @param null $status
	 */
	public function setStatus($model, $status = NULL)
	{
		if (!empty($status)) {
			$model->status = $status;
		} else {
			$model->status = 'active';
		}

		if ($model->getOldAttributes()['status'] != 'active' && $model->status == 'active') {
			$model->activated_at = date('Y-m-d H:i:s');
		}
	}

	/**
	 * @param $model
	 * @return bool
	 */
	public function isSendMail($model) {
		if ($model->getOldAttributes()['status'] != 'active' && $model->status == 'active')
			return TRUE;
		else
			return FALSE;
	}

	/**
	 * @param $model
	 */
	public function sendMail($model) {
		\Yii::$app->mailer->compose('activationEmail', ['model' => $model])
			->setFrom([\Yii::$app->params['adminEmail'] => 'Test Mail'])
			->setTo($model->email)
			->setSubject('TT - hirdetés aktiválás')
			->send();
	}

    /**
     * Finds the BJobAdvertisement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BJobAdvertisement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BJobAdvertisement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

	protected function getOrientationList()
	{
		$orientationList = [];

		foreach (POrientation::find()->orderBy('name')->all() as $orientation)
			$orientationList[$orientation->id] = $orientation->name;

		return $orientationList;
	}
}
