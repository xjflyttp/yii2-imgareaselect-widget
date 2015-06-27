<?php

/**
 * 
 * @author xjflyttp <xjflyttp@gmail.com>
 */

namespace xj\imgareaselect;

use yii\web\AssetBundle;
use yii\web\View;

class ImgareaselectAsset extends AssetBundle
{

    const STYLE_DEFAULT = 'distfiles/css/imgareaselect-default.css';
    const STYLE_ANIMATED = 'distfiles/css/imgareaselect-animated.css';

    public $sourcePath = '@bower/imgareaselect';
    public $basePath = '@webroot/assets';
    public $js = ['jquery.imgareaselect.dev.js'];
    public $depends = ['yii\web\JqueryAsset'];

    /**
     * 
     * @param View $view
     * @param string $style
     * @return AssetBundle
     */
    public static function registerWithStyle($view, $style = self::STYLE_DEFAULT)
    {
        $bubble = parent::register($view);
        $bubble->css[] = $style;
        return $bubble;
    }

}
