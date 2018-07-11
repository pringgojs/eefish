{{-- Load TinyCME --}}
<script src='{{asset('public/plugin/tinymce/js/tinymce/tinymce.min.js')}}'></script>
<script src='{{asset('public/plugin/tinymce/js/tinymce/jquery.tinymce.min.js')}}'></script>
<script>
    tinymce.init({
        selector: '#textarea-page',
        height: 500,
        theme: 'modern',
        plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        image_advtab: true,
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });
</script>

<div class="row">
    <div class="col-md-12">
        <div id="results"></div>
        <form method="POST" action="" onsubmit="return false" id="form-konten">
            <div class="form-group">
                <label for="name" class="col-sm-3 col-xs-12 control-label">Judul</label>
                <div class="col-sm-8 col-xs-12">
                    <input type="text" name="title" value="{{$data->title}}" class="form-control" placeholder="Judul Halaman" required>
                </div>
            </div>
            <div class="form-group">
                <label for="konten" class="col-sm-3 col-xs-12 control-label">Konten</label>
                <div class="col-sm-12 col-xs-12">
                    <textarea id="textarea-page" name="content"> {{$data->content}}</textarea>
                </div>
            </div>

            <input type="hidden" name="id" value="{{$data->id}}">
            <br>
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
                ajaxTransfer("page/save", data, "#results");
            })
        </script>
    </div>
</div>