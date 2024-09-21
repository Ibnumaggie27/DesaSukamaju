@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-12">
            <div class="bg-white p-4 mb-3 rounded-lg flex justify-between items-center">
        <div class="">
            <h1 class="text-lg lg:text-2xl headDash font-bold mb-2">Berita &amp; Pengumuman</h1>
            <p class="text-sm lg:text-base font-normal text-secondary">Data dari setiap berita dan pengumuman desa</p>
        </div>
    </div>
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form action="{{ route('cms.berita.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Berita</label>
                            <input type="text" name="judul" value="{{ old('judul') }}" class="form-control"
                                id="judul" placeholder="Masukkan Judul Berita">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Thumbnail</label>
                            <input type="file" name="gambar" class="form-control" id="gambar"
                                placeholder="Masukkan Thumnail Berita">
                        </div>
                        <div class="mb-3">
                            <label for="tipe" class="form-label">Jenis Berita</label>
                            <select class="form-control" id="tipe" name="tipe">
                                <option value="">Masukkan Jenis Berita</option>
                                <option value="Berita" selected>Berita</option>
                                <option value="Pengumuman">Pengumuman</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editor" class="form-label">Deskripsi Berita</label>
                            <textarea name="deskripsi" id="editor" rows="10">
                                {{ old('deskripsi') }}
                            </textarea>
                        </div>
                        <div class="mt-5 mb-3">
                           <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('addon-style')
    <style>
        .ck-editor__editable {
            min-height: 350px !important;
        }
    </style>
@endpush

@push('addon-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    {{-- <script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script> --}}

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {

                ckfinder: {
                    uploadUrl: '{{ route('cms.ckeditor.upload') . '?_token=' . csrf_token() }}'
                },

                // make add custom css in table
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells',
                        'tableProperties',
                        'tableCellProperties'
                    ]
                },
            })
            .then((result) => {
                console.log(result);
            }).catch((err) => {
                console.log(err);
            });
    </script>
@endpush
