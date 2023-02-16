<?php

namespace App\Http\Controllers;

use App\Services\BalanceService;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function do(Request $request, BalanceService $balanceService)
    {
        $request->validate([
            'type' => ['required', 'string'],
            'subtype' => ['required', 'string'],
            'amount' => ['required', 'numeric', 'min:1']
        ]);
        $request->validate(['type' => ['string']]);
        $owner = auth()->user();
        $user = $owner->users()->findOrFail($request->get('user'));
        if($owner->role == 'customer') {
            if(!$owner->limitless) {
                if($request->get('type') == 'deposit') {
                    if($owner->balance < $request->get('amount')) {
                        return back()->with(['error_msg' => 'Bakiyeniz bu işlem için yeterli değildir.']);
                    } else {
                        $balanceService->withdraw($owner, 'wallet.user', $request->get('amount'), []);
                    }
                } else {
                    if($user->balance < $request->get('amount')) {
                        return back()->with(['error_msg' => 'Bakiyeniz bu işlem için yeterli değildir.']);
                    }
                    $balanceService->deposit($owner, 'wallet.user', $request->get('amount'), []);
                }
            }
        }
        switch ($request->get('type')) {
            case 'deposit':
                $balanceService->deposit($user, $request->get('subtype'), $request->get('amount'), []);
                break;
            case 'withdraw':
                $balanceService->withdraw($user, $request->get('subtype'), $request->get('amount'), []);
                break;
        }
        return back()->with(['sucess_msg' => '']);
    }
}
