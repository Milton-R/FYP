<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    // table name
    Protected $table  ='tasks';
    // Primary Key
    public $primaryKey= 'id';

    public function user(){

        return $this->belongsTo('APP\User');
    }

}
