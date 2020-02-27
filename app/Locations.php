<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    // table name
    protected $table  ='locations';
    // Primary Key
    public $primaryKey= 'id';

    protected $guarded = [];


    public function user(){

        return $this->belongsTo(User::class);
    }

    public function plants() {
        return $this -> belongsToMany('APP\Plants');
    }
}
