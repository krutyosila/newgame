@extends('layouts.app')
@push('js')
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

        startTime();


    </script>
@endpush
@section('content')
    <style>
        .game .prizes .prize {
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            color: #FFF;
            text-align: left;
        }

        .game .prizes .prize div .ml-auto {
            font-size: 1rem;
        }

        .game .prizes .prize:first-child {
            padding-left: 25px;
        }

        .game .prizes .prize:last-child {
            border-right-width: 0;
            padding-right: 25px;
        }

        .game .sidebar .video {
            height: 240px;
            background: #000;
        }

        .game .sidebar .numbers {
            padding: 3px;
        }

        .game .sidebar .numbers span {
            width: calc((100% / 10) - 6px);
            margin: 3px;
            line-height: 27px;
            border-radius: 50%;
            text-align: center;
            background: rgba(0, 0, 0, 0.25);
        }

        .game .sidebar .numbers span.active {
            background: rgba(0, 0, 0, 0.9);
            color: #FFF;
        }

        .game .sidebar .numbers span.time {
            color: #ffa400;
        }

        .game .sidebar .status {
            padding: 5px 10px;
            background: #d57200;
            line-height: 20px;
        }

        .game .sidebar .status .time {
            padding: 10px;
            border-radius: 7px;
            background: rgba(0, 0, 0, 0.6);
            color: #FFF;
        }

        .game .sidebar .status .text {
            width: 100%;
            color: #FFF;
            text-align: center;
            line-height: 40px;
        }

        .game .sidebar .latest {
            padding: 10px 5px;
        }

        .game .sidebar .latest .first {
            padding: 10px;
        }

        .game .sidebar .latest .first span {
            display: block;
            width: 60px;
            height: 60px;
            line-height: 50px;
            font-size: 2rem;
            color: #000;
            text-align: center;
            border-radius: 50%;
            background: #FFF;
            border: 5px solid #d57200;
            font-weight: bold;

        }

        .game .sidebar .latest .other {
            padding-left: 5px;

        }

        .game .sidebar .latest .other .text {
            padding-bottom: 4px;
            font-size: 12px;
        }

        .game .sidebar .latest .other .balls {
            width: 188px;
            padding: 4px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 16px;
        }

        .game .sidebar .latest .other .balls span {
            margin: 2px;
            width: 32px;
            height: 32px;
            line-height: 28px;
            border: 2px solid #d57200;
            border-radius: 50%;
            background: #FFF;
            color: #000;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
        }

        .game .content .content-area {
            background: #FFF;
            min-height: 100%;
            padding: 10px;
        }

        .game .content .card-item {
            margin-top: 10px;
        }

        .card-item {
            background: #111;
        }

        .card-item .title {
            font-size: .8rem;
            padding: 4px 14px;
            color: #FFF;
            background: rgba(0, 0, 0, 0.1);
        }

        .card-item .plate {
            padding: 2px;
            overflow: hidden;
        }

        .card-item .plate span {
            margin: 2px;
            width: calc((100% / 9) - 4px);
            text-align: center;
            line-height: 24px;
            background-color: rgba(255, 255, 255, 1);
            color: #111;
            font-size: 12px;
            font-weight: bold;
        }

        .card-item .plate span.null {
            background-color: rgba(1, 1, 1, 0.2);
        }

        .bg-kirmizi {
            background-color: #d5141b
        }

        .bg-mavi {
            background-color: #194f90
        }

        .bg-mor {
            background-color: #8d219e
        }

        .bg-turuncu {
            background-color: #d89706
        }

        .bg-yesil {
            background-color: #406d15
        }


        .bg-pembe {
            background-color: #e64784
        }

        .bg-turkuaz {
            background-color: #248dc1
        }

        .bg-sari {
            background-color: #b0a100
        }

        .card-item .title .is-winner {
            width: 18px;
            height: 18px;
            background-color: #006e25;
            background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNDhweCIgaGVpZ2h0PSI0OHB4IiB2aWV3Qm94PSIyMzIgMjMyIDQ4IDQ4IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDIzMiAyMzIgNDggNDgiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGZpbGw9IiNGRkZGRkYiIGQ9Ik0yNzkuMjk3LDIzOS4wNzdjLTAuOTM4LTAuOTM4LTIuNDU3LTAuOTM4LTMuMzk1LDBsLTI4Ljc1MywyOC43NTRsLTExLjA1My0xMS4wNTMNCgkJCWMtMC45MzctMC45MzctMi40NTctMC45MzctMy4zOTQsMGMtMC45MzcsMC45MzgtMC45MzcsMi40NTcsMCwzLjM5NWwxMi43NSwxMi43NDljMC45MzcsMC45MzgsMi40NTgsMC45MzcsMy4zOTQsMGwzMC40NTEtMzAuNDUxDQoJCQlDMjgwLjIzNCwyNDEuNTM0LDI4MC4yMzQsMjQwLjAxNSwyNzkuMjk3LDIzOS4wNzd6Ii8+DQoJPC9nPg0KPC9nPg0KPC9zdmc+DQo=);
            background-position: center;
            background-repeat: no-repeat;
            background-size: 10px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .card-item .title .fav {
            margin-left: 10px
        }

        .card-item .title .fav.fav-button:after {
            content: "☆"
        }

        .card-item .title .fav.unfav-button:after {
            content: "★"
        }

        .card-item {
            position: relative;
        }

        .card-item .buy {
            display: none;
        }

        .card-item .state {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            text-align: center;
            color: #FFF;
            display: none;
        }

        .card-item .state span {
            z-index: 1;
            color: #FFF;
            display: inline-block;
            line-height: 30px;
            padding: 0 10px;
            border-radius: 4px;
            position: relative;
            top: calc(50% - 15px);
            font-size: 1.2rem;
        }

        .card-item .state.load, .card-item .state.sold {
            display: block;
        }

        .card-item:hover .state.buy {
            display: block;
        }

        .card-item .state.load span {
            background-color: #999;
            font-weight: bold;
        }

        .card-item .state.sold span {
            background-color: #C00;
            font-weight: bold;
        }

        .card-item .state.buy span {
            font-weight: bold;
            cursor: pointer;
        }
    </style>
    <div class="game">
        <div class="layout play">
            <div class="layout-title d-flex align-items-center">
                <div>
                    <h3 class="mb-0">{{ $room->price."₺" }}</h3>
                    <div>SEANS: <b class="text-warning">#111</b></div>
                </div>
                <h6 class="ml-auto mb-0">
                    Kartlarım <b class="badge badge-success">0</b>
                </h6>
            </div>
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
                        Bu odada minimum 3 kart alınmadığı durumlarda rastgele kart verilir ve ücreti bakiyenizden düşülür.
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
