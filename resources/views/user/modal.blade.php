<!-- Tambah Data -->
<div class="modal fade" id="modal-tambah-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/tambah_user" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="exampleInputName" class="form-label">Name</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputName">
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputEmail" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Role</label>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <input type="radio" name="roles" id="roles" value="Super Admin"> Super Admin
                            </div>
                            <div class="col-xs-6">
                                <label class="form-label"></label>
                                <input type="radio" name="roles" id="roles" value="Admin"> Admin
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPasswordConfirm" class="form-label">Password Confirmation</label>
                        <input type="password" name="password_confirm" class="form-control" id="exampleInputPasswordConfirm">
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
<div class="modal fade" id="modal-rubah-user-{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rubah Data User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_user/{{ $row->id }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="exampleInputName" class="form-label">Name</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputName" value="{{ $row->nama }}">
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputEmail" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail" value="{{ $row->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Role</label>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <input type="radio" name="roles" id="roles" value="Super Admin" @if($row->roles == "Super Admin") checked @else @endif> Super Admin
                            </div>
                            <div class="col-xs-6">
                                <label class="form-label"></label>
                                <input type="radio" name="roles" id="roles" value="Admin" @if($row->roles == "Admin") checked @else @endif> Admin
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword" value="{{ $row->password }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPasswordConfirm" class="form-label">Password Confirmation</label>
                        <input type="password" name="password_confirm" class="form-control" id="exampleInputPasswordConfirm" value="{{ $row->password }}">
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
