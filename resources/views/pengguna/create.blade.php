@extends('templates/dashboard')
@section('content')
<div class="layoutWelcome bg-white p-4 mb-5 rounded-lg flex justify-between items-center">
    <div class="p-2">
        <h1 class="text-lg lg:text-2xl headDash font-bold mb-2">{{ $title }}</h1>
        <p class="text-xs lg:text-sm font-normal text-secondary">Total <span class="lowercase">{{ $title }}</span> yang
            terdaftar</p>
    </div>
</div>
<div class="bg-white py-6 px-9 mb-5 rounded-lg [&>input]:border-gray [&>input]:bg-white [&>select]:border-gray [&>select]:bg-white">
    <form action="/pengguna" method="POST" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    ">
        @csrf
        <div class="block mb-6">
            <label class="after:content-['*'] after:ml-0.5 after:text-danger">Username</label>
            <input type="text" name="username" class="mt-1 px-3 py-2 @error('username') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="user.name" value="{{ old('username') }}"/>
            @error('username')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>

        <div class="block mb-6">
            <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama</label>
            <input type="text" name="nama" class="mt-1 px-3 py-2 @error('nama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="John Doe" value="{{ old('nama') }}"/>
            @error('nama')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>

        <div class="block mb-6">
            <label class="after:content-['*'] after:ml-0.5 after:text-danger">Telepon</label>
            <input type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}"/>
            @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>

        <div class="block mb-6">
            <label class="after:content-['*'] after:ml-0.5 after:text-danger">Password</label>
            <input type="password" name="password" class="mt-1 px-3 py-2 @error('password') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="••••••" />
            @error('password')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-full mb-6">
            <label class="tracking-wide after:content-['*'] after:ml-0.5 after:text-danger mb-1" for="grid-state">Role</label>
            <div class="relative">
                <select class="appearance-none px-3 py-2 @error('level') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" id="grid-state" name="level">
                    <option value="petugas">Petugas</option>
                    <option value="admin">Admin</option>
                    <option value="kesra">kesra</option>
                    <option value="pemerintahan">pemerintahan</option>
                    <option value="pelayanan">pelayanan</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <i class='bx bx-chevron-down text-xl'></i>
                </div>
            </div>
            @error('level')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
@endsection
