@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Nendoroid Tracker</h1>
    <div class="row">
        <div class="col-md-10">
        <h2>Pre-ordered</h2>
        @foreach($nendopreorders as $nendo)
            <div class="row">
                <?php
                    //format the url 
                    $folder = str_replace('nendoroid-','',$nendo->url);
                ?>
                <div class="col-md-3">
                    <h3>{{$nendo->name}}</h3>
                    <h4>{{$nendo->item_number}}</h4>
                    <p>
                        Pre-ordered: {{$nendo->order_date}}<br>
                        Store: {{$nendo->order_id}}<br>
                        Price: &yen;{{$nendo->price_yen}}<br>
                        Release Date: {{$nendo->available_release_date}}<br>
                        GSC: <a target="_blank" href="{{$nendo->gsc_url}}">{{$folder}}</a><br>
                        AmiAmi: <a target="_blank" href="http://www.amiami.com/top/detail/detail?gcode={{$nendo->amiami_id}}">{{$folder}}</a>
                    </p>
                </div>
                <div class="col-md-3">
                    <?php echo public_path(); ?>
                    @if (file_exists(public_path('/images/nendoroids/'.$folder.'/announced.jpg')))

                        <img class="img-responsive" src="/images/nendoroids/{{$folder}}/announced.jpg">
                        Announced: {{$nendo->announce_date}}
                    @endif
                </div>                
                <div class="col-md-3">
                    @if (file_exists(public_path('/images/nendoroids/'.$folder.'/prototype.jpg')))
                        <img class="img-responsive" src="/images/nendoroids/{{$folder}}/prototype.jpg">
                        Prototype Seen: {{$nendo->seen_date}}
                    @endif
                </div>
                <div class="col-md-3">
                    @if (file_exists(public_path('/images/nendoroids/'.$folder.'/released.jpg')))
                        <img class="img-responsive" src="/images/nendoroids/{{$folder}}/released.jpg">
                        Preorders opened: {{$nendo->available_date}}
                    @endif
                </div>                  
            </div>

        @endforeach
        <h2>Available</h2>

        <h2>Announced</h2>


        </div>
        <div class="col-md-2">
            <p>
                @include('display.rightsidebar')
            </p>
        </div>

    </div>
</div>
@endsection