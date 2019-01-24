<?php


namespace app\components;

use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\web\Application;


class BootstrapLang extends Component implements BootstrapInterface
{
    /** @var  Application */
    protected $app;

    public function bootstrap($app)
    {
        $this->app = $app;
        $this->setLang();
    }

    protected function setLang()
    {
        $this->app->language = $this->app->session->get('lang');
    }
}