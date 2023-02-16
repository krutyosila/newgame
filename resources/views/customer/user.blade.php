@extends('layouts.app')
@section('content')
    <div class="layout">
        <h6 class="layout-title d-flex align-items-center mb-0">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                 fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                <line x1="8" y1="6" x2="21" y2="6"></line>
                <line x1="8" y1="12" x2="21" y2="12"></line>
                <line x1="8" y1="18" x2="21" y2="18"></line>
                <line x1="3" y1="6" x2="3.01" y2="6"></line>
                <line x1="3" y1="12" x2="3.01" y2="12"></line>
                <line x1="3" y1="18" x2="3.01" y2="18"></line>
            </svg>
            Müşteri - <span class="text-success">{{ $user->username }}</span>
            @if($user->bayonet)
                - <small class="text-muted">süngücü</small>
            @endif
        </h6>
        <div class="layout-content p-0">
            <table class="table bg-transparent mb-0">
                <tbody>
                @if(!$user->bayonet)
                    <tr>
                        <td colspan="2" class="px-4">
                            <div class="d-flex align-items-center">
                                <div class="btn-group btn-group-sm ml-auto">
                                    <button class="btn btn-success balance-modal"
                                            data-user="{{ $user->id }}"
                                            data-type="deposit">+
                                    </button>
                                    <button class="btn btn-danger balance-modal"
                                            data-balance="{{ $user->balance }}"
                                            data-user="{{ $user->id }}"
                                            data-type="withdraw">-
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="px-4">
                        <td class="pl-4">
                            <div class="d-flex align-items-center">
                                <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor"
                                     stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg>
                                <span class="ml-2">Müşteri Bakiyesi</span>
                            </div>
                        </td>
                        <td class="pr-4 text-right">
                            <h6 class="mb-0">
                                {{ number_format($user->balance) }}₺
                            </h6>
                        </td>
                    </tr>
                @endif
                <tr>
                    <td class="pl-4">
                        <div class="d-flex align-items-center mb-0">
                            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <line x1="12" y1="19" x2="12" y2="5"></line>
                                <polyline points="5 12 12 5 19 12"></polyline>
                            </svg>
                            <span class="ml-2">Yatırım</span>
                        </div>
                    </td>
                    <td class="pr-4 text-right">
                        <h6 class="mb-0 text-success">
                            {{ $user->transactions()->where('type', 'deposit')->where('subtype', 'wallet.customer')->sum('amount')."₺" }}
                        </h6>
                    </td>
                </tr>
                <tr>
                    <td class="pl-4">
                        <div class="d-flex align-items-center mb-0">
                            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <polyline points="19 12 12 19 5 12"></polyline>
                            </svg>
                            <span class="ml-2">Çekim</span>
                        </div>
                    </td>
                    <td class="pr-4 text-right">
                        <h6 class="mb-0 text-danger">
                            {{ $user->transactions()->where('type', 'withdraw')->where('subtype', 'wallet.customer')->sum('amount')."₺" }}
                        </h6>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="layout">
                <h6 class="layout-title mb-0">
                    Kişisel Bilgiler
                </h6>
                <div class="layout-content p-0">
                    <table class="table bg-transparent mb-0">
                        @if(!$user->bayonet)
                            <tr>
                                <td colspan="2" class="px-4">
                                    <form action="{{ route('back.customer.user.view', ['id' => $user->id]) }}"
                                          method="POST" id="banned-form">
                                        @csrf
                                        @if($user->role == 'banned')
                                            <input type="hidden" name="role" value="customer">
                                            <a href="#" class="text-success"
                                               onclick="event.preventDefault(); document.getElementById('banned-form').submit();">
                                                Hesabı Atif Et
                                            </a>
                                        @else
                                            <input type="hidden" name="role" value="banned">
                                            <a href="#" class="text-danger"
                                               onclick="event.preventDefault(); document.getElementById('banned-form').submit();">
                                                Hesabı Askıya Al
                                            </a>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td class="pl-4">Ad Soyad</td>
                                <td class="text-right pr-4">{{ $user->detail->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="pl-4">Telefon</td>
                                <td class="text-right pr-4">{{ $user->detail->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="pl-4">E-Mail</td>
                                <td class="text-right pr-4">{{ $user->email ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="pl-4">Kayıt Tarihi</td>
                                <td class="text-right pr-4">{{ $user->created_at->format('d.m.Y H:i') }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="2" class="px-4">
                                <form action="{{ route('back.customer.user.view', ['id' => $user->id]) }}"
                                      method="POST">
                                    @csrf
                                    <div class="input-group mb-0">
                                        <input type="text" name="password" id="" autocomplete="false"
                                               placeholder="Yeni Parola"
                                               class="form-control @error('password') is-invalid @enderror">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary">Güncelle</button>
                                        </div>
                                        @error('password')
                                        <div class="col-12">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="layout">
                <div class="layout-content">
                    <div>Favori Kartları:</div>
                    <div>{{ implode(', ', $user->favoriteCards()->pluck('card')->toArray()) }}</div>
                    <div class="pt-3">
                        <form action="{{ route('back.customer.user.view', ['id' => $user->id]) }}"
                              method="POST" id="bayonet-form">
                            @csrf
                            @if($user->bayonet)
                                <input type="hidden" name="bayonet" value="0">
                                <a href="#" class="text-danger"
                                   onclick="event.preventDefault(); document.getElementById('bayonet-form').submit();">
                                    Süngücü İptal
                                </a>
                            @else
                                <input type="hidden" name="bayonet" value="1">
                                <a href="#" class="text-success"
                                   onclick="event.preventDefault(); document.getElementById('bayonet-form').submit();">
                                    Süngücü Yap
                                </a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-8">
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
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('.balance-modal').click(function () {
            $('#balanceModal').modal('show');
            $('input[name=user]').val($(this).data('user'));
            $('input[name=type]').val($(this).data('type'));
            $('input[name=amount]').val($(this).data('balances'));
            switch ($(this).data('type')) {
                case 'deposit':
                    $('.balanceModalButton').addClass('btn-success').removeClass('btn-danger').html('EKLE');
                    break;
                case 'withdraw':
                    $('.balanceModalButton').removeClass('btn-success').addClass('btn-danger').html('ÇIKAR');
                    break;
            }
        });
    </script>
@endpush
@push('html')
    <div class="modal fade" id="balanceModal" tabindex="-1" aria-labelledby="balanceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3 d-flex align-items-center">
                        <span class="w-100" id="balanceModalTitle">Bakiye</span>
                        <a href="javascript:void(0);" data-dismiss="modal" class="text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" data-dismiss="alert" width="16" height="16"
                                 viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 class="feather feather-x close text-white">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </a>
                    </div>
                    <form action="{{ route('back.balance') }}" method="post">
                        @csrf
                        <input type="hidden" name="type" value="">
                        <input type="hidden" name="user" value="">
                        <input type="hidden" name="subtype" value="wallet.customer">
                        <div class="form-group">
                            <input type="text" name="amount" class="form-control">
                        </div>
                        <button class="btn btn-sm balanceModalButton"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush
