<?php

require '../test/bootstrap.php';

$loadData = Yii::$app->rucaptcha->getLoad('waiting');

var_dump($loadData);
