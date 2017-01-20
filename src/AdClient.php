<?php

namespace Bilstone\AdClient;
use Curl\Curl;

/**
 * Class Client
 *
 * @package Bilstone\AdClient
 *
 * @author Mathieu Tanguay <mathieu.tanguay871@gmail.com>
 */
class AdClient
{
    /**
     * The host to connect to fetch the ads
     *
     * @var string
     */
    private $host;

    /**
     * The client key to identify yourself to the ad server
     *
     * @var string
     */
    private $clientKey;

    /**
     * Client constructor.
     *
     * @param $host
     * @param $clientKey
     */
    public function __construct($host, $clientKey)
    {
        $this->clientKey = $clientKey;
        $this->host = $host;
    }

    /**
     * Fetchs an ad to display
     *
     * @param $view string Chose which view to fetch
     * @return Ad|array
     */
    public function fetch($view)
    {
        $curl = new Curl();

        $data = [
            'clientKey' => $this->clientKey,
            'client_ip' => $this->getClientIp()
        ];

        $curl->get(sprintf(
            "%s/api/serve/backend/%s?%s",
            $this->host,
            $view
        ), $data);

        if ($curl->error) {
            return new Ad();
        }

        $jsonAd = json_decode($curl->response, true);

        if (empty($jsonAd)) {
            return new Ad();
        }

        $ad = new Ad($jsonAd);

        return $ad;
    }

    /**
     * @return string
     */
    protected function getClientIp()
    {
        $ip = 'unknown';

        if (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }
}