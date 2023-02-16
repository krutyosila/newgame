@extends('layouts.app')
@section('content')
    <div class="layout">
        <h6 class="mb-0 layout-title d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-briefcase mr-2">
                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
            </svg>
            {{ __('Müşteri Listesi') }}
            <span class="ml-auto text-muted">
                {{ number_format($total) }}₺
            </span>
        </h6>
        <div class="layout-content p-0">
            <div class="table-responsive">
                <table class="table table-highlight-head bg-transparent m-0">
                    <thead>
                    <tr>
                        <th class="border-top-0 pl-4">#</th>
                        <th class="border-top-0 w-50">Bayi</th>
                        <th class="border-top-0 text-right pr-4">Bakiye</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($users->count() > 0)
                        @foreach($users as $user)
                            <tr>
                                <td class="pl-4" style="width: 1px">
                                    @if(Cache::has('user-is-online-' . $user->id))
                                        <div class="bg-success rounded p-2"></div>
                                    @else
                                        <div class="bg-danger rounded p-2"></div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('back.customer.user.view', ['id' => $user->id]) }}">
                                        {{ $user->username }}
                                    </a>
                                    @if($user->bayonet)
                                        - <small class="text-muted">süngücü</small>
                                    @endif
                                </td>
                                <td class="text-right pr-4">
                                    @if($user->limitless)
                                        <span class="text-warning">Limitsiz</span>
                                    @else
                                        <a href="javascript:void(0);" class="mb-0 balance-modal"
                                           data-balance="{{ $user->balance }}"
                                           data-user="{{ $user->id }}"
                                           data-type="withdraw">
                                            {{ number_format($user->balance) }}₺
                                        </a>
                                    @endif
                                </td>
                                <td style="width: 1%">
                                    <ul class="table-controls">
                                        <li>
                                            <a href="javascript:void(0);"
                                               class="balance-modal"
                                               data-user="{{ $user->id }}"
                                               data-type="deposit">
                                                <svg viewBox="0 0 24 24" width="24" height="24"
                                                     stroke="currentColor"
                                                     stroke-width="2" fill="none" stroke-linecap="round"
                                                     stroke-linejoin="round" class="text-success">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="12" y1="8" x2="12" y2="16"></line>
                                                    <line x1="8" y1="12" x2="16" y2="12"></line>
                                                </svg>
                                            </a></li>
                                    </ul>
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
            {{ $users->links('layouts.paginate') }}
        </div>
    </div>
    <div class="layout">
        <h6 class="layout-title d-flex align-items-center mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-plus mr-2">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Müşteri Ekle
        </h6>
        <div class="layout-content">
            <form action="{{ route('back.customer.user.insert') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="username">Müşteri Adı</label>
                            <input type="text" name="username" id="username" autocomplete="false"
                                   class="form-control @error('username') is-invalid @enderror">
                            @error('username')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password">Parola</label>
                            <input type="text" name="password" id="password" autocomplete="false"
                                   class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary btn-lg">Müşteri Ekle</button>
                    </div>
                </div>
            </form>
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
                        <h6 class="w-100 text-white mb-0" id="balanceModalTitle">Bakiye</h6>
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
                        <button class="btn balanceModalButton"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush
