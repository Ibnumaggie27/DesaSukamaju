@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Struktur Desa</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6>Atur Struktur Desa</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('cms.struktur-desa.update', $struktur_desa->id) }}" method="post">
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="pegawai" class="form-label">Pegawai</label>
                                <select name="pegawai_id" class="form-control">
                                    <option value="{{ $struktur_desa->id }}">{{ $struktur_desa->nama }}</option>
                                    @foreach ($pegawais_form as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan/Struktur</label>
                                <select name="jabatan_pegawai_id" class="form-control">
                                    <option value="">-- Pilih Jabatan --</option>
                                    @foreach ($jabatans as $item)
                                        <option value="{{ $item->id }}" @selected($struktur_desa->jabatan_pegawai_id)>{{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 form-group form-check">
                                <input type="checkbox" name="is_kepala_jabatan" @checked($struktur_desa->is_kepala_jabatan  )
                                    class="form-check-input" id="ketua">
                                <label class="form-check-label" for="ketua">Kepala Jabatan ?</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
