<?php

namespace App\EloquentFilters\users;

use Illuminate\Database\Eloquent\Builder;
use phpDocumentor\Reflection\Types\Integer;

class DesignationFilter
{
    /**
     * Apply the filter after validation passes & sanitize
     * @param string $value
     * @param Builder $builder
     */
    public function handle(string $value, Builder $builder): void
    {
        $builder->where('designation.designation', "%{$value}%");
    }


    /**
     * @param mixed $value
     * @return bool|string|array
     */
    public function validate(mixed $value): bool|array|string
    {
        return is_string($value) ;
    }
}
