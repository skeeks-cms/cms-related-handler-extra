<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 13.09.2016
 */
namespace skeeks\cms\rhExtra;

use yii\helpers\Html;
use yii\widgets\InputWidget;

class ExtraInputWidget extends InputWidget
{
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

        $this->options['id'] = $this->id;
    }


    /**
	 * @inheritdoc
	 */
	public function run()
	{
        $inputId = $this->id . "-input";

        $this->clientOptions['inputId'] = $inputId;

        $value = '';
        if ($this->hasModel())
        {
			$input = Html::activeHiddenInput($this->model, $this->attribute);
            $this->clientOptions['inputId'] = Html::getInputId($this->model, $this->attribute);
            $value = Html::getAttributeValue($this->model, $this->attribute);

		} else
        {
            $input = Html::hiddenInput($this->name, $this->value, [
                'id' => $inputId
            ]);

            $value = $this->value;
		}


        return $this->render('extra-input', [
            'input'     => $input,
        ]);
	}



}