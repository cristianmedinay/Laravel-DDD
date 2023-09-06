<?php 
namespace Domain\Shared\Filters;

 /* clase abstracta */
 /*
 METODO HANDLE ->
 CLOUSURE
 ITEMS
  */
use Illuminate\Database\Eloquent\Builder;

abstract class Filter 
{

 

    public function __construct(protected array|string $filter){}

    abstract public function handle(Builder $item, \Closure $next): Builder;

}


