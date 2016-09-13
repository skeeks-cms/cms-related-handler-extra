<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 13.09.2016
 */
namespace skeeks\cms\rhExtra;
use skeeks\cms\components\Cms;
use skeeks\cms\models\CmsContentElement;
use skeeks\cms\relatedProperties\models\RelatedPropertiesModel;
use skeeks\cms\relatedProperties\PropertyType;
use skeeks\cms\widgets\ColorInput;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/**
 * Class RelatedHandlerExtra
 *
 * @package skeeks\cms\rhExtra
 */
class RelatedHandlerExtra extends PropertyType
{
    public $code = self::CODE_STRING;

    public $name = "";

    public function init()
    {
        parent::init();

        if(!$this->name)
        {
            $this->name = \Yii::t('skeeks/rh/extra','Extra properties');
        }
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(),
        [
            //'showDefaultPalette'    => \Yii::t('skeeks/cms','Show extended palette of colors'),
        ]);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),
        [
            //['showDefaultPalette', 'string'],
        ]);
    }

    /**
     * @return \yii\widgets\ActiveField
     */
    public function renderForActiveForm()
    {
        $field = parent::renderForActiveForm();

/*        $field->widget(ColorInput::className(), [
            'showDefaultPalette'    => (bool) ($this->showDefaultPalette === Cms::BOOL_Y),
            'useNative'             => (bool) ($this->useNative === Cms::BOOL_Y),
            'saveValueAs'           => (string) $this->saveValueAs,
            'pluginOptions'         => $pluginOptions,
        ]);*/

        return $field;
    }


    /**
     * @return string
     */
    public function renderConfigForm(ActiveForm $activeForm)
    {
    }

    /**
     * @varsion > 3.0.2
     *
     * @return $this
     */
    public function addRules()
    {
        $this->property->relatedPropertiesModel->addRule($this->property->code, 'safe');

        return $this;
    }
}