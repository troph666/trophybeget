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

    // Ваши существующие свойства и методы

    public function products()
    {
        return $this->hasMany(Product::class); // Убедитесь, что у вас есть модель Product
    }

    public function orders()
    {
        return $this->hasMany(Order::class); // Убедитесь, что у вас есть модель Order
    }
}
