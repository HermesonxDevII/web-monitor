<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\{ HasMany, BelongsTo };
use Illuminate\Database\Eloquent\{ Model, Builder };
use Illuminate\Support\Facades\Auth;
use App\Models\{ User, Endpoint };

class Site extends Model
{
    protected $connection = 'mysql';
    protected $table = 'sites';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'url'
    ];

    protected static function booted()
    {
        static::addGlobalScope('user', function (Builder $builder) {
            if(!app()->runningInConsole()) {
                $builder->where('user_id', Auth::user()->id);
            }
        });
    }

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