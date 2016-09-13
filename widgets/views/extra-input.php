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
        <div>
            <?= $element; ?>
        </div>

        <div class="sx-elements-wrapper">
        </div>
        <a class="btn btn-default btn-sm sx-btn-add-row"><i class="glyphicon glyphicon-plus"></i> <?= \Yii::t('skeeks/cms', 'Add')?></a>

<?
\yii\jui\Sortable::widget();

$jsOptions = \yii\helpers\Json::encode($widget->clientOptions);

$this->registerCss(<<<CSS
.sx-elements-wrapper .row
{
    margin-top: 0px;
    margin-bottom: 10px;
    cursor: move;
}
CSS
);

$this->registerJs(<<<JS
(function(sx, $, _)
{
    sx.classes.ExtraInput = sx.classes.Component.extend({

        _init: function()
        {
            var self = this;
        },

        _onDomReady: function()
        {
            this.counter = 0;

            var self = this;

            self.jWrapper = $('#' + this.get('id'));
            self.jElementsWrapper = $('.sx-elements-wrapper', self.jWrapper);
            self.jValuesWrapper = $('.sx-values-wrapper', self.jWrapper);
            self.jAddRow = $('.sx-btn-add-row', self.jWrapper);

            self.jElementsWrapper.sortable(
                {
                    /*cursor: "move",
                    handle: ".sx-btn-move",*/
                    forceHelperSize: true,
                    forcePlaceholderSize: true,
                    opacity: 0.5,
                    placeholder: "ui-state-highlight",
                }
            );


            self.jAddRow.on('click', function()
            {
                self.createRow();
                return false;
            });

            if (this.get('value'))
            {
                _.each(this.get('value'), function(value, key)
                {
                    self.createRow(value);
                });
            }
        },

        createRow: function(data)
        {
            var self = this;

            var name    = '';
            var value   = '';

            if (data && data.name)
            {
                name = data.name;
            }

            if (data && data.value)
            {
                value = data.value;
            }

            var jInputKey = $("<input>", {
                'class': 'form-control',
                'type': 'text',
                'value': name,
                'name': self.get('inputName') + '[' + this.counter + '][name]',
            });

            var jInputVal = $("<input>", {
                'class': 'form-control',
                'type': 'text',
                'value': value,
                'name': self.get('inputName') + '[' + this.counter + '][value]',
            });

            var jRemoveBtn = $("<a>", {
                'href': '#',
                'class': 'btn btn-sm btn-default',
            }).append('<i class="glyphicon glyphicon-remove"></i>');



            var jRow = $("<div>", {'class': 'row'});

            jRow
                .append($("<div>", {"class": "col-md-5"}).append(jInputKey))
                .append($("<div>", {"class": "col-md-6"}).append(jInputVal))
                .append($("<div>", {"class": "col-md-1"}).append(jRemoveBtn));

            jRemoveBtn.on('click', function()
            {
                jRow.remove();
                return false;
            });

            /*jInputKey.on('change', function()
            {
                jOption.val($(this).val());
                self.jElement.change();
                return false;
            });
            jInputVal.on('change', function()
            {
                jOption.empty().append($(this).val());
                self.jElement.change();
                return false;

            });*/

            jRow.appendTo(self.jElementsWrapper);

            this.counter = this.counter + 1;
        }

    });

    new sx.classes.ExtraInput({$jsOptions});

})(sx, sx.$, sx._);
JS
); ?>
<?= \yii\helpers\Html::endTag('div'); ?>

