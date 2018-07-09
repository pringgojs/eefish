<div class="row">
    <div class="col-xs-12">
        <div id="results"></div>
        <form method="POST" action="" onsubmit="return false" id="form-konten">
            <div class="form-group">
                <label for="name" class="col-sm-3 col-xs-12 control-label">Nama</label>
                <div class="col-sm-8 col-xs-12">
                    <input type="text" name="courier_name" value="{{$data->courier_name}}" class="form-control" placeholder="Nama Lengkap">
                    <br>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-3 col-xs-12 control-label">Username</label>
                <div class="col-sm-8 col-xs-12">
                    <input type="text" name="courier_user_name" value="{{$data->courier_user_name}}" class="form-control" placeholder="Username">
                    <br>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-3 col-xs-12 control-label">Password</label>
                <div class="col-sm-8 col-xs-12">
                    <input type="password" name="courier_password" class="form-control" placeholder="Password">
                    <br>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-3 col-xs-12 control-label">Nomor Identitas</label>
                <div class="col-sm-8 col-xs-12">
                    <input type="text" name="courier_identity_number" value="{{$data->courier_identity_number}}" class="form-control" placeholder="Nomor Identitas">
                    <br>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-3 col-xs-12 control-label">Alamat</label>
                <div class="col-sm-8 col-xs-12">
                    <textarea name="courier_address" class="form-control" placeholder="Alamat">{{$data->courier_address}}</textarea>
                    <br>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-3 col-xs-12 control-label">Foto</label>
                <div class="col-sm-8 col-xs-12">
                    <input type="file" name="courier_picture" class="form-control">
                    <br>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-3 col-xs-12 control-label">Nomor HP</label>
                <div class="col-sm-8 col-xs-12">
                    <input type="text" name="courier_phone_number" value="{{$data->courier_phone_number}}" class="form-control" placeholder="Nomor Telepon">
                    <br>
                </div>
            </div>

            <input type="hidden" name="id" value="{{$data->id}}">

            <div class="form-group">
                <label for="name" class="col-sm-3 col-xs-12 control-label"></label>
                <div class="col-sm-8 col-xs-12">
                    <input type="submit" class="btn btn-primary" value="Simpan Data">
                    <br><br>
                </div>
            </div>
        </form>

        <script>
            $("#form-konten").submit(function () {
                var data = getFormData("form-konten");
                ajaxTransfer("kurir/save", data, "#results");
            })
        </script>
    </div>
</div>