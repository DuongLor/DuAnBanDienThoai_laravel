@extends('client.layouts.app')
@section('title', 'Đăng Nhập')
@section('css_header_custom')
    <style>
        * {
            box-sizing: border-box;
        }

        .shadow-lg {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
        }

        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15);
        }

        .card-footer {
            padding: var(--bs-card-cap-padding-y) var(--bs-card-cap-padding-x);
            color: var(--bs-card-cap-color);
            background-color: var(--bs-card-cap-bg);
            border-top: var(--bs-card-border-width) solid var(--bs-card-border-color);
        }

        .card-footer:last-child {
            border-radius: 0 0 var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius);
        }

        .card {
            --bs-card-spacer-y: 1.35rem;
            --bs-card-spacer-x: 1.35rem;
            --bs-card-title-spacer-y: 0.5rem;
            --bs-card-border-width: 1px;
            --bs-card-border-color: rgba(33, 40, 50, 0.125);
            --bs-card-border-radius: 0.35rem;
            --bs-card-box-shadow: ;
            --bs-card-inner-border-radius: 0.35rem;
            --bs-card-cap-padding-y: 1rem;
            --bs-card-cap-padding-x: 1.35rem;
            --bs-card-cap-bg: rgba(33, 40, 50, 0.03);
            --bs-card-cap-color: ;
            --bs-card-height: ;
            --bs-card-color: ;
            --bs-card-bg: #fff;
            --bs-card-img-overlay-padding: 1rem;
            --bs-card-group-margin: 0.75rem;
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            height: var(--bs-card-height);
            word-wrap: break-word;
            background-color: var(--bs-card-bg);
            background-clip: border-box;
            border: var(--bs-card-border-width) solid var(--bs-card-border-color);
            border-radius: var(--bs-card-border-radius);
        }

        .card-header {
            padding: var(--bs-card-cap-padding-y) var(--bs-card-cap-padding-x);
            margin-bottom: 0;
            color: var(--bs-card-cap-color);
            background-color: var(--bs-card-cap-bg);
            border-bottom: var(--bs-card-border-width) solid var(--bs-card-border-color);
        }

        label {
            font-size: 0.875rem;
            color: grey;
            font-weight: 500;
        }
    </style>
@endsection
@section('content')

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-xl p-5 pb-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <!-- Basic login form-->
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center">
                                        <h3 class="fw-light my-4">Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Login form-->
                                        <form>
                                            <!-- Form Group (email address)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control" id="inputEmailAddress" type="email"
                                                    placeholder="Enter email address" />
                                            </div>
                                            <!-- Form Group (password)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control" id="inputPassword" type="password"
                                                    placeholder="Enter password" />
                                            </div>
                                            <!-- Form Group (remember password checkbox)-->
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" id="rememberPasswordCheck"
                                                        type="checkbox" value="" />
                                                    <label class="form-check-label" for="rememberPasswordCheck">Remember
                                                        password</label>
                                                </div>
                                            </div>
                                            <!-- Form Group (login box)-->
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="auth-password-basic.html">Forgot Password?</a>
                                                <a class="btn btn-primary" href="dashboard-1.html">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="auth-register-basic.html">Need an account? Sign up!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
@endsection
