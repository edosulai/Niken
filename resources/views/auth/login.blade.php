<x-guest-layout>

    <div class="user-auth blog">

        <div class="main-content">

            <div class="wrapper-site">
                <div class="content-wrapper full-width">
                    <div class="main">
                        <div class="container">
                            <h1 class="text-center title-page">{{ __('Log In') }}</h1>
                            <div class="login-form text-center">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div>
                                        <div class="form-group no-gutters">
                                            <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" placeholder="Email Address..." aria-describedby="emailHelp" :value="old('email')" required />
                                            <x-jet-input-error for="email" />
                                        </div>

                                        <div class="form-group no-gutters show_hide_password">
                                            <x-jet-input class="{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password..." autocomplete="current-password" required />
                                            <i class="icon-eye far fa-eye-slash"></i>
                                            <x-jet-input-error for="password" />
                                        </div>

                                        <div class="form-group">
                                            <div class="pl-0 custom-control custom-checkbox small">
                                                <x-jet-checkbox id="remember_me" name="remember" />
                                                <label class="custom-control-label" for="remember_me">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix mb-3">
                                        <div class="text-center no-gutters">
                                            <input type="hidden" name="submitLogin" value="1">
                                            <button class="btn btn-primary" data-link-action="sign-in" type="submit">{{ __('Sign in') }}</button>
                                        </div>
                                    </div>

                                    <div>
                                        @if (Route::has('password.request'))
                                            <div class="no-gutters text-center mb-1">
                                                <div class="forgot-password">
                                                    <a href="{{ route('password.request') }}">{{ __('Forgot your password ?') }}</a>
                                                </div>
                                            </div>
                                        @endif

                                        @if (Route::has('register'))
                                            <div class="no-gutters text-center">
                                                <div class="forgot-password">
                                                    <a href="{{ route('register') }}">{{ __('Create Account') }}</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-guest-layout>

