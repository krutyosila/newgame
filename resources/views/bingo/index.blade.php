@extends('layouts.app')
@push('js')
    @vite('resources/js/app.js')
    <script src="{{ asset('assets/js/bingo/cards.js') }}"></script>
    <script>
        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            h = ((parseInt(h) < 10) ? '0' : '') + h;
            m = ((parseInt(m) < 10) ? '0' : '') + m;
            s = ((parseInt(s) < 10) ? '0' : '') + s;
            document.getElementById('date').innerHTML = h + ":" + m + ":" + s;
            setTimeout(startTime, 1000);
        }

        let pusher = new Pusher('67c0f2c258dc1d4545b6', {
            cluster: 'eu'
        });
        pusher.subscribe('user-8b93218367e80041c557c8f09d3dfc2d')
            .bind('bingo-event', function (data) {

            });


    </script>

@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/game.css') }}">
@endpush
@section('content')
    <div class="loading layout d-flex align-items-center justify-content-center">
        <div class="lds-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="game" style="display: none;">
        <div class="layout">
            <div class="layout-title d-flex align-items-center">
                <div>
                    <h3 class="mb-0">{{ $room->price."₺" }}</h3>
                    <div>SEANS: <b class="text-warning"></b></div>
                </div>
                <h6 class="ml-auto mb-0">
                    Kartlarım <b class="badge badge-success">0</b>
                </h6>
            </div>
        </div>
        <div class="layout">
            <div class="row prizes" style="background: {{ $room->color }}">
                <div class="prize col-4 col-lg-2">
                    <div class="font-weight-bold d-flex align-items-center">
                        1.ÇİNKO -
                        <span class="ml-auto">{{ $room->c1 }}₺</span>
                    </div>
                    <div>-</div>
                </div>
                <div class="prize col-4 col-lg-2">
                    <div class="font-weight-bold d-flex align-items-center">
                        2.ÇİNKO -
                        <span class="ml-auto">{{ $room->c2 }}₺</span>
                    </div>
                    <div>-</div>
                </div>
                <div class="prize col-4 col-lg-2">
                    <div class="font-weight-bold d-flex align-items-center">
                        TOMBALA -
                        <span class="ml-auto">{{ $room->bingo }}₺</span>
                    </div>
                    <div>-</div>
                </div>
                <div class="prize col-4 col-lg-2">
                    <div class="font-weight-bold d-flex align-items-center">
                        TULUM -
                        <span class="ml-auto">{{ $room->rompers }}₺</span>
                    </div>
                    <div>-</div>
                </div>
                <div class="prize col-4 col-lg-2">
                    <div class="font-weight-bold d-flex align-items-center">
                        İLK5 -
                        <span class="ml-auto">{{ $room->first5 }}₺</span>
                    </div>
                    <div>-</div>
                </div>
                <div class="prize col-4 col-lg-2">
                    <div class="font-weight-bold d-flex align-items-center">
                        İLK10 -
                        <span class="ml-auto">{{ $room->first10 }}₺</span>
                    </div>
                    <div>-</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="sidebar">
                    <div class="rounded-10 bg-default overflow-hidden" style="margin-top: 20px;">
                        <div class="video"></div>
                        <div class="status d-flex align-items-center" style="background: {{ $room->color }}">
                            <span class="time">00:00</span>
                            <span class="text">Yeni Seans Başlıyor</span>
                        </div>
                        <div class="latest d-flex align-items-center">
                            <div class="first">
                                <span>15</span>
                            </div>
                            <div class="other d-flex flex-column">
                                <div class="text text-nowrap">ÇEKİLEN TOPLAR 33/90</div>
                                <div class="balls d-flex align-items-center">
                                    <span>3</span>
                                    <span>51</span>
                                    <span>8</span>
                                    <span>10</span>
                                    <span>44</span>
                                </div>
                            </div>
                        </div>
                        <div class="numbers d-flex flex-wrap">
                            @for($i = 1; $i <= 90; ++$i)
                                <span>{{ $i }}</span>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="layout content flex-fill">
                    <div class="p-3 bg-danger text-white small">
                        Bu odada minimum 3 kart alınmadığı durumlarda rastgele kart verilir ve ücreti bakiyenizden
                        düşülür.
                    </div>
                    <div class="content-area">
                        <div class="alert alert-info">
                            <h6>Seans Yükleniyor.</h6>
                            <div>Seans bilgileri yüklenirken lütfen bekleyiniz.</div>
                        </div>
                        <div class="alert alert-warning">
                            <h6>Yeni Seans Yükleniyor.</h6>
                            <div>Kartlar hazırlanıyor. Lütfen bekleyiniz.</div>
                        </div>
                        <div class="alert alert-dark">
                            <h6>Kart Alımı Yapmadınız</h6>
                            <div>Bir sonraki seans kart alımı yapabilirsiniz.</div>
                        </div>

                        <div class="cards">
                            <div class="row">
                                @for($i = 1; $i <= 150; ++$i)
                                    @php
                                        $color = 'turuncu';
                                        if($i > 25) { $color = 'yesil'; }
                                        if($i > 50) { $color = 'mavi'; }
                                        if($i > 75) { $color = 'kirmizi'; }
                                        if($i > 100) { $color = 'sari'; }
                                        if($i > 125) { $color = 'mor'; }
                                    @endphp
                                    <div class="col-6 col-lg-3">
                                        <div class="card-item bg-{{$color}}">
                                            <div class="state buy">


                                                <!--
                                            <span>...</span>
                                            <span>SATILDI</span>
                                            -->
                                                <span style="background-color: {{ $room->color }}">SATIN AL</span>
                                            </div>
                                            <div class="title d-flex align-items-center">
                                                <b>#{{$i}}</b>
                                                <div class="ml-auto d-flex align-items-center">
                                                    <div class="is-winner"></div>
                                                    <div class="fav fav-button">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="plate d-flex flex-wrap">
                                                <span class="null"></span>
                                                <span>13</span>
                                                <span>22</span>
                                                <span class="null"></span>
                                                <span>47</span>
                                                <span class="null"></span>
                                                <span>61</span>
                                                <span class="null"></span>
                                                <span>82</span>


                                                <span>5</span>
                                                <span class="null"></span>
                                                <span>26</span>
                                                <span>35</span>
                                                <span class="null"></span>
                                                <span class="null"></span>
                                                <span>64</span>
                                                <span>77</span>
                                                <span class="null"></span>

                                                <span class="null"></span>
                                                <span>18</span>
                                                <span>29</span>
                                                <span class="null"></span>
                                                <span>48</span>
                                                <span>58</span>
                                                <span class="null"></span>
                                                <span class="null"></span>
                                                <span>90</span>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
