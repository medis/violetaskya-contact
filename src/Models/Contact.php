<?php

namespace VioletaskyaContact\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Contact extends BaseModel
{
    protected $fillable = ['name', 'email', 'message'];
}