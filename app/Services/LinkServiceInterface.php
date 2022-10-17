<?php

namespace App\Services;

use App\Http\Dto\LinkCreateDto;

interface LinkServiceInterface
{
    /**
     * @return string
     */
    public function generate(): string;

    /**
     * @param LinkCreateDto $dto
     * @return mixed
     */
    public function create(LinkCreateDto $dto);
}
