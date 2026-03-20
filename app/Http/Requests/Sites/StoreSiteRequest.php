<?php

namespace App\Http\Requests\Sites;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSiteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'server_id' => ['required', 'integer', 'exists:servers,id'],
            'domain' => ['required', 'string', 'max:255'],
            'site_label' => ['nullable', 'string', 'max:255'],
            'php_version' => ['required', 'string', 'in:8.1,8.2,8.3,8.4'],
            'db_name' => ['required', 'string', 'max:64', 'regex:/^[a-zA-Z0-9_]+$/'],
            'db_user' => ['required', 'string', 'max:32', 'regex:/^[a-zA-Z0-9_]+$/'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'server_id.exists' => 'The selected server does not exist.',
            'domain.required' => 'A domain name is required.',
            'php_version.in' => 'The selected PHP version is not supported.',
            'db_name.regex' => 'Database name may only contain letters, numbers, and underscores.',
            'db_user.regex' => 'Database user may only contain letters, numbers, and underscores.',
        ];
    }
}
