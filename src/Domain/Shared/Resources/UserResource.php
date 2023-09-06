<?php 
/*Eloquent api Resource*/

use Domain\Shared\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
* @mixin User
*/

class UserResource extends JsonResource{

    //RETORNAMOS AL USUARIO UN JSON ARRAY
    //DATOS PARA RETORNAR
    public function toArray($request):array
    {
        return[
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
            
        ];     
    }


}