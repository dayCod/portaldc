<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikesForArticle extends Model
{
    use HasFactory, HasUlids;

    /**
     * @var string
     */
    protected $table = 'likes_for_articles';

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var array
     */
    protected $guarded = ['id'];
}
