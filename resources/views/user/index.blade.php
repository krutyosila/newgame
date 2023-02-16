@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/dash_1.css') }}">
    <div class="row pt-page rooms">
        @foreach($rooms as $room)
            <div class="area col-12 col-md-4">
                <a href="{{ route('bingo.index', ['id' => $room->id]) }}" class="room"
                    style="background-color: {{ $room->color }}; border-color: {{ $room->color }}">
                    <div class="room-bg">
                        <div class="head">
                            <div class="price font-weight-bold">{{ $room->price."₺" }}</div>
                            <div class="total">
                                <small>Toplam Ödül</small>
                                <span>
                                {{ number_format($room->c1+$room->c2+$room->bingo+$room->rompers+$room->first5+$room->first10)."₺" }}
                            </span>
                            </div>
                        </div>
                        <div class="info small">
                            Minimum Kart : <b>1</b>
                        </div>
                    </div>
                    <div class="prizes d-flex align-items-center">
                        <div class="prize">
                            1.Çinko
                            <b class="ml-auto">{{ $room->c1."₺" }}</b>
                        </div>
                        <div class="prize">
                            2.Çinko
                            <b class="ml-auto">{{ $room->c1."₺" }}</b>
                        </div>
                        <div class="prize">
                            Tombala
                            <b class="ml-auto">{{ $room->c1."₺" }}</b>
                        </div>
                        <div class="prize">
                            Tulum
                            <b class="ml-auto">{{ $room->c1."₺" }}</b>
                        </div>
                    </div>
                    <div class="gifts d-none">
                        <div class="d-flex align-items-center">
                            1.Çinko
                            <b class="ml-auto">{{ $room->c1."₺" }}</b>
                        </div>
                        <div class="d-flex align-items-center">
                            2.Çinko
                            <b class="ml-auto">{{ $room->c2."₺" }}</b>
                        </div>
                        <div class="d-flex align-items-center">
                            Tombala
                            <b class="ml-auto">{{ $room->bingo."₺" }}</b>
                        </div>
                        <div class="d-flex align-items-center">
                            Tulum
                            <b class="ml-auto">{{ $room->rompers."₺" }}</b>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
