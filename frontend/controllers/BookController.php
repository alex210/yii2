<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class BookController extends Controller
{
    public function actionIndex()
    {
        return $this->render('/book');
    }
}
