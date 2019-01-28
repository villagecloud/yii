<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 28/01/19
 * Time: 19:51
 */

namespace app\assets;


use yii\web\AssetBundle;

class MainAsset extends AppAsset
{
    public $css = [
        'css/style.css'
    ];
    public $js = [
        'js/custom.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}