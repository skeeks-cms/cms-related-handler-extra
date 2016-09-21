SkeekS CMS form of additional properties Element
===================================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist skeeks/cms-related-handler-extra "*"
```

or add

```
"skeeks/cms-related-handler-extra": "*"
```

Configuration app
----------

```php

'components' =>
[
    'cms' =>
    [
        'relatedHandlers' => [
            'skeeks\cms\rhExtra\RelatedHandlerExtra' =>
            [
                'class' => 'skeeks\cms\rhExtra\RelatedHandlerExtra'
            ]
        ],
    ],

    'i18n' => [
        'translations' =>
        [
            'skeeks/rh/extra' => [
                'class'             => 'yii\i18n\PhpMessageSource',
                'basePath'          => '@skeeks/cms/rhExtra/messages',
                'fileMap' => [
                    'skeeks/rh/extra' => 'main.php',
                ],
            ]
        ]
    ]
],

```

How to use
----------

```php

<? if ($extra = $model->relatedPropertiesModel->getAttribute('extra')) : ?>
    <? foreach($extra as $row) : ?>
        <p>
            <strong><?= \yii\helpers\ArrayHelper::getValue($row, 'name'); ?>:</strong> <?= \yii\helpers\ArrayHelper::getValue($row, 'value'); ?>
        </p>
    <? endforeach; ?>
<? endif; ?>

```

##Links
* [Web site](http://en.cms.skeeks.com)
* [Web site (rus)](http://cms.skeeks.com)
* [Author](http://skeeks.com)
* [ChangeLog](https://github.com/skeeks-cms/cms-related-handler-extra/blob/master/CHANGELOG.md)


___

> [![skeeks!](https://gravatar.com/userimage/74431132/13d04d83218593564422770b616e5622.jpg)](http://skeeks.com)  
<i>SkeekS CMS (Yii2) — quickly, easily and effectively!</i>  
[skeeks.com](http://skeeks.com) | [en.cms.skeeks.com](http://en.cms.skeeks.com) | [cms.skeeks.com](http://cms.skeeks.com) | [marketplace.cms.skeeks.com](http://marketplace.cms.skeeks.com)


