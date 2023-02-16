@extends('layouts.app')
@section('content')
    <div class="layout">
        <h6 class="mb-0 layout-title d-flex align-items-center">
            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none"
                 stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                <rect x="3" y="3" width="7" height="7"></rect>
                <rect x="14" y="3" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect>
                <rect x="3" y="14" width="7" height="7"></rect>
            </svg>
            Oyun Odaları
        </h6>

        <div class="d-none layout-content p-0">
            <div id="pricingWrapper" class="row">
                @foreach($rooms as $room)
                    <div class="col-md-6 col-lg-4">
                        <div class="card stacked mt-5">
                            <div class="card-header pt-0">
                                <span class="card-price">{{ $room->price }}</span>
                                <h3 class="card-title mt-3 mb-1">Minimum - {{ $room->minimum }}</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-minimal mb-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>1.Çinko</span><span class="ml-0">{{ $room->c1 }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>2.Çinko</span><span class="ml-0">{{ $room->c1 }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>Tombala</span><span class="ml-0">{{ $room->c1 }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>Tulum</span><span class="ml-0">{{ $room->c1 }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>İlk 5</span><span class="ml-0">{{ $room->c1 }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>İlk 10</span><span class="ml-0">{{ $room->c1 }}</span>
                                    </li>
                                </ul>
                                <a href="" class="btn btn-block btn-primary">Buy Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="table-responsive d-none">
                <table class="table table-striped bg-transparent m-0">
                    <thead>
                    <tr>
                        <th class="text-right"></th>
                        <th class="pl-4">Oda/Ödül</th>
                        <th class="text-right">Min</th>
                        <th class="text-right pr-4">İşlem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($rooms->count() > 0)
                        @foreach($rooms as $room)
                            <tr>
                                <td class="pl-4" style="width: 1px">
                                    @if($room->state)
                                        <div class="bg-success rounded p-2"></div>
                                    @else
                                        <div class="bg-danger rounded p-2"></div>
                                    @endif
                                </td>
                                <td class="pl-4">{{ $room->price }}</td>
                                <td class="text-right">{{ $room->minimum }}</td>
                                <td class="text-right pr-4">
                                    <a href="{{ route('back.customer.room.view', ['id' => $room->id]) }}"
                                       class="text-light">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                             stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                             class="css-i6dzq1">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="100" class="table-null">
                                Sonuç bulunamadı.
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row pt-3">
        @foreach($rooms as $room)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="layout-content rounded">
                    <h3 class="d-flex align-items-center">
                        {{ $room->price }}₺
                        <a href="{{ route('back.customer.room.view', ['id' => $room->id]) }}" class="ml-4">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg>
                        </a>
                        <span class="ml-auto bg-{{ $room->state ? 'success' : 'danger' }} p-2 rounded-circle"></span>
                    </h3>
                    <small>minimum {{ $room->minimum }} kart</small>
                    <div class="d-flex align-items-center pt-3">
                        <div style="width: calc(100% / 6)">
                            <div class="small mb-1">1.Çinko</div>
                            <div class="text-white">{{ $room->c1 }}₺</div>
                        </div>
                        <div style="width: calc(100% / 6)">
                            <div class="small mb-1">2.Çinko</div>
                            <div class="text-white">{{ $room->c2 }}₺</div>
                        </div>
                        <div style="width: calc(100% / 6)">
                            <div class="small mb-1">Tombala</div>
                            <div class="text-white">{{ $room->bingo }}₺</div>
                        </div>
                        <div style="width: calc(100% / 6)">
                            <div class="small mb-1">Tulum</div>
                            <div class="text-white">{{ $room->rompers }}₺</div>
                        </div>
                        <div style="width: calc(100% / 6)">
                            <div class="small mb-1">İlk5</div>
                            <div class="text-white">{{ $room->first5 }}₺</div>
                        </div>
                        <div style="width: calc(100% / 6)">
                            <div class="small mb-1">İlk1</div>
                            <div class="text-white">{{ $room->first10 }}₺</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="layout">
        <div class="layout-content">
            <b>Süngüdeki Kartlar :</b>
            --
        </div>
    </div>
@endsection
