<?php

namespace gladyshev\yii\rucaptcha;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;
use Psr\Log\LogLevel;
use Yii;
use yii\base\Object;
use yii\log\Logger as YiiLogger;

/**
 * Class Logger
 *
 * @author Dmitry Gladyshev <deel@email.ru>
 * @since 2.0
 */
class Logger extends Object implements LoggerInterface
{
    use LoggerTrait;

    /**
     * @var string
     */
    public $category = 'rucaptcha';

    /**
     * @var callable
     */
    public $levelTranslator = ['\gladyshev\yii\rucaptcha\Logger', 'psr2yii'];

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function log($level, $message, array $context = [])
    {
        $level = call_user_func($this->levelTranslator, $level);
        Yii::getLogger()->log($message, $level, $this->category);
    }

    /**
     * Translate psr to yii log levels.
     *
     * @param $psrLevel
     * @return int
     */
    public static function psr2yii($psrLevel)
    {
        switch ($psrLevel) {
            case LogLevel::EMERGENCY:
            case LogLevel::NOTICE:
            case LogLevel::ALERT:
            case LogLevel::WARNING:
                return YiiLogger::LEVEL_WARNING;

            case LogLevel::CRITICAL:
            case LogLevel::ERROR:
                return YiiLogger::LEVEL_ERROR;

            case LogLevel::INFO:
                return YiiLogger::LEVEL_INFO;

            case LogLevel::DEBUG:
            default:
                return YiiLogger::LEVEL_TRACE;
        }
    }
}
