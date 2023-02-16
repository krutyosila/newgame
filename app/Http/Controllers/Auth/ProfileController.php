<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index(Request $request)
    {
        $user = auth()->user();
        if($request->isMethod('post')) {
            $user->update($request->only('detail.name', 'detail.phone', 'email'));
            return back()->with(['success_msg' => 'Bilgileriniz başarıyla güncellendi.']);
        }
        $authentications = $user->lastAuthentications(10);
        return view('auth.profile', compact('user', 'authentications'));
    }
}
