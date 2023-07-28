<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>HTML Login Page with Bootstrap Example</title>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Muli'><link rel="stylesheet" href="adminlayout/css/style.css">

</head>
<body>


<!-- partial:index.partial.html -->
<div class="pt-5">
<h1 class="text-center">Login</h1>

<div class="container">
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <div class="card card-body">
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group required">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="form-control text-lowercase" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>                    
                                <div class="form-group required">

                                    <x-input-label for="password" :value="__('Password')" />

                                    <x-text-input id="password" class="d-flex flex-row align-items-center"
                                                                type="password"
                                                                name="password" class="form-control"
                                                                required autocomplete="current-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        
                                        {{-- @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif --}}
                                </div>
                                <div class="form-group mt-4 mb-4">
                                    <label for="remember_me" class="custom-control custom-checkbox">                                                                  
                                        <input id="remember_me" type="checkbox" class="custom-control-input" name="remember">
                                        <span class="custom-control-label">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                                <div class="form-group pt-1">
                                    <x-primary-button class="btn btn-primary btn-block">
                                        {{ __('Log in') }}
                                    </x-primary-button>
                                </div>
                            </form>
                            <p class="small-xl pt-3 text-center">
                                <span class="text-muted">Not a member?</span>
                                <a href="/signup">Sign up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
</div>
</body>
</html>
