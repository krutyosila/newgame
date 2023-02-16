@extends('layouts.app')
@push('js')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mdbassit/Coloris@latest/dist/coloris.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mdbassit/Coloris@latest/dist/coloris.min.js"></script>
    <script>
        Coloris({
            el: '.coloris',
            swatches: [
                '#264653',
                '#2a9d8f',
                '#e9c46a',
                '#f4a261',
                '#e76f51',
                '#d62828',
                '#023e8a',
                '#0077b6',
                '#0096c7',
                '#00b4d8',
                '#48cae4'
            ]
        });
    </script>
@endpush
@section('content')
    <form action="{{ route('back.customer.room.view', ['id' => $room->id]) }}" method="POST">
        @csrf
        <div class="layout">
            <h6 class="mb-0 layout-title d-flex align-items-center">
                <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none"
                     stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                </svg>
                Oda Düzenle
                <div class="d-flex ml-auto">
                    <label class="switch s-icons s-outline s-outline-success mr-2 mb-0">
                        <input name="state" type="checkbox" {{ $room->state ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                    <small>Pasif / Aktif</small>
                </div>
            </h6>
            <div class="layout-content">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="minimum">Minimum Kart</label>
                            <select id="minimum" name="minimum" class="form-control @error('minimum') is-invalid @enderror">
                                @for($i = 1; $i <= 10; ++$i)
                                    <option value="{{$i}}" @if($room->minimum == $i) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="price">Kart Ücreti</label>
                            <input id="price" name="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ $room->price }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2">
                        <div class="form-group">
                            <label for="color">Oda Rengi</label>
                            <input type="text" name="color" id="color" class="coloris instance1" value="{{ $room->color }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="c1">1.Çinko</label>
                            <input id="c1" name="c1" type="text" class="form-control @error('c1') is-invalid @enderror" value="{{ $room->c1 }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="c2">2.Çinko</label>
                            <input id="c2" name="c2" type="text" class="form-control @error('c2') is-invalid @enderror" value="{{ $room->c2 }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="bingo">Tombala</label>
                            <input id="bingo" name="bingo" type="text" class="form-control @error('bingo') is-invalid @enderror" value="{{ $room->bingo }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="rompers">Tulum</label>
                            <input id="rompers" name="rompers" type="text" class="form-control @error('rompers') is-invalid @enderror" value="{{ $room->rompers }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="first5">İlk 5 Top</label>
                            <input id="first5" name="first5" type="text" class="form-control @error('first5') is-invalid @enderror" value="{{ $room->first5 }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="first10">İlk 10 Top</label>
                            <input id="first10" name="first10" type="text" class="form-control @error('first10') is-invalid @enderror" value="{{ $room->first10 }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary">Odayı Güncelle</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
