<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * The user's security role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function role()
    {
        return $this->hasMany(User::class);
    }
}
