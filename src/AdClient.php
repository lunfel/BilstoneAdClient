<?php

namespace Bilstone\AdClient;

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
     * @return Ad
     */
    public function fetch($view)
    {
        $strAd = file_get_contents(sprintf("%s/ad/serve/%s/%s", $this->host, $this->clientKey, $view));

        $ad = new Ad($strAd, "");

        return $ad;
    }
}