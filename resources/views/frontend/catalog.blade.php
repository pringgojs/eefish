@extends('layout.frontend')

@section('content')
    <section id="features" class="features bg-white m-top-30">
        <div class="container">
            <div class="row">
                <div class="main_features fix roomy-70">

                    <div class="col-md-3">
                        <ul class="list-ul">
                            <li class="list-li"  style="border-bottom:1px solid #eee">
                                <a href="{{url('catalog')}}" class="list-link active">Katalog Ikan</a>
                                <ul class="list-ul">
                                @foreach($categories as $fish_category)
                                    <li class="list-li"><a href="{{url('catalog/'.$fish_category->id)}}" class="list-link-1 list-link-pad-left--5">{{$fish_category->fish_category_name}}</a></li>
                                @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9 contain br-left">
                        <h3>Katalog {{Request::segment(2) ? $category->fish_category_name : ''}}</h3>
                        @foreach($fishes as $fish)
                        <?php 
                            $photo = 'default.png';
                            if ($fish->photo) {
                                $photo = $fish->photo;
                            }
                        ?>
                        <div class="col-md-4 col-xs-6">
                            <div class="thumbnail">
                                <img src="{{ asset('public/uploads/ikan/'.$photo)}}" alt="Lights" style="width:100%">
                                <div class="caption">
                                    <p><b>{{$fish->fish_name}}</b></p>
                                </div>
                            </div>
                        </div>
                        {{-- <img src="{{ asset('public/uploads/ikan/'.$photo)}}" width="200px" height="200px" class="img-thumbnail" alt="Cinque Terre"> --}}
                        @endforeach
                        {{ $fishes->links( "pagination::bootstrap-4") }}
                    </div>

                </div>
            </div><!-- End off row -->
        </div><!-- End off container -->
    </section>
@stop