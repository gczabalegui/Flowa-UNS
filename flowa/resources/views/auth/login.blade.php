<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Flowa - UNS </title>
</head>

<body>
    <div class="hero bg-white-200 h-screen text-center">
        <div class="hero-content flex-col lg:flex-row">
            <div class="card w-full max-w-sm shadow-2xl bg-base-100">
                <div class="card-body">
                    <h1 class="text-5xl font-bold">{{ __('Iniciar sesión') }}</h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-control">
                            <label for="legajo" class="label">
                                <span class="label-text">{{ __('Legajo') }}</span>
                            </label>
                            <input id="legajo" type="text" class="input input-bordered @error('legajo') input-error @enderror" name="legajo" value="{{ old('legajo') }}" required autocomplete="legajo" autofocus>
                            @error('legajo')
                                <span class="text-error" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-control mt-4">
                            <label for="password" class="label">
                                <span class="label-text">{{ __('Contraseña') }}</span>
                            </label>
                            <input id="password" type="password" class="input input-bordered @error('password') input-error @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="text-error" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-control mt-6">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Iniciar sesión') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>