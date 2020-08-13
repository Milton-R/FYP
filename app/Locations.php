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

    protected $fillable = [
        'name', 'plantType', 'OtherType', 'picture','notes', 'locationType' ,'user_set'
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function plants() {
        return $this -> hasMany(Plants::class);
    }
}
