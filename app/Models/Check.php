<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Endpoint;

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

    public $timestamps = true;

    public function endpoint(): BelongsTo
    {
        return $this->belongsTo(Endpoint::class);
    }

    public function isSuccess(): bool
    {
        return $this->status_code >= 200 && $this->status_code < 300;
    }
}
