<?php 
namespace Domain\Shared\Filters;

 /* clase abstracta */
 /*
 METODO HANDLE ->
 Builder : los Posts ITEMS
 CLOUSURE : pasar siguiente filtro
  */
use Illuminate\Database\Eloquent\Builder;

abstract class Filter 
{

 

    public function __construct(protected array|string $filter){}

    abstract public function handle(Builder $builder, \Closure $next): Builder;

}


