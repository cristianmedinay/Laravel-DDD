<?php

namespace Domain\Blog\Filters;

use Domain\Shared\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

final class CategoryFilter extends Filter
{
    public function handle(Builder $builder, \Closure $next): Builder
    {
        if ( ! count($this->filter))
        {
            return $next($builder);
        }

        $builder->whereIn('category_id', $this->filter);

        return $next($builder);
    }
}
