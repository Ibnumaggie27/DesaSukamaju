@extends('templates/auth')
@section('content')

<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
    <h1 class=" text-xl leading-tight tracking-tight text-dark md:text-2xl text-center">
        Ubah Password
    </h1>
            @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    <form action="{{route('validasi-forgot-password-act')}}" method="POST" class="space-y-4 md:space-y-6 [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm  [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm">
        @csrf
        <input type="hidden" name="token" value="{{$token}}">
        <div>
            <label for="username">Masukan Password Baru</label>
            <input type="text" name="password" id="password" class="@error('password') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Masukan Password Baru">
            @error('password')
            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full bg-danger rounded-lg text-sm px-5 py-2.5 text-center btn-color">
            <p class="font-medium">submit</p>
        </button>
    </form>
</div>
@endsection