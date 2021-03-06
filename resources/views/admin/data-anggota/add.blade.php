@extends('admin.template')
@section('title', 'Tambah Anggota')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Anggota</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i></button>
                {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                        class="fa fa-remove"></i></button> --}}
            </div>
        </div>
        <!-- /.box-header -->
        <form class="w-full p-10" action="{{ route('anggotas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" required autofocus value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                            @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" required autofocus value="{{ old('username') }}"
                                class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                            @error('username')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" required autofocus value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                            @error('email')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" required
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            @error('password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" required value="{{ old('jabatan') }}"
                                class="form-control @error('jabatan') is-invalid @enderror" placeholder="Jabatan">
                            @error('jabatan')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pangkat</label>
                            <input type="text" name="pangkat" required value="{{ old('pangkat') }}"
                                class="form-control @error('pangkat') is-invalid @enderror" placeholder="Pangkat">
                            @error('pangkat')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nrp</label>
                            <input type="number" name="nrp" value="{{ old('nrp') }}" class="form-control @error('nrp') is-invalid @enderror"
                                placeholder="Nrp">
                            @error('nrp')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Desa</label>
                            <input type="text" name="desa" required value="{{ old('desa') }}"
                                class="form-control @error('desa') is-invalid @enderror"
                                placeholder="Desa">
                            @error('desa')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <p style="font-weight: bold">Foto</p>
                            <div>
                                <img class="img-preview" src="" width="100px">
                            </div>
                            <input type="file" id="image"name="foto" required
                                class="form-control @error('foto') is-invalid @enderror">
                            @error('foto')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right" style="margin-left: 10px">Tambah</button>
                    <a href="/anggotas" class="btn btn-default pull-right">Batal</a>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
