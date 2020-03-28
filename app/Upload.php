<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //Table 
    protected $table = 'uploads';
    // Primary key
    public $primaryKey = 'id';
    //Timestamp
    public $timestamps = true;
}
