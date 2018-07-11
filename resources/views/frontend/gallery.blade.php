@extends('layout.frontend')

@section('content')
    <section id="features" class="features bg-white m-top-30">
        <div class="container">
            <div class="row">
                <div class="main_features fix roomy-70">

                    <div class="col-lg-12 col-md-12 contain br-left">
                        <h3>Gallery</h3>
                        @foreach($galleries as $gallery)
                        <div class="col-md-4 col-xs-6">
                            <div class="thumbnail">
                                <img src="{{ asset('public/uploads/gallery/'.$gallery->gallery_photo)}}" alt="Lights" style="width:100%; height:230px">
                                <div class="caption">
                                    <p><b>{{$gallery->gallery_name}}</b></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{ $galleries->links( "pagination::bootstrap-4") }}
                    </div>

                </div>
            </div><!-- End off row -->
        </div><!-- End off container -->
    </section>
@stop