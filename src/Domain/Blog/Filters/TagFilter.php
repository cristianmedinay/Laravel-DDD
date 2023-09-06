<?php

namespace Domain\Blog\Filters;

use Domain\Shared\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

final class TagFilter extends Filter
{
    public function handle(Builder $builder, \Closure $next): Builder
    {

        //obtenemos un array y filtramos con multiples opciones
        if ( ! count($this->filter))
        {
            return $next($builder);
        }

        $builder
            ->whereHas("tags", fn (Builder $tags) => $tags->whereIn("id", $this->filter));

        return $next($builder);
    }
}
