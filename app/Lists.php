<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model

{
    protected $fillable = ['name', 'model', 'price','quantity'];
}
