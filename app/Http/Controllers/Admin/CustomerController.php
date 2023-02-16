<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function customer($id)
    {
        $admin = auth()->user();
        return $admin->users()->findOrFail($id);
    }

    public function view(Request $request, AuthService $authService, $id)
    {
        $customer = $this->customer($id);
        if ($request->isMethod('post')) {
            return $this->update($request, $authService, $customer);
        }
        $transactions = $customer->transactions()->where('subtype', 'wallet.admin')->simplePaginate(5);
        return view('admin.customer', compact('customer', 'transactions'));
    }

    public function insert(Request $request, AuthService $authService)
    {
        $request->validate([
            'username' => ['required', 'min:3', 'string'],
            'password' => ['required', 'min:6', 'string'],
            'limitless' => ['boolean'],
        ]);
        $customer = $authService->create($request->get('username'), $request->get('password'), 'customer', (bool)$request->get('limitless'), auth()->id());
        if (!$customer) {
            return back()->with(['error_msg' => __('Bayi eklenirken hata oluştu, lütfen bilgileri kontrol ediniz.')]);
        }
        $customer->rooms()->create(['price' => 5, 'color' => '#072358']);
        $customer->rooms()->create(['price' => 10, 'color' => '#3d0758']);
        $customer->rooms()->create(['price' => 25, 'color' => '#580726']);
        return back()->with(['success_msg' => __('Bayi başarıyla eklenmiştir.')]);
    }

    public function update(Request $request, AuthService $authService, $customer)
    {
        if ($request->has('password')) {
            $request->validate(['password' => ['min:6']]);
        }
        if ($request->get('limitless')) {
            $request->request->add(['limitless' => (bool)$request->get('limitless')]);
        }
        if (!$authService->update($customer, $request->all())) {
            return back()->with(['error_msg' => __('Bayi bilgileri güncellenirken hata oluştu.')]);
        }
        return back()->with(['success_msg' => __('Bayi başarıyla güncellenmiştir.')]);
    }
}
