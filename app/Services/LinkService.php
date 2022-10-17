<?php

namespace App\Services;

use App\Http\Dto\LinkCreateDto;
use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Support\Str;

class LinkService implements LinkServiceInterface
{
    /**
     * @return string
     */
    public function generate(): string
    {
        $upperLetters = Str::upper(self::randomLetterString());
        $lowLetters = Str::lower(self::randomLetterString());
        $numbers = rand(10, 99);

        return str_shuffle($upperLetters . $lowLetters . $numbers);
    }

    /**
     * @param LinkCreateDto $dto
     * @return Link
     */
    public function create(LinkCreateDto $dto): Link
    {
        $link = new Link([
            'original_url' => $dto->getUrl(),
            'short_link' => $this->generate(),
            'expired_at' => Carbon::now()->addHours($dto->getLifetime()),
            'max_count' => $dto->getMaxCount(),
        ]);
        $link->save();

        return $link;
    }

    /**
     * @param int $length
     * @return string
     */
    private static function randomLetterString(int $length = 3): string
    {
        $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }
}
