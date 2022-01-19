<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\User;

class Historic extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'amount',
        'total_before',
        'total_after',
        'user_id_transaction',
        'date'
    ];

    public function type($type = null)
    {
        $types = [
            'I' => 'Deposit',
            'O' => 'Extraction',
            'T' => 'Transfer'
        ];

        if(!$type)
            return $types;

        if($this->user_id_transaction != null && $type == 'I')
            return 'Received';

        return $types[$type]; 
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userSender()
    {
        return $this->belongsTo(User::class, 'user_id_transaction');
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
