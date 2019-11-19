<?php

namespace app\components;


use yii\base\Widget;
use yii\helpers\Html;
class Weather  extends Widget {
    public $apiKey;
    public $cityId;
    public function init() {
        // your logic here
        parent::init();
    }
    public function run(){
        // you can load & return the view or you can return the output variable
        return $this->render('weather', ['apikey' => $this->apiKey,'cityId'=>$this->cityId]);
    }
}

?>
