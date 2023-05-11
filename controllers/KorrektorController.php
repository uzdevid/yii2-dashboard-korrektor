<?php

namespace uzdevid\dashboard\korrektor\controllers;

use uzdevid\dashboard\base\rest\Controller;
use uzdevid\korrektor\Correct;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class KorrektorController extends Controller {
    public function behaviors(): array {
        $behaviors = parent::behaviors();
        $behaviors['access'] = [
            'class' => AccessControl::class,
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ];

        $behaviors['verbs'] = [
            'class' => VerbFilter::class,
            'actions' => [
                'check-field' => ['POST'],
            ],
        ];

        return $behaviors;
    }

    public function __construct($id, $module, $config = []) {
        parent::__construct($id, $module, $config);

        $this->viewPath = '@uzdevid/yii2-dashboard-korrektor/views/korrektor';
    }

    public function actionCheckField() {
        $text = Yii::$app->request->post('text');

        $corrector = Yii::$app->korrektor->correct()->setText($text)->setLanguage(Correct::LANGUAGE_LAT);

        return [
            'success' => true,
            'body' => [
                'title' => Yii::t('system.content.korrektor', 'Check'),
                'view' => $this->renderAjax('check', compact('corrector')),
            ]
        ];
    }
}
