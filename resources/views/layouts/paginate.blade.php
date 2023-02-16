@if($paginator->hasPages())
    <div class="paginating-container pagination-solid px-4 py-3">
        <ul class="pagination">
            @if($paginator->onFirstPage())
                <li class="prev">
                    <a href="javascript:void(0);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </a>
                </li>
            @else
                <li class="prev">
                    <a href="{{$paginator->previousPageUrl()}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </a>
                </li>
            @endif
            @isset($elements)
                @foreach($elements as $element)
                    @if(is_string($element))
                        <li class="active"><a href="javascript:void(0);">{{$element}}</a></li>
                    @endif
                    @if(is_array($element))
                        @foreach($element as $page => $url)
                            @if($page == $paginator->currentPage())
                                <li class="active"><a href="javascript:void(0);">{{$page}}</a></li>
                            @else
                                <li><a href="{{$url}}">{{$page}}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endisset
            @if($paginator->hasMorePages())
                <li class="next">
                    <a href="{{$paginator->nextPageUrl()}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                </li>
            @else
                <li class="next">
                    <a href="javascript:void(0);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif
