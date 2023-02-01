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
        'responded' => 'Responded',
        'closed' => 'Closed',
    ];

    public function getStatusColorAttribute()
    {
        return [
            'new' => 'green',
            'open' => 'blue',
            'responded' => 'yellow',
        ][$this->status] ?? 'gray';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
