<ul class="pagination">
  <!-- Hiển thị nút Previous -->
  @if ($paginator->onFirstPage())
      <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
  @else
      <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
  @endif

  <!-- Hiển thị các trang -->
  @foreach ($elements as $element)
      @if (is_string($element))
          <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
      @endif

      @if (is_array($element))
          @foreach ($element as $page => $url)
              @if ($page == $paginator->currentPage())
                  <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
              @else
                  <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
              @endif
          @endforeach
      @endif
  @endforeach

  <!-- Hiển thị nút Next -->
  @if ($paginator->hasMorePages())
      <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
  @else
      <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
  @endif
</ul>
