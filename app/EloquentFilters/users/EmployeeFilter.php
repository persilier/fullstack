<?php

namespace App\EloquentFilters\users;

use Illuminate\Database\Eloquent\Builder;

class EmployeeFilter
{

    /**
     * Apply the filter after validation passes & sanitize
     * @param string $value
     * @param  Builder  $builder
     */
    public function handle(string $value, Builder $builder): void
    {
        $builder->where('last_name','LIKE', "%{$value}%")
                ->orWhere('first_name','LIKE', "%{$value}%");
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
