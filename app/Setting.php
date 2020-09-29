<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['sitename', 'address', 'contact_number', 'contact_email'];
}
