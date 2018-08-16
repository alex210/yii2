<?php

namespace frontend\controllers;

use yii\rest\ActiveController;
use yii\filters\Cors;

class ApiController extends ActiveController
{
#	public $enableCsrfValidation = false;
  public $modelClass = 'common\models\Book';
/*      public function actions()
    {
        return [
            'options' => [
                'class' => 'yii\rest\OptionsAction',
            ],
        ];
    }

    
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Allow-Credentials' => true,
            ],
              
        ];
  

        unset($behaviors['authenticator']);
        $behaviors['authenticator'] = [
            'class' =>  HttpBearerAuth::className(),
        ];

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [                
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ];

        return $behaviors;
    }*/
}