<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\{ HasMany, HasOne, BelongsTo };
use Illuminate\Database\Eloquent\Model;
use App\Models\{ Site, Check };
class Endpoint extends Model
{
    protected $connection = 'mysql';
    protected $table = 'endpoints';
    protected $primaryKey = 'id';

    protected $fillable = [
        'site_id',
        'endpoint',
        'frequency',
        'next_check'
    ];

    public $timestamps = true;

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    public function checks(): HasMany
    {
        return $this->hasMany(Check::Class);
    }

    public function check(): HasOne
    {
        return $this->hasOne(Check::Class)->latest();
    }

    public function url(): string
    {
        return $this->site->url . $this->endpoint;
    }
}