<?php

namespace Bilstone\AdClient;

/**
 * Class Ad
 *
 * @package Bilstone\AdClient
 *
 * @author Mathieu Tanguay <mathieu.tanguay871@gmail.com>
 */
class Ad
{
    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $css;

    /**
     * @var string
     */
    private $containerId;

    /**
     * Represents an ad
     *
     * @param $content
     * @param $css
     */
    public function __construct($jsonAd = null)
    {
        if (empty($jsonAd)) return;

        $this->content = $jsonAd['content_with_wrapping'];
        $this->css = $jsonAd['css'];
        $this->containerId = $jsonAd['container_id'];
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return sprintf('<div id="%s">%s</div>', $this->getContainerId(), $this->content);
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getCss()
    {
        return $this->css;
    }

    /**
     * @param string $css
     */
    public function setCss($css)
    {
        $this->css = $css;
    }

    /**
     * @return string
     */
    public function getContainerId()
    {
        return $this->containerId;
    }
}