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
     * Represents an ad
     *
     * @param $content
     * @param $css
     */
    public function __construct($content, $css)
    {
        $this->content = $content;
        $this->css = $css;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
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
}