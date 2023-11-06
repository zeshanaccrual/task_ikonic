@extends('auth.auth-layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row">
               <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header" style="color: blue;">Login Form</div>
                    <div class="card-body">

                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-mail</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required
                                        autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <a class="p-2" href="{{ route('register') }}">Resgistered or Sign-Up</a>
                            </div>
                        </form>

                    </div>
                </div>
              </div>
            </div>
        </div>
    </main>
@endsection
