<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'description',
        'status',
    ];

    const STATUSES = [
        'new' => 'New',
        'open' => 'Open',
        'waiting' => 'Waiting',
        'closed' => 'Closed',
    ];

    public function getStatusColorAttribute()
    {
        return [
            'new' => 'green',
            'open' => 'blue',
            'waiting' => 'yellow',
        ][$this->status] ?? 'gray';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
