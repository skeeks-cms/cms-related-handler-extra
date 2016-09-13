<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 02.03.2016
 */
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\rhExtra\ExtraInputWidget */

$widget = $this->context;

?>

<?= \yii\helpers\Html::beginTag('div', $widget->options); ?>
        <?= $input; ?>

<?
$jsOptions = \yii\helpers\Json::encode($widget->clientOptions);

$this->registerJs(<<<JS
(function(sx, $, _)
{
    sx.classes.ExtraInput = sx.classes.Component.extend({

        _init: function()
        {
            var self = this;

        },
    });

    new sx.classes.ExtraInput({$jsOptions});

})(sx, sx.$, sx._);
JS
); ?>
<?= \yii\helpers\Html::endTag('div'); ?>

