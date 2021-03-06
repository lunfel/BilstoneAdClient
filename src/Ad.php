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
     * @var integer
     */
    private $width;

    /**
     * @var integer
     */
    private $height;

    /**
     * @var boolean
     */
    private $floating;

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
        $this->width = $jsonAd['width'];
        $this->height = $jsonAd['height'];
        $this->floating = $jsonAd['floating'];
    }

    /**
     * @return string
     */
    public function getContent()
    {
        $style = ['position: relative'];
        $cross = '';

        if ($this->floating) {
            $style = [
                'position: fixed',
                'right: 5px',
                'bottom: 5px',
                'z-index: 1000'
            ];

            $cross = '<div style="display: block;position: absolute;left: -20px;top: -20px;height: 20px;width: 20px; cursor: pointer" onclick="document.querySelector(\'#'. $this->getContainerId() .'\').remove()">X</div>';
        }

        return sprintf(
            '<div id="%s" style="width: %spx; height: %spx; %s">%s%s</div>',
            $this->getContainerId(),
            $this->width,
            $this->height,
            implode(';', $style),
            $cross,
            $this->content
        );
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
        return sprintf('<style>%s</style>', $this->css);
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

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }
}