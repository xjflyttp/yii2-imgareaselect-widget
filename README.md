# yii2-imgareaselect-widget
```
https://github.com/odyniec/imgareaselect
```
composer.json
---
```json
"require": {
    "xj/yii2-imgareaselect-widget": "*"
},
```

use assets
---
```php
ImgareaselectAsset::registerWithStyle($this, ImgareaselectAsset::STYLE_ANIMATED);
//OR
ImgareaselectAsset::registerWithStyle($this, ImgareaselectAsset::STYLE_DEFAULT);
```


use widget
---
```php
Html::img('@web/images/color/srgb.jpg', [
    'id' => 'myimage',
    'width' => 400,
]);

ImgAreaSelect::widget([
    'id' => '#myimage',
    'style' => ImgareaselectAsset::STYLE_ANIMATED, //default STYLE_DEFAULT
    'position' => View::POS_READY, //default POS_LOAD
    'clientOptions' => [
        'maxWidth' => 100,
        'maxHeight' => 100,
        'onInit' => 'function(img, selection){console.log("event: init");}',
        'onSelectStart' => 'function(img, selection){console.log("event: select start");}',
        'onSelectChange' => 'function(img, selection){console.log("event: select change");}',
        'onSelectEnd' => 'function(img, selection){console.log("event: select end");}',
    ]
]);
```
