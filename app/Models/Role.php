<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $fillable =['name'];
    // scopes ------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->when('name', 'like', "%$search");
        });
    }
    public function scopeWhereRolesNot($query, $role_name)
    {
        return $query->whereNotIn('name',(array)$role_name);
    }
}
