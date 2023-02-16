@extends('layouts.app')
@section('content')

        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="layout">
                    <div class="layout-content">
                        <h5 class="mb-3 d-flex align-items-center">
                            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round" class="text-warning mr-2">
                                <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                                <line x1="6" y1="1" x2="6" y2="4"></line>
                                <line x1="10" y1="1" x2="10" y2="4"></line>
                                <line x1="14" y1="1" x2="14" y2="4"></line>
                            </svg>
                            {{ $user->username }}
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#profileModal"
                               class="ml-auto">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                </svg>
                            </a>
                        </h5>
                        <div class="d-flex align-items-center pt-3">
                            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor"
                                 stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                 class="text-muted mr-2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            {{ $user->detail->name ?? '-' }}
                        </div>
                        <div class="d-flex align-items-center pt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round"
                                 class="text-muted mr-2">
                                <path
                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            {{ $user->email ?? '-' }}
                        </div>
                        <div class="d-flex align-items-center pt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round"
                                 class="text-muted mr-2">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            {{ $user->detail->phone ?? '-' }}
                        </div>
                        <div class="d-flex align-items-center pt-3">
                            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round" class="text-muted mr-2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            {{ $user->created_at->format('d-m-Y') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-8">
                <div class="education" style="margin-top: 20px;">
                    <div class="widget-content widget-content-area">
                        <h5 class="mb-3 d-flex align-items-center">
                            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-warning">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            Son Girişler
                        </h5>
                        <div class="timeline-alter">
                            @foreach($authentications as $authentication)
                                <div class="item-timeline">
                                    <div class="t-meta-date">
                                        <p class="">{{ $authentication->created_at->format('d.m.Y H:i') }}</p>
                                    </div>
                                    <div class="t-dot">
                                    </div>
                                    <div class="t-text">
                                        <p>{{ $authentication->ip_address }}</p>
                                        <p>{{ UA::parse($authentication->user_agent)->toString() }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('css')
    <link href="{{ asset('assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@push('html')
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="mb-4">Kişisel Bilgiler</h5>
                    <form action="{{ route('profile') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-user mr-2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span>Ad Soyad</span>
                            </label>
                            <input type="text" name="detail[name]" id="name"
                                   class="form-control @error('detail.name') is-invalid @enderror"
                                   autocomplete="false" value="{{ $user->detail->name ?? '' }}">
                            @error('detail.name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-mail mr-2">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <span>E-mail</span>
                            </label>
                            <input type="email" name="email" id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   autocomplete="false" value="{{ $user->email ?? '' }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone" class="d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-phone mr-2">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                                <span>Telefon</span>
                            </label>
                            <input type="text" name="detail[phone]" id="phone" placeholder="5** *** ** **"
                                   class="form-control @error('detail.phone') is-invalid @enderror"
                                   autocomplete="false" value="{{ $user->detail->phone ?? '' }}">
                            @error('detail.phone')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush
@push('js')

    <script src="{{ asset('assets/plugins/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/input-mask/input-mask.js') }}"></script>
    <script>
        $("#phone").inputmask({mask: "999 999 9999"});
    </script>
@endpush
