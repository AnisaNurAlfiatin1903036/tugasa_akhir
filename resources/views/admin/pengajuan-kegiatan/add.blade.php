@extends('admin.template')

@section('title', 'Pengajuan Kegiatan')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah @yield('title')</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i></button>
                {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                        class="fa fa-remove"></i></button> --}}
            </div>
        </div>
        <!-- /.box-header -->
        <form class="w-full p-10" action="{{ route('pengajuan-kegiatans.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Nama Anggota</label>
                            <input type="text" name="tanggal" id="tanggal" class="form-control datepicker border px-3 @error('tanggal') is-invalid @enderror"
                                    placeholder="Nama Anggota" autocomplete="off">
                            @error('tanggal')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Tanggal Kegiatan</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control datepicker border px-3 @error('tanggal') is-invalid @enderror"
                                    placeholder="Tanggal Kegiatan">
                            @error('tanggal')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kegiatan</label>
                            <input type="text" name="kegiatan" required autofocus value="{{ old('kegiatan') }}"
                                class="form-control @error('kegiatan') is-invalid @enderror" placeholder="Kegiatan">
                            @error('kegiatan')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Kegiatan</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" required rows="3" placeholder="Deskripsi Kegiatan"></textarea>
                            @error('deskripsi')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p style="font-weight: bold">Foto</p>
                            <div>
                                <img class="img-preview" src="" width="100px">
                            </div>
                            <input type="file" name="foto" id="image" required
                                class="form-control @error('foto') is-invalid @enderror">
                            @error('foto')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Provinsi</label>
                            <select class="form-control select2" name="anggota_id" style="width: 100%;">
                                <option selected="selected" disabled>Provinsi</option>
                                <option value="#" selected>Jawa Barat</option>
                                {{-- @foreach ($data as $item)
                                    @if ( old('anggota_id') == $item->id )
                                        <option value="{{ $item->id }}" selected>{{ $item->user->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                                    @endif
                                @endforeach --}}
                            </select>
                            @error('anggota_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kabupaten/Kota</label>
                            <input type="text" name="kabupaten" required value="{{ old('kabupaten') }}"
                                class="form-control @error('kabupaten') is-invalid @enderror" placeholder="Kabupaten/Kota">
                            @error('kabupaten')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <input type="text" name="kecamatan" required value="{{ old('kecamatan') }}"
                                class="form-control @error('kecamatan') is-invalid @enderror" placeholder="Kecamatan">
                            @error('kecamatan')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Desa</label>
                            <input type="text" name="kelurahan" required value="{{ old('kelurahan') }}"
                                class="form-control @error('kelurahan') is-invalid @enderror" placeholder="Desa">
                            @error('kelurahan')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3" placeholder="Alamat"></textarea>
                            @error('alamat')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div id="googleMap" style="width:100%;height:380px;"></div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right" style="margin-left: 10px">Tambah</button>
                    <a href="/pengajuan-kegiatans" class="btn btn-default pull-right">Batal</a>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
@push('jsfooter')
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script type = "text/javascript">
    function initialize() {
      var propertiPeta = {
        center:new google.maps.LatLng(-8.5830695,116.3202515),
        zoom:9,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };

      var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

      // membuat Marker
      var marker=new google.maps.Marker({
          position: new google.maps.LatLng(-6.5614774,108.285491),
          map: peta
      });

    }

    // event jendela di-load
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>

@endpush

