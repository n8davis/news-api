<?php
/**
 * Created by PhpStorm.
 * User: nate
 * Date: 8/26/18
 * Time: 2:46 PM
 */

namespace News\News;


class Headline implements \JsonSerializable
{
    protected $source;
    protected $author;
    protected $title;
    protected $description;
    protected $url;
    protected $urlToImage;
    protected $publishedAt;

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

    /**
     * @return Source
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param Source $source
     * @return Headline
     */
    public function setSource( Source $source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     * @return Headline
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Headline
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Headline
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return Headline
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrlToImage()
    {
        return $this->urlToImage;
    }

    /**
     * @param mixed $urlToImage
     * @return Headline
     */
    public function setUrlToImage($urlToImage)
    {
        $this->urlToImage = $urlToImage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param mixed $publishedAt
     * @return Headline
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
        return $this;
    }



}