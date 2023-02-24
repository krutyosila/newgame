@extends('layouts.null')
@push('js')
    <script>
        document.getElementById('username').addEventListener('keydown', (e) => {
            e.preventDefault();
            alert(e.key);
            console.log(e.key);
        });
        console.log('asdasd');
    </script>
@endpush
@section('content')
    <div class="layout">
        <h6 class="mb-0 layout-title d-flex align-items-center">
            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none"
                 stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                <polyline points="10 17 15 12 10 7"></polyline>
                <line x1="15" y1="12" x2="3" y2="12"></line>
            </svg>
            {{ __('Giriş') }}
        </h6>
        <div class="layout-content">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Kullanıcı Adı</label>
                            <input type="text" name="username" id="username" autocomplete="false"
                                   class="form-control @error('username') is-invalid @enderror">
                            @error('username')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Parola</label>
                            <input type="password" name="password" id="password"
                                   class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg">Giriş Yapınız</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
