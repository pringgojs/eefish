<div class="row">
    <div class="col-xs-12">
        <div id="results"></div>
        <form method="POST" action="" onsubmit="return false" id="form-konten">
            <div class="form-group">
                <label for="name" class="col-sm-3 col-xs-12 control-label">Nama Ukuran</label>
                <div class="col-sm-8 col-xs-12">
                    <input type="text" name="fish_size_category_name" value="{{$data->fish_size_category_name}}" class="form-control" placeholder="Nama Ukuran" required>
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
                ajaxTransfer("ukuran-ikan/save", data, "#results");
            })
        </script>
    </div>
</div>