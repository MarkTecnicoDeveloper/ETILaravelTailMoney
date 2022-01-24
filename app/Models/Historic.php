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

    public function scopeUserAuth($query)
    {
        return $query->where('user_id', auth()->user()->id);
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

    public function search(Array $data, $totalPage)
    {
        return $this->where(function ($query) use($data) {
            if(isset($data['id']))
                $query->where('id', $data['id']);
            
            if(isset($data['date']))
                $query->where('date', $data['date']);

            if(isset($data['type']))
                $query->where('type', $data['type']);
        })//->toSql(); dd($historics);
        //->where('user_id', auth()->user()->id)
        ->userAuth()
        ->with(['userSender'])
        ->paginate($totalPage);
    }
}
