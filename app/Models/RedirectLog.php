<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedirectLog extends Model
{
    use HasFactory;

    protected $fillable = ['redirect_id', 'ip', 'user_agent', 'referer', 'query_params'];

    protected $casts = [
        'query_params' => 'array',
    ];

    public function redirect()
    {
        return $this->belongsTo(Redirect::class);
    }
}
