<?php

require '../test/bootstrap.php';

$rucaptcha = Yii::$app->rucaptcha;

$pingbackUrl = 'http://' . getenv('__HOST__') .'/captcha/pingback.php';

// Add pingback url to allowed list
$rucaptcha->addPingback($pingbackUrl);

// List of allowed pingbacks
$allowedPingbacks = $client->getPingbacks();

var_dump($allowedPingbacks);

$rucaptcha->deletePingback($pingbackUrl);

// Check
var_dump($rucaptcha->getPingbacks());
