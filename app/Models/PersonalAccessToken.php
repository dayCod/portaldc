<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccessToken extends Model
{
    use HasFactory, HasUlids;

    /**
     * @var string
     */
    protected $table = 'personal_access_tokens';

    /**
     * @var array
     */
    protected $guarded = ['id'];
}
