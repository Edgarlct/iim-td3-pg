<?php

declare(strict_types=1);

namespace Iim\td3;

class Product
{
    private int $id;
    private string $name;
    private string $price;
    private string $url;
    private string $stars;

    public function __construct(int $id, string $name, string $price, string $url, string $stars)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->url = $url;
        $this->stars = $stars;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getStars(): string
    {
        return $this->stars;
    }

    /**
     * @param string $stars
     */
    public function setStars(string $stars): void
    {
        $this->stars = $stars;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

}
