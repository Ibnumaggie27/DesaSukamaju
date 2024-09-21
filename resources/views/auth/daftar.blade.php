@extends('templates/auth')
@section('content')

<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
    <h1 class=" text-xl leading-tight tracking-tight text-dark md:text-2xl text-center">
        <b>Daftar Akun</b> <br> Sistem Informasi Desa
    </h1>
    <form action="/daftar" method="POST" class="space-y-4 md:space-y-6 [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm">
        @csrf
        <div>
            <label for="username">NIK</label>
            <input type="text" name="username" id="username" class="@error('username') border-danger @else border-gray  @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Masukan NIK" value="{{ old('username') }}">
            @error('username')
            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="@error('nama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Anda" value="{{ old('nama') }}">
            @error('nama')
            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="nama">Email</label>
            <input type="text" name="email" id="email" class="@error('email') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Email Anda" value="{{ old('email') }}">
            @error('email')
            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" id="telepon" class="@error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="08*********" value="{{ old('telepon') }}">
            @error('telepon')
            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>
        <!--<div>-->
        <!--    <label for="konfirmasi">Password</label>-->
        <!--    <input type="password" name="konfirmasi" id="konfirmasi" class="@error('konfirmasi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Masukan Password" value="">-->
        <!--    @error('konfirmasi')-->
        <!--    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>-->
        <!--    @enderror-->
        <!--</div>-->

        <div class="relative">
                    <label for="konfirmasi">Password</label>
                    <input type="password" name="konfirmasi" id="konfirmasi" placeholder="Masukan Password" class="block w-full pr-10 @error('konfirmasi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" onkeyup="checkPasswordMatch()">
                    <button type="button" onclick="togglePasswordVisibility1()" class="absolute right-0 transform -translate-y-1/2 px-3 flex items-center bg-transparent focus:outline-none" style="top: 70%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                        </svg>
                    </button>
                    @error('konfirmasi')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

        <div class="relative">
            <label for="password">Konfirmasi Password</label>
            <input type="password" name="password" id="password" placeholder="Masukan Konfirmasi Password" class="block w-full pr-10 @error('password') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" onkeyup="checkPasswordMatch()">
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

        <!-- Error Message for Password Mismatch -->
        <p id="passwordMismatchError" class="mt-1 text-xs text-danger"></p>



        <button type="submit" class="w-full text-black themeColor font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar</button>
        <p class="text-sm font-light text-dark text-center">
            Sudah punya akun? <a href="/masuk" class="font-medium" style="color: #4facfe;">Masuk</a>
        </p>
    </form>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
        
                function togglePasswordVisibility1() {
            var konfirmasiInput = document.getElementById("konfirmasi");
            if (konfirmasiInput.type === "password") {
                konfirmasiInput.type = "text";
            } else {
                konfirmasiInput.type = "password";
            }
        }


        function checkPasswordMatch() {
            var password = document.getElementById("password").value;
            var konfirmasi = document.getElementById("konfirmasi").value;

            var errorElement = document.getElementById("passwordMismatchError");

            if (password !== konfirmasi) {
                errorElement.innerText = "Password dan Konfirmasi Password tidak sama";
            } else {
                errorElement.innerText = ""; // Clear error message if passwords match
            }
        }
    </script>

</div>

@endsection