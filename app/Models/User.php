<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    

    public function products()
    {
        return $this->hasMany(Product::class); 
    }

    public function orders()
    {
        return $this->hasMany(Order::class); 
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
