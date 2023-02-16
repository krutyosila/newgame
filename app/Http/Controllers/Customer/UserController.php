<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isNull;

class UserController extends Controller
{

    public function user($id)
    {
        $customer = auth()->user();
        return $customer->users()->findOrFail($id);
    }

    public function view(Request $request, AuthService $authService, $id)
    {
        $user = $this->user($id);
        if ($request->isMethod('post')) {
            return $this->update($request, $authService, $user);
        }
        $transactions = $user->transactions()->where('subtype', 'wallet.customer')->simplePaginate(10);
        $cardTransactions = $user->transactions()->where('subtype', 'bingo.cards')->simplePaginate(10);
        return view('customer.user', compact('user', 'transactions'));
    }

    public function insert(Request $request, AuthService $authService)
    {
        $request->validate([
            'username' => ['required', 'min:3', 'string'],
            'password' => ['required', 'min:6', 'string'],
        ]);
        if (!$authService->create($request->get('username'), $request->get('password'), 'user', (bool)$request->get('limitless'), auth()->id())) {
            return back()->with(['error_msg' => __('Müşteri eklenirken hata oluştu, lütfen bilgileri kontrol ediniz.')]);
        }
        return back()->with(['success_msg' => __('Müşyeri başarıyla eklenmiştir.')]);
    }

    public function update(Request $request, AuthService $authService, $user)
    {
        if ($request->has('password')) {
            $request->validate(['password' => ['min:6']]);
        }
        if ($request->has('bayonet')) {
            $request->request->add(['bayonet' => $request->get('bayonet') == '1']);
        }
        if (!$authService->update($user, $request->all())) {
            return back()->with(['error_msg' => __('Müşteri bilgileri güncellenirken hata oluştu.')]);
        }
        return back()->with(['success_msg' => __('Müşteri başarıyla güncellenmiştir.')]);
    }
}
