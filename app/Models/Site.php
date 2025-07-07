<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\{ HasMany, BelongsTo };
use Illuminate\Database\Eloquent\Model;
use App\Models\{ User, Endpoint };

class Site extends Model
{
    protected $connection = 'mysql';
    protected $table = 'sites';
    protected $primaryKey = 'id';

    protected $fillable = [
        'url'
    ];

    public $timestamps = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function endpoints(): HasMany
    {
        return $this->hasMany(Endpoint::class);
    }
}