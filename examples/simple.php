<?php

require '../test/bootstrap.php';

$captchaText = Yii::$app->rucaptcha->recognizeFile(__DIR__.'/data/yandex.gif');

var_dump($captchaText);