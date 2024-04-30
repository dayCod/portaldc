<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, HasUlids;

    /**
     * @return void
     */
    protected static function booted(): void
    {
        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }

    /**
     * @var string
     */
    CONST ORIGINAL_CATEGORY = '0';

    /**
     * @var string
     */
    CONST SOCIAL_CATEGORY = '1';

    /**
     * @var string
     */
    protected $table = 'articles';

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function contentArticle(): HasOne
    {
        return $this->hasOne(ContentArticle::class, 'article_id', 'id');
    }

    /**
     * @param Builder $query
     * @param string $articleId
     * @param string $field
     * @param int $amount
     * @return Collection
     */
    public function scopeUpdateStatsField($query, $articleId, $field, $amount)
    {
        $article = $query->where('id', $articleId)->first();

        return tap($article)->update([
            $field => $article->{$field} + $amount
        ]);
    }
}
