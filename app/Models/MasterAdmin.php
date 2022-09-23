<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MasterAdmin extends Authenticatable
{
    use HasFactory;
    
    protected $guard = 'admin';

    protected $table= "master_admin";
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
