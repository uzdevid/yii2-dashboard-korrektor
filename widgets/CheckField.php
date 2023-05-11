<?php

namespace uzdevid\dashboard\korrektor\widgets;

use yii\helpers\Html;

class CheckField extends \yii\base\Widget {
    public string $id;
    public string $content;
    public array $options = ['class' => 'btn btn-secondary'];

    public function run(): string {
        $this->options['class'] .= ' korrektor-check-field-button';
        $this->options['data-id'] = $this->id;
        return Html::button($this->content, $this->options);
    }
}