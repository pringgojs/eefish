<div class="row">
    <div class="col-xs-12">
        <div id="results"></div>
        <form class="form" method="POST" action="" onsubmit="return false" id="form-konten">
            <div class="form-group">
                <label for="name" class="col-sm-3 col-xs-12 control-label">Nama</label>
                <div class="col-sm-8 col-xs-12">
                    <input type="text" name="link_name" value="{{$data->link_name}}" class="form-control" placeholder="Nama Periode" required>
                </div>
            </div>
            <br><br><br>
            <div class="form-group">
                <label for="name" class="col-sm-3 col-xs-12 control-label">Posisi</label>
                <div class="col-sm-8 col-xs-12">
                    <select name="link_position" class="form-control">
                        <option value="header" @if($data->link_position == 'header') selected @endif>Header</option>
                        <option value="footer" @if($data->link_position == 'footer') selected @endif>Footer</option>
                        <option value="sidebar" @if($data->link_position == 'sidebar') selected @endif>Sidebar</option>
                    </select>
                </div>
            </div>

            <br><br><br>
            <div class="form-group">
                <label for="name" class="col-sm-3 col-xs-12 control-label">Url</label>
                <div class="col-sm-8 col-xs-12">
                    <input type="checkbox" id="is-from-page" onchange="isFromPage()"> Ambil dari halaman
                    <br>
                    <input type="text" name="link_url" id="link-url" value="{{$data->link_url}}" class="form-control" placeholder="misal. http://google.com" required>
                
                    <div id="table-page" style="display:none; ">
                        <table class="table table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $num => $page)
                                <tr>
                                    <td><a href="#" onclick="picked('{{$page->link}}')">Pilih</a></td>
                                    <td>{{$page->title}}</td>
                                    <td>{{url($page->link)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <br><br><br><br>
            <div class="form-group">
                <label for="link_is_parent" class="col-sm-3 col-xs-12 control-label">Kategori</label>
                <div class="col-sm-8 col-xs-12">
                    <input type="checkbox" id="is-sublink"  name="is_sublink" @if($data->link_parent_id > 0 ) checked @endif onchange="isSublink()"> Sebagai submenu
                    <br>
                    <select name="link_parent_id" id="link-parent-id" class="form-control" style="display:{{$data->link_parent_id > 0 ? 'block' : 'none'}}">
                        <option value="">Pilih link parent</option>
                        @foreach($links as $link)
                        <option value="{{$link->id}}" @if($link->id == $data->link_parent_id) selected @endif>{{$link->link_name}}</option>
                        @endforeach
                    </select>
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
                ajaxTransfer("link/save", data, "#results");
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