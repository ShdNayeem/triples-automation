@extends('layouts.master')

@section('content')
<main class="login-form portfolio inner-page" style="padding-top:100px; margin-top: 100px;">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center text-white" style="background-color: midnightblue;">Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('authenticate') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email"
                                    required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="checkbox col-6">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                                <div class="col-6">

                                    <label>

                                        <a href="{{ route('forget.password.get') }}" type="button" class="btn btn-primary">Forgot Password</a>

                                    </label>
                                    {{-- <a href="{{ route('forget.password.get') }}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#forgotPasswordModal">
                                        Forgot Password?
                                      </a>

                                      <!-- Modal -->
                                      <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="forgotPasswordModalLabel">Reset Password</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span>&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <form>
                                                <div class="form-group">
                                                  <label for="email">Email address</label>
                                                  <input type="email" class="form-control" id="email" placeholder="Enter email">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div> --}}
                                </div>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-info btn-block">Signin</button>
                                <a href="/register" class="btn btn-warning btn-block">Signup</a>

                            </div>
                        </form>
                        <div class='hr-or'></div>

                        <div class="d-grid mx-auto flex items-center justify-end ">
                            <a href="{{ url('google') }}"
                                style="margin-top: 0px !important;background: #C84130;color: #ffffff;padding: 8px;border-radius:6px; width: 100%; text-align: center;">
                                <strong>Login with Google</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
