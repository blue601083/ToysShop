<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $timestamps = false;
    protected $table = "admins";
    protected $primaryKey = "Id";
    protected $fillable = [
        "Id",
        "name",
        "account",
        "password",
        "createTime",
        "updateTime",
        "deleteTime",
    ];
}
