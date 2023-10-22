<?php

namespace home\controllers;

use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'main-index';

        return $this->render('index');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionProduct()
    {
        return $this->render('product');
    }

    public function actionAdvantage()
    {
        return $this->render('advantage');
    }

    public function actionRecruit()
    {
        return $this->render('recruit');
    }

    public function actionNews()
    {
        return $this->render('news');
    }

    public function actionContact()
    {
        return $this->render('contact');
    }
}
