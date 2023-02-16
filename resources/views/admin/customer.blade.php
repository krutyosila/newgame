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
            Bayi - <span class="text-success">{{ $customer->username }}</span>
        </h6>
        <div class="layout-content p-0">
            <table class="table bg-transparent mb-0">
                <tbody>
                <tr>
                    <td colspan="2" class="px-4">
                        <div class="d-flex align-items-center">
                            <form action="{{ route('back.admin.customer.view', ['id' => $customer->id]) }}"
                                  method="POST" id="limitless-form">
                                @csrf
                                @if(!$customer->limitless)
                                    <input type="hidden" name="limitless" value="1">
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn btn-dark"
                                           onclick="event.preventDefault(); document.getElementById('limitless-form').submit();">
                                            LİMİTSİZ YAP
                                        </a>
                                    </div>
                                @else
                                    <input type="hidden" name="limitless" value="0">
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn btn-secondary"
                                           onclick="event.preventDefault(); document.getElementById('limitless-form').submit();">
                                            LİMİTLİ YAP
                                        </a>
                                    </div>
                                @endif

                            </form>
                            @if(!$customer->limitless)
                                <div class="btn-group btn-group-sm ml-auto">
                                    <button class="btn btn-success balance-modal"
                                            data-user="{{ $customer->id }}"
                                            data-type="deposit">+
                                    </button>
                                    <button class="btn btn-danger balance-modal"
                                            data-balance="{{ $customer->balance }}"
                                            data-user="{{ $customer->id }}"
                                            data-type="withdraw">-
                                    </button>
                                </div>
                            @endif
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
                            <span class="ml-2">Bayi Bakiyesi</span>
                        </div>
                    </td>
                    <td class="pr-4 text-right">
                        <h6 class="mb-0">
                            @if($customer->limitless)
                                <span class="text-danger">Limitsiz</span>
                            @else
                                {{ number_format($customer->balance) }}₺
                            @endif
                        </h6>
                    </td>
                </tr>
                <tr>
                    <td class="pl-4">
                        <div class="d-flex align-items-center mb-0">
                            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor"
                                 stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="ml-2">Müşteri Sayısı</span>
                        </div>
                    </td>
                    <td class="pr-4 text-right">
                        <h6 class="mb-0">
                            {{ $customer->users->count() }}
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
                        <tr>
                            <td colspan="2" class="px-4">
                                <form action="{{ route('back.admin.customer.view', ['id' => $customer->id]) }}"
                                      method="POST" id="banned-form">
                                    @csrf
                                    @if($customer->role == 'banned')
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
                            <td class="text-right pr-4">{{ $customer->detail->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="pl-4">Telefon</td>
                            <td class="text-right pr-4">{{ $customer->detail->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="pl-4">E-Mail</td>
                            <td class="text-right pr-4">{{ $customer->email ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="pl-4">Kayıt Tarihi</td>
                            <td class="text-right pr-4">{{ $customer->created_at->format('d.m.Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="px-4">
                                <form action="{{ route('back.admin.customer.view', ['id' => $customer->id]) }}"
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
            $('input[name=amount]').val($(this).data('balance'));
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
                        <input type="hidden" name="subtype" value="wallet.admin">
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
