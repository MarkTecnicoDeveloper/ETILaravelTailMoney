<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Balance extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function deposit(float $value) : Array
    {
        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount += number_format($value, 2, '.', '');
        $deposit = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'          => 'I',
            'amount'        => $value,
            'total_before'  => $totalBefore,
            'total_after'   => $this->amount,
            'date'          => date('Ymd')    
        ]);

        if($deposit && $historic)
        {
            DB::commit();

            return [
                'success' => true,
                'message' => 'Success into deposit'
            ];
        } else {
            DB::rollback();    

            return [
                'success' => false,
                'message' => 'Error into deposit'
            ];
        }
    }

    public function withdraw(float $value) : Array
    {
        if($this->amount < $value)
            return [
                'success' => false,
                'message' => 'Insuficient founds'
            ]; 

        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($value, 2, '.', '');
        $withdraw = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'          => 'O',
            'amount'        => $value,
            'total_before'  => $totalBefore,
            'total_after'   => $this->amount,
            'date'          => date('Ymd')    
        ]);

        if($withdraw && $historic)
        {
            DB::commit();

            return [
                'success' => true,
                'message' => 'Success into extract'
            ];
        } else {
            DB::rollback();    

            return [
                'success' => false,
                'message' => 'Error into extract'
            ];
        }
    }

    public function transfer(float $value, User $sender) : Array
    {
        if($this->amount < $value)
            return [
                'success' => false,
                'message' => 'Insuficient founds'
            ]; 

        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($value, 2, '.', '');
        $transfer = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'                  => 'T',
            'amount'                => $value,
            'total_before'          => $totalBefore,
            'total_after'           => $this->amount,
            'date'                  => date('Ymd'),
            'user_id_transaction'   => $sender->id,
        ]);

        $senderBalance = $sender->balance()->firstOrCreate([]);
        $totalBeforeSender = $senderBalance->amount ? $senderBalance->amount : 0;
        $senderBalance->amount += number_format($value, 2, '.', '');
        $transferSender = $senderBalance->save();

        $historicSender = $sender->historics()->create([
            'type'                  => 'I',
            'amount'                => $value,
            'total_before'          => $totalBeforeSender,
            'total_after'           => $senderBalance->amount,
            'date'                  => date('Ymd'),
            'user_id_transaction'   => auth()->user()->id,
        ]);

        if($transfer && $historic && $transferSender && $historicSender)
        {
            DB::commit();

            return [
                'success' => true,
                'message' => 'Success into extract'
            ];
        } else {
            DB::rollback();    

            return [
                'success' => false,
                'message' => 'Error into extract'
            ];
        }
    }
}
