@if ($paginator->hasPages())
<ul class="pagination mb-0">

    {{-- Tombol Previous --}}
@if ($paginator->onFirstPage())
    <li class="page-item disabled">
        <a class="page-link" href="#">&laquo;</a>  {{-- ganti span → a --}}
    </li>
@else
    <li class="page-item">
        <a class="page-link" href="{{ $paginator->previousPageUrl() }}">&laquo;</a>
    </li>
@endif

    {{-- Nomor Halaman (sliding window 3 angka) --}}
    @php
        $current = $paginator->currentPage();
        $last    = $paginator->lastPage();
        $start   = max(1, $current - 1);
        $end     = min($last, $start + 2);
        $start   = max(1, $end - 2); // adjust jika di akhir
    @endphp

    @for ($page = $start; $page <= $end; $page++)
        @if ($page == $current)
            <li class="page-item active">
                <span class="page-link">{{ $page }}</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a>
            </li>
        @endif
    @endfor

    {{-- Tombol Next --}}
    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}">&raquo;</a>
        </li>
    @else
        <li class="page-item disabled">
            <span class="page-link">&raquo;</span>
        </li>
    @endif

</ul>
@endif