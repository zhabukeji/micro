<?php

namespace micro\controllers;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $redis = Yii::$app->redis;
        // 判断是否缓存了index首页
        $key = 'html_index';
        if($render = $redis->get($key)) {
            return $render;
        } else {
            $this->redirect('/index.php');
        }
    }
}