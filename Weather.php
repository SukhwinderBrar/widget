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

        $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);

        curl_close($ch);
        $data = json_decode($response);
        $currentTime = time();
        // you can load & return the view or you can return the output variable
        return $this->render('weather', ['date'=>$data]);
    }
}

?>
