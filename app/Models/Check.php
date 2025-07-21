<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\{ Model, Builder };
use App\Models\Endpoint;
use Carbon\Carbon;

class Check extends Model
{
    protected $connection = 'mysql';
    protected $table = 'checks';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'endpoint_id',
        'status_code',
        'response_body'
    ];

    protected static function booted()
    {
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }

    public $timestamps = true;

    public function endpoint(): BelongsTo
    {
        return $this->belongsTo(Endpoint::class);
    }

    public function isSuccess(): bool
    {
        return $this->status_code >= 200 && $this->status_code < 300;
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            fn (string $value) => Carbon::make($value)->format('d/m/Y H:i')
        );
    }
}
