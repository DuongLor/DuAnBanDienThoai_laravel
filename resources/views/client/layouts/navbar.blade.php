  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container px-4 px-lg-5">
          <a class="navbar-brand" href="#!">DienThoaiDiDong</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                  class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                  <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Trang chủ</a></li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">Danh mục</a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          @foreach ($categories as $category)
                              <li><a class="dropdown-item" href="#!">{{ $category->name }}</a></li>
                          @endforeach
                      </ul>
                  </li>
                  <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Đăng ký</a></li>
                  <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Đăng nhập</a></li>
              </ul>
              <form class="d-flex">
                  <button class="btn btn-outline-dark" type="submit">
                      <i class="bi-cart-fill me-1"></i>
                      Giỏ hàng
                      <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                  </button>
              </form>
          </div>
      </div>
  </nav>
