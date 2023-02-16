@extends('layouts.app')
@section('content')
    <div class="layout">
        <h6 class="layout-title mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                 stroke-linejoin="round" class="feather feather-dollar-sign mr-2">
                <line x1="12" y1="1" x2="12" y2="23"></line>
                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
            </svg>
            Finansal Hareketler
        </h6>
        <div class="layout-content p-0">
            <div class="table-responsive">
                <table class="table table-striped bg-transparent mb-0">
                    <thead class="pl-4">
                    <tr>
                        <th class="pl-4">Bayi/Kullanıcı</th>
                        <th class="pr-4 text-right">İşlem</th>
                    </tr>
                    </thead>
                    <tbody class="bg-transparent">
                    @if($transactions->count() > 0)
                        @foreach($transactions as $transaction)
                            <tr>
                                <td class="pl-4">
                                    <a href="{{ route('back.customer.user.view', ['id' => $transaction->user->id]) }}">
                                        {{ $transaction->user->username }}
                                    </a>
                                    <div class="text-muted small">
                                        {{ $transaction->user->user->username }}
                                    </div>
                                </td>
                                <td class="pr-4 text-right">
                                    <h5>
                                        @if($transaction->type == 'deposit')
                                            <span class="text-success">{{ number_format($transaction->amount) }}₺</span>
                                        @else
                                            <span class="text-danger">{{ number_format($transaction->amount) }}₺</span>
                                        @endif
                                    </h5>
                                    <div
                                        class="text-muted small">{{ $transaction->created_at->format('d.m.Y H:i') }}</div>
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
            {{ $transactions->links('layouts.paginate') }}
        </div>
    </div>
@endsection
