<div class="row">
    <div class="col-xs-12">
        <div id="results"></div>
        <form class="form" method="POST" action="" onsubmit="return false" id="form-konten">
            <div class="form-group">
                <label for="name" class="col-sm-3 col-xs-12 control-label">Nama</label>
                <div class="col-sm-8 col-xs-12">
                    <input type="text" name="gallery_name" value="{{$data->gallery_name}}" class="form-control" placeholder="Nama gambar" required>
                </div>
            </div>
            <br><br><br>
            <div class="form-group">
                <label for="name" class="col-sm-3 col-xs-12 control-label">Gambar galeri</label>
                <div class="col-sm-8 col-xs-12">
                    <input type="file" name="gallery_photo" class="form-control">
                    <br>
                </div>
            </div>

            <input type="hidden" name="id" value="{{$data->id}}">
            <br><br><br><br><br>
            <div class="form-group">
                <label for="name" class="col-sm-3 col-xs-12 control-label"></label>
                <div class="col-sm-8 col-xs-12">
                    <input type="submit" class="btn btn-primary" value="Simpan Data">
                </div>
            </div>
        </form>

        <script>
            $("#form-konten").submit(function () {
                var data = getFormData("form-konten");
                ajaxTransfer("gallery/save", data, "#results");
            })
        </script>
    </div>
</div>

<script>
    function isFromPage() {
        if ($('#is-from-page').is(':checked')) {
            $('#table-page').css('display', 'block');
            $('#link-url').prop('readonly', true);
        } else {
            $('#table-page').css('display', 'none');
            $('#link-url').prop('readonly', false);
            $('#link-url').val('');
        }
    }

    function isSublink() {
        if ($('#is-sublink').is(':checked')) {
            $('#link-parent-id').css('display', 'block');
        } else {
            $('#link-parent-id').css('display', 'none');
        }
    }

    function picked(url) {
        $('#link-url').val('{{url("/")}}/'+url);
    }
</script>