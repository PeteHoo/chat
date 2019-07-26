<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    //
    public function addContact($data)
    {
        return DB::table('Contact')->insert($data);
    }
}
