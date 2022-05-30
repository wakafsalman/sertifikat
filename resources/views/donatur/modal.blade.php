<!-- Import Data -->
<div class="modal fade" id="modal-import-donatur">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Data Donatur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form action="/import_excel" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Pilih file <a href="{{ asset('import_template/template_import.xlsx')  }}">* Download Template</a></label>
                        <input type="file" name="file" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tambah Data -->
<div class="modal fade" id="modal-tambah-donatur">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Sertifikat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/tambah_donatur" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Donatur <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control" id="exampleInputName" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="exampleInputEmail" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail">
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputPhone" class="form-label">Nomor HP</label>
                                <input type="number" name="no_telepon" class="form-control" id="exampleInputPhone">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress" class="form-label">Alamat</label>
                        <input type="textarea" name="alamat" class="form-control" id="exampleInputAddress">
                        <input type="hidden" name="tampil_alamat" value="0">
                        <input type="checkbox" name="tampil_alamat" value="1"> Tampilkan Alamat
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="exampleInputDate" class="form-label">Tanggal Donasi <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal" class="form-control" id="exampleInputDate" required>
                                <span class="text-danger error-text tanggal_error"></span>
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputPrice" class="form-label">Nominal <span class="text-danger">*</span></label>
                                <input type="text" name="nominal" class="form-control" id="exampleInputPrice" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputType" class="form-label">Donasi Tipe <span class="text-danger">*</span></label>
                        <select name="tipe_donasi" id="tipe_donasi" class="form-control" aria-label="Default select example" required>
                            <option value="">Pilih Donasi</option>
                            <option value="Wakaf">Wakaf</option>
                            <option value="Donasi">Donasi</option>
                            <option value="Infaq">Infaq</option>
                            <option value="Sedekah">Sedekah</option>
                            <option value="CSR">CSR</option>
                            <option value="Hibah">Hibah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProgram" class="form-label">Program Donasi <span class="text-danger">*</span></label>
                        <input type="text" name="program_donasi" class="form-control" id="exampleInputProgram" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Rubah Data -->
@foreach($data as $row)
<div class="modal fade" id="modal-rubah-donatur-{{ $row->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rubah Data Donatur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_donatur/{{ $row->id }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Donatur <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control" id="exampleInputName" value="{{ $row->nama }}" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="exampleInputEmail" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail" value="{{ $row->email }}">
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputPhone" class="form-label">Nomor HP</label>
                                <input type="number" name="no_telepon" class="form-control" id="exampleInputPhone" value="{{ $row->no_telepon }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress" class="form-label">Alamat</label>
                        <input type="textarea" name="alamat" class="form-control" id="exampleInputAddress" value="{{ $row->alamat }}">
                        <input type="hidden" name="tampil_alamat" value="0">
                        <input type="checkbox" name="tampil_alamat" value="1"> Tampilkan Alamat
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress" class="form-label">Nomor Resi </label>
                        <input type="text" name="no_resi" class="form-control" id="exampleInputEmail" value="{{ $row->no_resi }}">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="exampleInputDate" class="form-label">Tanggal Donasi <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal" class="form-control" id="exampleInputDate" value="{{ $row->tanggal }}" required>
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputPrice" class="form-label">Nominal <span class="text-danger">*</span></label>
                                <input type="text" name="nominal" class="form-control" id="exampleInputPrice" value="{{ $row->nominal }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputType" class="form-label">Donasi Tipe <span class="text-danger">*</span></label>
                        <select name="tipe_donasi" id="tipe_donasi" class="form-control" aria-label="Default select example" required>
                            <option selected value="{{ $row->tipe_donasi }}">{{ $row->tipe_donasi }}</option>
                            <option value="Wakaf">Wakaf</option>
                            <option value="Donasi">Donasi</option>
                            <option value="Infaq">Infaq</option>
                            <option value="Sedekah">Sedekah</option>
                            <option value="CSR">CSR</option>
                            <option value="Hibah">Hibah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProgram" class="form-label">Program Donasi <span class="text-danger">*</span></label>
                        <input type="text" name="program_donasi" class="form-control" id="exampleInputProgram" value="{{ $row->program_donasi }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

