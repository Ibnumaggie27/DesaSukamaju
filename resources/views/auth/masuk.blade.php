@extends('templates/auth')
@section('content')

<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
    <h1 class=" text-xl leading-tight tracking-tight text-dark md:text-2xl text-center">
        <b>Login Akun</b><br>
        Sistem Infomasi Desa
    </h1>
    <form action="/masuk" method="POST" class="space-y-4 md:space-y-6 [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm  [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm">
        @csrf
        <div>
            <label for="username">NIK</label>
            <input type="text" name="username" id="username" class="@error('username') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Masukan NIK">
            @error('username')
            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>
        <div class="relative">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Masukan Password" class="block w-full pr-10 @error('password') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1">
            <button type="button" onclick="togglePasswordVisibility()" class="absolute right-0 transform -translate-y-1/2 px-3 flex items-center bg-transparent focus:outline-none" style="top: 70%;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                </svg>
            </button>
            @error('password')
            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full bg-danger rounded-lg text-sm px-5 py-2.5 text-center btn-color">
            <p class="font-medium">Masuk</p>
        </button>
        <p class="text-sm font-light text-dark text-center mt-2">
            Belum punya akun? <a href="/daftar" class="font-medium" style="color: #4facfe">Daftar</a>
            <br>
            <br>
            Lupa password? <a href="{{ route('forgot-password')}}" class="font-medium" style="color: #4facfe">Reset Password</a>
        </p>
    </form>
</div>
<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>
@endsection