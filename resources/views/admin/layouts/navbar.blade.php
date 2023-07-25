<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item py-1 ">
                    <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
                </li>
                <li class="nav-item py-1 ">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Tìm</button>
            </form>
        </div>
    </div>
</nav>
<div class="container-fluid mt-4">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item py-1 ">
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">
                            <span data-feather="dashboard"></span>
                            Trang điều khiển
                        </a>
                    </li>
                    <li class="nav-item py-1 ">
                        <a class="nav-link" href="{{ route('adminBrand') }}">
                            <span data-feather="file"></span>
                            Hãng
                        </a>
                    </li>
                    <li class="nav-item py-1 ">
                        <a class="nav-link" href="{{ route('adminProduct') }}">
                            <span data-feather="file"></span>
                            Sản phẩm
                        </a>
                    </li>
                    <li class="nav-item py-1 ">
                        <a class="nav-link" href="{{ route('adminColor') }}">
                            <span data-feather="file"></span>
                            Màu sắc
                        </a>
                    </li>
                    <li class="nav-item py-1 ">
                        <a class="nav-link" href="{{ route('adminSlide') }}">
                            <span data-feather="file"></span>
                            Slide
                        </a>
                    </li>
                    <li class="nav-item py-1 ">
                        <a class="nav-link" href="{{ route('adminReview') }}">
                            <span data-feather="file"></span>
                            Đánh giá
                        </a>
                    </li>
                    <li class="nav-item py-1 ">
                        <a class="nav-link" href="{{ route('adminUser') }}">
                            <span data-feather="file"></span>
                            Người dùng
                        </a>
                    </li>
										<li class="nav-item py-1 ">
											<a class="nav-link" href="{{ route('adminOrder') }}">
													<span data-feather="file"></span>
													Đơn hàng
											</a>
									</li>
                </ul>
            </div>
        </nav>
