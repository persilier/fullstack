<?php

namespace App\EloquentFilters\users;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Integer;

class RolesFilter
{
    /**
     * Apply the filter after validation passes & sanitize
     * @param array $value
     * @param Builder $builder
     */
    public function handle(array $value, Builder $builder): void
    {
        $builder->whereIn('roles', $value);
    }


    /**
     * @param mixed $value
     * @return bool|string|array
     */
    public function validate(mixed $value): bool|array|string
    {
        return [
            'value' => 'array',
            'value.*'=>['string',Rule::in(['Admin','audit','employee','manager','rh'])]
        ] ;
    }
}
