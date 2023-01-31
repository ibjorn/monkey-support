<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ticket_id',
        'reply',
        'status',
    ];

    const STATUSES = [
        'waiting' => 'waiting',
        'responded' => 'responded',
        'closed' => 'Closed',
    ];

    public function getStatusColorAttribute()
    {
        return [
            'waiting' => 'orange',
            'responded' => 'blue',
        ][$this->status] ?? 'gray';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
