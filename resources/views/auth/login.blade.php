@extends('layouts.login')

@section('content')
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}" class="form-horizontal">
            @csrf

            <fieldset class="form-group position-relative has-icon-left">
                <input type="email"
                       class="form-control round  @error('email') is-invalid @enderror"
                       id="email" name="email"
                       placeholder="{{ __('mb.E-MailAddress') }}" value="{{ old('email') }}"
                       required autocomplete="email" autofocus>
                <div class="form-control-position">
                    <i class="ft-user"></i>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </fieldset>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="password"
                       class="form-control round  @error('password') is-invalid @enderror"
                       id="password"
                       placeholder="{{ __('mb.password') }}" name="password" required
                       autocomplete="current-password">
                <div class="form-control-position">
                    <i class="ft-lock"></i>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </fieldset>
            <div class="form-group row">
                <div class="col-md-6 col-12 text-center text-sm-right">
                    @if (Route::has('password.request'))
                        <a class="card-link" href="{{ route('password.request') }}">
                            {{ __('mb.ForgotYourPassword?') }}
                        </a>

                    @endif

                </div>
                <div class="col-md-6 col-12 float-sm-left text-center text-sm-right">

                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit"
                        class="btn round btn-block btn-glow btn-login col-12 mr-1 mb-1">
                    {{ __('mb.Login') }}
                </button>
            </div>

        </form>
    </div>
@endsection
