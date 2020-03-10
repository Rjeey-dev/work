<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\service\NumberService;
use app\service\GroupService;
use app\service\IntegrationService;
use app\service\StaffService;
use app\service\WidgetService;

class SiteController extends Controller
{

    private $numberService;
    private $integrationService;
    private $groupService;
    private $staffService;
    private $widgetService;


    public function __construct($id, $module, NumberService $NumberService, GroupService  $GroupService, IntegrationService $IntegrationService, StaffService $StaffService, WidgetService $WidgetService, $config = [])
    {
         $this->numberService = $NumberService;
         $this->groupService = $GroupService;
         $this->integrationService = $IntegrationService;
         $this->staffService = $StaffService;
         $this->widgetService = $WidgetService;
         parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            /*'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],
                    ],
                ],
            ],*/
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        try {
            return $this->render('index', [
                'rows' => $this->integrationService->getUsers('300012869'),
                'rows2' => $this->integrationService->getUser2('300012869'),
            ]);
        } catch (\Throwable $e) {
            return $this->render('error', ['error' => $e->getMessage()]);
        }
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->renderAjax('login', [
            'model' => $model,
        ]);
    }
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
