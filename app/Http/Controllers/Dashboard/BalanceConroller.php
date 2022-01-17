<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;

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
}
