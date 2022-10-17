<?php

namespace App\Http\Requests;

use App\Http\Dto\LinkCreateDto;
use Illuminate\Foundation\Http\FormRequest;

class LinkCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'url' => ['required', 'string', 'url'],
            'lifetime' => ['required', 'integer', 'min:1', 'max:24'],
            'max_count' => ['required', 'integer', "min:0", "max:2147483647"],
        ];
    }

    /**
     * @return LinkCreateDto
     */
    public function getDto(): LinkCreateDto
    {
        return new LinkCreateDto(
            $this->get('url'),
            $this->get('lifetime'),
            $this->get('max_count')
        );
    }
}
