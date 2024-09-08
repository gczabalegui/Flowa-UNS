<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Iniciar Sesión - Flowa</title>
</head>

<body>
    <div class="hero bg-white-200 h-screen flex items-center justify-center">
        <div class="hero-content flex-col lg:flex-row">
            <div class="card w-full max-w-sm bg-base-100 shadow-lg p-6">
                <h2 class="text-3xl font-bold mb-4 text-center">Iniciar Sesión</h2>
                
                @if(session('error'))
                    <div class="alert alert-error mb-4">
                        <div>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success mb-4">
                        <div>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ url('iniciar-sesion') }}">
                    @csrf
                    <div class="form-control mb-4">
                        <label for="email" class="label">
                            <span class="label-text">Correo electrónico:</span>
                        </label>
                        <input type="email" id="email" name="email" class="input input-bordered" required>
                    </div>
                    
                    <div class="form-control mb-4">
                        <label for="password" class="label">
                            <span class="label-text">Contraseña:</span>
                        </label>
                        <input type="password" id="password" name="password" class="input input-bordered" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-full">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
