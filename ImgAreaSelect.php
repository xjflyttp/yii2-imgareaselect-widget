<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace xj\imgareaselect;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\web\View;

class ImgAreaSelect extends Widget
{

    /**
     *
     * @var string selector
     * @example
     * 'id' => '#imageArea'
     */
    public $id;

    /**
     *
     * @var int load script position
     */
    public $position = View::POS_LOAD;

    /**
     *
     * @var string registerAssetStyle 
     * @example
     * ImgareaselectAsset::STYLE_DEFAULT
     * ImgareaselectAsset::STYLE_ANIMATED
     */
    public $style = null;

    /**
     *
     * @var []
     * @see http://odyniec.net/projects/imgareaselect/usage.html#options
     */
    public $clientOptions = [];

    /**
     *
     * @var []
     * @see http://odyniec.net/projects/imgareaselect/usage.html#callback-functions
     */
    protected $clientEventMap = [
        'onInit', 'onSelectStart', 'onSelectChange', 'onSelectEnd',
    ];

    public function init()
    {
        parent::init();
        if (empty($this->id)) {
            throw new InvalidConfigException('must config id attribute');
        }
        ImgareaselectAsset::registerWithStyle($this->getView(), $this->getStyleOption());
    }

    public function run()
    {
        $options = Json::encode($this->getClientOptions());
        $js = "jQuery('{$this->id}').imgAreaSelect({$options})";
        $this->getView()->registerJs($js, $this->position);
    }

    /**
     * 
     * @return string
     */
    protected function getStyleOption()
    {
        $style = $this->style;
        if ($style === null) {
            $style = ImgareaselectAsset::STYLE_DEFAULT;
        }
        return $style;
    }

    /**
     * 
     * @return JsExpression
     */
    protected function getClientOptions()
    {
        $mapOptions = $this->clientEventMap;
        $options = $this->clientOptions;
        foreach ($options as $name => $value) {
            if (in_array($name, $mapOptions)) {
                $options[$name] = new JsExpression($value);
            }
        }
        return $options;
    }

}
