@if(session('success_msg'))
    <div class="alert alert-arrow-left alert-icon-left alert-light-success mt-4 mb-4" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" data-dismiss="alert" width="24" height="24" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-x close">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
             stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
        {{session('success_msg')}}
    </div>
@endif
@if(session('error_msg'))
    <div class="alert alert-arrow-left alert-icon-left alert-light-danger mt-4 mb-4" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" data-dismiss="alert" width="24" height="24" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-x close">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
             stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
        {{session('error_msg')}}
    </div>
@endif
