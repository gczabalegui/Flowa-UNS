<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Comisión Académica</title>
</head>

<body>
    <div class="hero bg-white-200 h-screen text-center">
        <div class="hero-content flex-col lg:flex-row">
            <div>
                <h1 class="text-5xl font-bold">Login Comisión Académica</h1>
                <form method="POST" action="{{ route('comision.login') }}">
                    @csrf
                    <div class="py-6">
                        <label for="email" class="block">Email:</label>
                        <input type="email" id="email" name="email" class="input input-bordered" required>
                    </div>
                    <div class="py-6">
                        <label for="password" class="block">Password:</label>
                        <input type="password" id="password" name="password" class="input input-bordered" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>