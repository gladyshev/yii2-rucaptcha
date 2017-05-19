Yii2 Rucaptcha Extension
========================

An extension for resolving captcha with [Rucaptcha.com](https://rucaptcha.com/?from=1342124). 
It's just a wrapped [gladyshev\rucaptcha-client](https://github.com/gladyshev/rucaptcha-client) library.

Rucaptcha API documentation is at [official page](https://rucaptcha.com/api-rucaptcha?from=1342124).

[![Build Status](https://travis-ci.org/gladyshev/yii2-rucaptcha.svg?branch=master)](https://travis-ci.org/gladyshev/yii2-rucaptcha)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gladyshev/yii2-rucaptcha/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gladyshev/yii2-rucaptcha/?branch=master)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run
```
php composer.phar require --prefer-dist gladyshev/yii2-rucaptcha
```

or add

```
"gladyshev/yii2-rucaptcha": "*"
```

to the `require` section of your `composer.json` file.

Setup
-----

Setup `rucaptcha` component in your configuration file:

```php
    ...
    'components' => [
        ...
        'rucaptcha' => [
            'class' => 'gladyshev\yii\rucaptcha\Rucaptcha',
            'apiKey' => getenv('__RUCAPTCHA_KEY__'),
            'options' => [
                'verbose' => (YII_DEBUG === true)
            ]
        ],
        ...
    ],
    ...
```

Basic Usage
-----------

Recognize file or url:

```php
$captchaText = Yii::$app->rucaptcha->recognizeFile('http://example.com/image.jpg');
```

