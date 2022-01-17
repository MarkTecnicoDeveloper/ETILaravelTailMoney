<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;
use App\Models\User;

class BalanceConroller extends Controller
{
    public function index()
    {
        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;

        return view('dashboard.balance.index', compact('amount'));
    }

    public function deposit()
    {
        return view('dashboard.balance.deposit');
    }

    public function depositStore(MoneyValidationFormRequest $request)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->depositValue);

        if($response['success'])
            return redirect()
                ->route('dashboard.balance')
                ->with('success', $response['message']);
        
        return redirect()
                ->back()
                ->with('error', $response['message']);
    }

    public function withdraw()
    {
        return view('dashboard.balance.withdraw');
    }

    public function withdrawStore(Request $request)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdraw($request->extractValue);

        if($response['success'])
            return redirect()
                ->route('dashboard.balance')
                ->with('success', $response['message']);
        
        return redirect()
                ->back()
                ->with('error', $response['message']);
    }

    public function transfer()
    {
        return view('dashboard.balance.transfer');
    }

    public function confirmTransfer(Request $request, User $user)
    {
        if(!$sender = $user->getSender($request->sender))
            return redirect()
                    ->back()
                    ->with('error', 'User not found');
        
        if($sender->id === auth()->user()->id)
            return redirect()
                    ->back()
                    ->with('error', 'Must be diferent user');

        return view('dashboard.balance.transfer-confirm', compact('sender'));
    }

    public function transferStore(Request $request)
    {
        dd($request->all());
    }
}
