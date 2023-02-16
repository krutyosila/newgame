@extends('layouts.app')
@section('content')
    <style>
        .game {
            display: flex;
        }

        .side {
            margin-top: 20px;
            width: 320px;
            height: 300px;
            background: #071b38;
        }

        .play {
            width: 100%;
            min-height: calc(100vh - 200px);
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
    </style>
    <div class="game">
        <div class="layout play">
            <div class="layout-title d-flex align-items-center">
                <div>
                    <h3 class="mb-0">{{ $room->price."₺" }}</h3>
                    <div>SEANS: <b class="text-warning">#111</b></div>
                </div>
            </div>
            <div class="ml-auto d-flex align-items-center prizes" style="background: {{ $room->color }}">
                <div class="prize">
                    <span class="font-weight-bold">1.ÇİNKO</span>
                    <div>-</div>
                </div>
                <div class="prize">
                    <span class="font-weight-bold">2.ÇİNKO</span>
                    <div>-</div>
                </div>
                <div class="prize">
                    <span class="font-weight-bold">TOMBALA</span>
                    <div>-</div>
                </div>
                <div class="prize d-none d-md-block">
                    <span class="font-weight-bold">TULUM</span>
                    <div>-</div>
                </div>
                <div class="prize d-none d-md-block">
                    <span class="font-weight-bold">İLK5</span>
                    <div>-</div>
                </div>
                <div class="prize d-none d-md-block">
                    <span class="font-weight-bold">İLK10</span>
                    <div>-</div>
                </div>
            </div>
            <div class="layout-content">

            </div>

        </div>
    </div>
@endsection
