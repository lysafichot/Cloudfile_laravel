<?php

namespace App;
use DB;
class Filer extends Model
{
    protected $fillable = [
        'title','path','user_id','file','mime','extension', 'size',
    ];
    protected $hidden = [
        'remember_token',
    ];

}
