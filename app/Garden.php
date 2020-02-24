<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garden extends Model
{
    // table name
    Protected $table  ='gardens';
    // Primary Key
    public $primaryKey= 'id';

    public function user(){

        return $this->belongsTo('APP\User');
    }

    public function locations(){

        return $this->hasMany('App\Locations');
}

    public function plants(){

        return $this->hasMany('App\Plants');
    }

    public function tasks(){

        return $this->hasMany('App\Tasks');
    }


}
