<?php
return [
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
];