<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    // table name
    Protected $table  ='locations';
    // Primary Key
    public $primaryKey= 'id';


    public function user(){

        return $this->belongsTo(User::class);
    }

    public function plants() {
        return $this -> belongsToMany('APP\Plants');
    }
}
