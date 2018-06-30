<?php

namespace Infrastructure\requests;

class CreateArtRequest extends BaseApiRequest
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

    public function rules(): array
    {
        return [
            'name' => 'required|unique:art|max:255|string',
            'description' => 'required|string',
        ];
    }
}