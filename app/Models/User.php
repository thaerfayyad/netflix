<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
    //scope------
    public function scopeWhereSearch($query,$search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name','like',"%$search%");
        });
    }
    public function scopeWhereRole($query ,$role_name)
    {
        return $query->whereHas('roles', function ($q) use ($role_name) {
           return $q->whereIn('name' , (array)$role_name)
               ->orWhereIn('id', (array) $role_name);
        });
    }
    public function scopeWhereRoleNot($query , $role_name)
    {
        return $query->whereHas('roles', function ($q) use ($role_name) {
            return $q->whereNotIn('name' , (array)$role_name)
                ->WhereNotIn('id', (array) $role_name);;
        });
    }
    public function scopeWhenRole($query, $role_id)
    {
        return $query->when($role_id,function ($q) use ($role_id){
            return $this->scopeWhereRole($q,$role_id);
        });

    }

}
