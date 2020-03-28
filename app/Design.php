<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    //Table 
    protected $table = 'designs';
    // Primary key
    public $primaryKey = 'id';
    //Timestamp
    public $timestamps = true;
}
