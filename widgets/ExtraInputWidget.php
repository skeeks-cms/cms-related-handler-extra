<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 13.09.2016
 */
namespace skeeks\cms\rhExtra;

use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\widgets\InputWidget;

class ExtraInputWidget extends InputWidget
{
    public static $autoIdPrefix = 'ExtraInputWidget';

    /**
     * @var array опции контейнера
     */
    public $options   = [];

    /**
     * @var array
     */
    public $clientOptions   = [];

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();

        $this->options['id']        = $this->id . "-widget";
        $this->options['class']     = "";
        $this->clientOptions['id']  = $this->id . "-widget";
    }


    /**
	 * @inheritdoc
	 */
	public function run()
	{

        $element = '';

        if ($this->hasModel())
        {
			/*$element = Html::activeTextInput($this->model, $this->attribute, [
                'value' => 1
            ]);*/

            $this->clientOptions['inputName']       = Html::getInputName($this->model, $this->attribute);
            $this->clientOptions['value']           = $this->model->{$this->attribute};
            /*$this->clientOptions['elementId'] = Html::getInputId($this->model, $this->attribute);*/

		} else
        {
            throw new InvalidConfigException;
		}


        return $this->render('extra-input', [
            'element'     => $element,
        ]);
	}



}