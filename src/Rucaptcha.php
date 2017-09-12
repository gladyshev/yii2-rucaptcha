<?php

namespace gladyshev\yii\rucaptcha;

use Psr\Log\LoggerInterface;
use Rucaptcha\Client as RucaptchaClient;
use Yii;
use yii\base\Component;

/**
 * Class Rucaptcha
 * @method void setOptions(array $options)
 * @method void setHttpClient(\GuzzleHttp\ClientInterface $client);
 * @method void setLogger(\Psr\Log\LoggerInterface $logger);
 * @method string recognize(string $content, array $extra = [])
 * @method string recognizeFile(string $path, array $extra = [])
 * @method int sendCaptcha(string $content, array $extra = [])
 * @method string getCaptchaResult(int $captchaId)
 * @method array getCaptchaResultBulk(array $captchaIds)
 * @method bool addPingback(string $uri)
 * @method array getPingbacks()
 * @method bool deletePingback(string $uri)
 * @method bool deleteAllPingbacks()
 * @method int sendRecapthaV2($googleKey, $pageUrl, $extra = [])
 * @method string recognizeRecapthaV2($googleKey, $pageUrl, $extra = [])
 * @method string getLastCaptchaId()
 * @method string sendKeyCaptcha($SSCUserId, $SSCSessionId, $SSCWebServerSign, $SSCWebServerSign2, $pageUrl, $extra = [])
 * @method string recognizeKeyCaptcha($SSCUserId, $SSCSessionId, $SSCWebServerSign, $SSCWebServerSign2, $pageUrl, $extra = [])
 * @method string getBalance()
 * @method bool badCaptcha(string $captchaId)
 * @method array getLoad(array $paramsList = [])
 * @method \SimpleXmlElement getLoadXml()
 *
 * @author Dmitry Gladyshev <deel@email.ru>
 */
class Rucaptcha extends Component
{
    /**
     * Rucaptcha client api key.
     *
     * @var string
     */
    public $apiKey;

    /**
     * Rucaptcha client options.
     *
     * @var array
     */
    public $options = [];

    /**
     * Logger class.
     *
     * @var string|array
     */
    public $logger = '\gladyshev\yii\rucaptcha\Logger';

    /**
     * Rucaptcha client.
     *
     * @var RucaptchaClient
     */
    protected $client;

    /**
     * @param string $name
     * @param array $params
     * @return mixed
     */
    public function __call($name, $params)
    {
        return call_user_func_array([$this->getClient(), $name], $params);
    }

    /**
     * @return RucaptchaClient
     */
    public function getClient()
    {
        if ($this->client === null) {
            $this->client = new RucaptchaClient($this->apiKey, $this->options);
            if (isset($this->options['verbose']) && $this->options['verbose']) {
                $logger = Yii::createObject($this->logger);
                if ($logger instanceof LoggerInterface) {
                    $this->client->setLogger($logger);
                }
            }
        }
        return $this->client;
    }
}
