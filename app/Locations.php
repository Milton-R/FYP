<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    // table name
    Protected $table  ='locations';
    // Primary Key
    public $primaryKey= 'id';


    public function garden(){

        return $this->belongsTo('APP\Garden');
    }

    public function plants() {
        return $this -> belongsToMany('APP\Plants');
    }
}
