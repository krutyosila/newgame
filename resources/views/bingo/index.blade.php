@extends('layouts.app')
@push('js')
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
        .play {
            width: 100%;
        }

        .play .header {
            padding: 10px 20px;
            background: rgba(0, 0, 0, .05);
        }

        .game .prizes {
            width: 100%;
        }

        .game .prizes .prize {
            width: calc(100% / 6);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .game .prizes .prize span {
            color: #FFF;
        }

        .game .prizes .prize:last-child {
            border-right-width: 0;
        }

        .game .sidebar {
            width: 360px;
        }

        .game .sidebar .video {
            width: 360px;
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
            background: rgba(0, 0, 0, 0.15);
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
            background: rgba(0, 0, 0, 0.3);
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

        .game .content {
            margin-left: 20px;
            background: #FFF;

        }
    </style>
    <div class="game">
        <div class="layout play">
            <div class="layout-title d-flex align-items-center">
                <div>
                    <h3 class="mb-0">{{ $room->price."₺" }}</h3>
                    <div>SEANS: <b class="text-warning">#111</b></div>
                </div>
                <div class="ml-auto" id="date">

                </div>
            </div>
            <div class="ml-auto d-flex align-items-center prizes" style="background: {{ $room->color }}">
                <div class="prize">
                    <span class="font-weight-bold">1.ÇİNKO - {{ $room->c1 }}₺</span>
                    <div>-</div>
                </div>
                <div class="prize">
                    <span class="font-weight-bold">2.ÇİNKO - {{ $room->c2 }}₺</span>
                    <div>-</div>
                </div>
                <div class="prize">
                    <span class="font-weight-bold">TOMBALA - {{ $room->bingo }}₺</span>
                    <div>-</div>
                </div>
                <div class="prize d-none d-md-block">
                    <span class="font-weight-bold">TULUM - {{ $room->rompers }}₺</span>
                    <div>-</div>
                </div>
                <div class="prize d-none d-md-block">
                    <span class="font-weight-bold">İLK5 - {{ $room->first5 }}₺</span>
                    <div>-</div>
                </div>
                <div class="prize d-none d-md-block">
                    <span class="font-weight-bold">İLK10 - {{ $room->first10 }}₺</span>
                    <div>-</div>
                </div>
            </div>
        </div>
        <div class="d-flex pa">
            <div class="layout sidebar">
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
            <div class="layout content flex-fill">
            </div>
        </div>
    </div>
@endsection
