<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    // table name
    Protected $table  ='tasks';
    // Primary Key
    public $primaryKey= 'id';

    protected $guarded = [];

    public function user(){

        return $this->belongsTo('APP\User');
    }

}
