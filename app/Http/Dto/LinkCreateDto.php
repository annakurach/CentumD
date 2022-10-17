<?php

namespace App\Http\Dto;

class LinkCreateDto
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var int
     */
    private $lifetime;

    /**
     * @var int
     */
    private $maxCount;

    /**
     * @param string $url
     * @param int $lifetime
     * @param int $maxCount
     */
    public function __construct(string $url, int $lifetime, int $maxCount)
    {
        $this->url = $url;
        $this->lifetime = $lifetime;
        $this->maxCount = $maxCount;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return int
     */
    public function getLifetime(): int
    {
        return $this->lifetime;
    }

    /**
     * @return int
     */
    public function getMaxCount(): int
    {
        return $this->maxCount;
    }
}
