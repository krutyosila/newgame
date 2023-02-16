<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BingoRoomController extends Controller
{
    public function index()
    {
        $rooms = auth()->user()->rooms;
        return view('customer.rooms', compact('rooms'));
    }

    public function view(Request $request, $id)
    {
        $room = auth()->user()->rooms()->findOrFail($id);
        if ($request->isMethod('post')) {
            return $this->update($request, $room);
        }
        return view('customer.room', compact('room'));
    }

    public function update(Request $request, $room)
    {

        $request->validate([
            'price' => ['required', 'numeric', 'min:1'],
            'c1' => ['required', 'numeric', 'min:1'],
            'c2' => ['required', 'numeric', 'min:1'],
            'bingo' => ['required', 'numeric', 'min:1'],
            'rompers' => ['required', 'numeric', 'min:0'],
            'first5' => ['required', 'numeric', 'min:0'],
            'first10' => ['required', 'numeric', 'min:0'],
            'minimum' => ['required', 'numeric', 'min:1', 'max:10'],
            'color' => ['required']
        ]);
        $request->request->add(['state' => (bool)$request->get('state')]);
        $room->update($request->all());
        return redirect()->route('back.customer.room.index')->with(['success_msg' => 'Oda başarıyla güncellenmiştir.']);
    }
}
