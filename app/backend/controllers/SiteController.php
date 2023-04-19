<?php

namespace backend\controllers;

use backend\forms\LoginForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function actionLogin(): Response|string
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $loginForm = new LoginForm();
        if ($loginForm->load(Yii::$app->request->post())&& $loginForm->login()){
            return $this->goBack();
        }

        $loginForm->password = '';

        return $this->render('login', [
            'model' => $loginForm,
        ]);
    }
    public function actionLogout(): Response
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
