<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
   use HasFactory;

   protected $fillable = [
       'location',
       'event_name',
       'registered_users',
       'event_date',
       'info',
       // other fields that you want to allow for mass assignment...
   ];
}