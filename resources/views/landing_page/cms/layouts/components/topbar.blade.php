<!-- Topbar -->
<nav class="top-0 w-full fixed inset-x-0 flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg shadow-sm z-3" style="    background-image: linear-gradient(to bottom, #4facfe 0%, #00f2fe 100%);">
    <div class="w-full flex justify-between items-center px-3">
        <span class="text-2xl text-black top-5 cursor-pointer flex items-center">
            <i class="bx bx-menu mr-2" onclick="openSidebar()"></i>
            <a href="{{ route('beranda') }}"><img src="{{ asset('img/desa.png') }}" width="150" alt="Logo!"></a>
        </span>
        <span class="text-black bg-light top-5 items-center rounded-5" style="padding: .50rem; border: 1px solid;">
            <span class="mx-3 font-medium lg:text-base text-sm capitalize">
                {{ auth()->user()->nama }}
            </span>
            <img class=" inline-block h-6 w-6 lg:h-8 lg:w-8 rounded-full themeColor" src="{{ asset('img/user.png') }}" alt="{{ auth()->user()->nama }}">
        </span>
    </div>
</nav>
<!-- End of Topbar -->