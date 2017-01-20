<?php
namespace app\components;

use yii\web\View;
use yii\widgets\Block;

class InlineHeadScript extends Block
{
    public $position = View::POS_READY;

    public function run()
    {
        $block = ob_get_clean();

        $this->getView()->registerJs(str_replace(['<script>','</script>'],['',''], $block), $this->position);
    }
} 