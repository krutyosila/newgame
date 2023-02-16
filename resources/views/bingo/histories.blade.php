@extends('layouts.app')
@section('content')
    <style>
        .histories ul.head {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .histories ul.head li {
            margin: 0;
            font-weight: bold;
            padding: 8px 15px;
            font-size: 1rem;
        }

        .histories ul li.prize {
            width: 15%;
            text-align: right;
        }

        .histories ul li.session {
            width: 10%;
        }

        .histories ul li.date {
            width: 100%;
            text-align: right;
        }

        .histories .lists {
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.03);
            border-radius: 8px;
        }

        .histories .lists .item {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .histories .lists .item:last-child {
            border-bottom: 0;
        }

        .histories .lists ul.history {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .histories .lists ul.history li {
            margin: 0;
            font-weight: bold;
            padding: 3px 15px;
            line-height: 30px;
        }

        .histories .lists .numbers {
            padding: 12px;
            border-top: 1px dashed rgba(255, 255, 255, 0.1);
        }

        .histories .lists .numbers span {
            display: inline-block;
            width: 36px;
            line-height: 34px;
            border-radius: 50%;
            text-align: center;
            margin: 3px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            background: rgba(0, 0, 0, 0.1);
            color: rgba(255, 255, 255, .6);
        }

        @media screen and (max-width: 600px) {
            .histories .lists ul.history {
                display: block;
            }

            .histories .lists ul.history li {
                width: 100%;
                text-align: left !important;
                font-weight: 400;
            }
        }
    </style>
    <div class="layout">
        <h5 class="layout-title mb-0 d-flex align-items-center">
            Oyun Geçmişi
        </h5>
        <div class="layout-content">
            <div class="histories">
                <ul class="head d-none d-lg-flex">
                    <li class="session">Seans</li>
                    <li class="prize">1. Çinko</li>
                    <li class="prize">2. Çinko</li>
                    <li class="prize">Tombala</li>
                    <li class="date">Sonlanış</li>
                </ul>
                <div class="lists">
                    @foreach($histories as $history)
                        <div class="item">
                            <ul class="history">
                                <li class="session">
                                    <span class="d-inline-block d-lg-none pr-3">Seans</span>
                                    <b class="text-warning">#{{ $history->id }}</b>
                                </li>
                                <li class="prize">
                                    <span class="d-inline-block d-lg-none pr-3">1.Çinko</span>
                                    <b class="text-white">{{ implode(', ', $history->prizes->c1) }}</b>
                                </li>
                                <li class="prize">
                                    <span class="d-inline-block d-lg-none pr-3">2.Çinko</span>
                                    <b class="text-white">{{ implode(', ', $history->prizes->c2) }}</b>
                                </li>
                                <li class="prize">
                                    <span class="d-inline-block d-lg-none pr-3">Tombala</span>
                                    <b class="text-white">{{ implode(', ', $history->prizes->bingo) }}</b>
                                </li>
                                <li class="date">
                                    {{ $history->created_at->format('d.m.Y H:i') }}
                                </li>
                            </ul>
                            <div class="numbers">
                                @foreach($history->numbers as $number)
                                    <span>{{ $number }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
