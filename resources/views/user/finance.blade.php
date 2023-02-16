@extends('layouts.app')
@section('content')
    <div class="layout">
        <div class="layout-content bg-gradient-dark">
            <h5>Yatırım İşlemleri</h5>
            <div>
                Bir şube kullanıcısı <span class="text-danger">{{ auth()->user()->username }}</span> olarak oynuyorsunuz.
                Bakiye işlemleriniz için lütfen şube yetkilisi ile irtibata geçin.
            </div>
        </div>
    </div>
    <div class="layout">
        <h6 class="layout-title mb-0">
            Yatırım / Çekim
        </h6>
        <div class="layout-content p-0">
            <div class="table-responsive">
                <table class="table bg-transparent mb-0">
                    @if($transactions->count() > 0)
                        @foreach($transactions as $transaction)
                            <tr>
                                <td class="pl-4 text-{{ $transaction->type == 'deposit' ? 'success' : 'danger' }}"
                                    style="width: 1%">
                                    @if($transaction->type == 'deposit')
                                        <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor"
                                             stroke-width="2"
                                             fill="none" stroke-linecap="round" stroke-linejoin="round"
                                             class="css-i6dzq1">
                                            <line x1="12" y1="19" x2="12" y2="5"></line>
                                            <polyline points="5 12 12 5 19 12"></polyline>
                                        </svg>
                                    @else
                                        <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor"
                                             stroke-width="2"
                                             fill="none" stroke-linecap="round" stroke-linejoin="round"
                                             class="css-i6dzq1">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <polyline points="19 12 12 19 5 12"></polyline>
                                        </svg>
                                    @endif
                                </td>
                                <td>
                                    {{ $transaction->created_at->format('d.m.Y H:i') }}
                                </td>
                                <td class="text-right pr-4">
                                    <h6 class="m-0 text-{{ $transaction->type == 'deposit' ? 'success' : 'danger' }}">
                                        {{ number_format($transaction->amount) }}₺
                                    </h6>
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
                </table>
            </div>
            {{ $transactions->links('layouts.paginate') }}
        </div>
    </div>
@endsection
