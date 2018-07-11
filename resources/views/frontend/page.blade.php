@extends('layout.frontend')

@section('content')
    <section id="features" class="features bg-white m-top-30">
        <div class="container">
            <div class="row">
                <div class="main_features fix roomy-70">

                    <div class="col-md-3">
                        <ul class="list-ul">
                            @foreach($link_sidebar as $link)
                            <li class="list-li"  style="border-bottom:1px solid #eee">
                                <a href="{{$link->link_url}}" class="list-link @if(Request::fullUrl()==$link->link_url) active @endif">{{$link->link_name}}</a>
                                @if($link->child)
                                <ul class="list-ul">
                                    @foreach($link->child as $child)
                                    <li class="list-li"><a href="{{$child->link_url}}" class="list-link-1 list-link-pad-left--5 @if(Request::fullUrl()==$child->link_url) active @endif">{{$child->link_name}}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-9 contain br-left">
                        {!! $page->content !!}
                    </div>

                </div>
            </div><!-- End off row -->
        </div><!-- End off container -->
    </section>
@stop