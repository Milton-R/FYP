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

    public function location(){

        return $this-> belongsToMany('APP\Locations');
    }
    public function garden() {
        return $this-> belongsTo('APP\User');
    }

}
