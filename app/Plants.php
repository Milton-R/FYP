<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Plants extends Model
{
    // table name
    Protected $table  ='plants';
    // Primary Key
    public $primaryKey= 'id';

    protected $guarded = [];


    public $timestamps = false;

    public function location(){

        return $this-> belongsTo(Locations::class,'locations_id');
    }
    public function garden() {
        return $this-> belongsTo(User::class);
    }

}
