<?php

require '../test/bootstrap.php';

$rucaptcha = Yii::$app->rucaptcha;

$taskIds = [];

$taskIds[] = $rucaptcha->sendCaptcha(file_get_contents(__DIR__.'/data/captcha.png'));
$taskIds[] = $rucaptcha->sendCaptcha(file_get_contents(__DIR__.'/data/yandex.gif'), [
    Rucaptcha\Extra::IS_RUSSIAN => 1
]);

$results = [];

while (count($taskIds) > 0) {
    // Try get results
    foreach ($taskIds as $i => $taskId) {
        // Wait 5 sec
        sleep(5);

        $results[$taskId] = $rucaptcha->getCaptchaResult($taskId);

        // false === is not ready or exception on error
        if ($results[$taskId] === false) {
            continue;
        } else {
            unset($taskIds[$i]);
        }
    }
}

print_r($results);
