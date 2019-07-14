@extends('layouts.login')

@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
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
            <div class="form-group row">
                <div class="col-md-6 col-12 text-center text-sm-right">
                    <a class="card-link" href="{{ route('login') }}">
                        {{ __('mb.Login') }}
                    </a>

                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn round btn-block btn-glow btn-login col-12 mr-1 mb-1">
                    {{ __('mb.Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
@endsection
