<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, HasUlids;

    /**
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($role) {
            $role->name = Str::lower($role->name);
        });
    }

    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var array
     */
    protected $guarded = ['id'];
}
