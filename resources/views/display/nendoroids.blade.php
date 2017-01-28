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
                        <a target="_blank" href="{{$nendo->gsc_url}}">GSC Link</a><br>
                        <a target="_blank" href="http://www.amiami.com/top/detail/detail?gcode={{$nendo->amiami_id}}">AmiAmi Link</a>
                    </p>
                </div>
                <div class="col-md-3">
                    @if (file_exists(public_path('/images/nendoroids/'.$folder.'/concept.jpg')))

                        <img class="img-responsive" src="/images/nendoroids/{{$folder}}/concept.jpg">
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
        @foreach($nendoavailable as $nendo)
            <div class="row">
                <?php
                    //format the url 
                    $folder = str_replace('nendoroid-','',$nendo->url);
                ?>
                <div class="col-md-3">
                    <h3>{{$nendo->name}}</h3>
                    <h4>{{$nendo->item_number}}</h4>
                    <p>
                        Release Date: {{$nendo->available_release_date}}<br>
                        <a target="_blank" href="{{$nendo->gsc_url}}">GSC Link</a><br>
                        <a target="_blank" href="http://www.amiami.com/top/detail/detail?gcode={{$nendo->amiami_id}}">AmiAmi Link</a>
                    </p>
                </div>
                <div class="col-md-3">
                    @if (file_exists(public_path('/images/nendoroids/'.$folder.'/concept.jpg')))

                        <img class="img-responsive" src="/images/nendoroids/{{$folder}}/concept.jpg">
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
        <h2>Announced</h2>
        @foreach($nendoannounce as $nendo)
            <div class="row">
                <?php
                    //format the url 
                    $folder = str_replace('nendoroid-','',$nendo->url);
                ?>
                <div class="col-md-3">
                    <h3>{{$nendo->name}}</h3>
                    <h4>{{$nendo->item_number}}</h4>
                    <p></p>
                </div>
                <div class="col-md-3">
                    @if (file_exists(public_path('/images/nendoroids/'.$folder.'/concept.jpg')))

                        <img class="img-responsive" src="/images/nendoroids/{{$folder}}/concept.jpg">
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

        </div>
        <div class="col-md-2">
            <p>
                @include('display.rightsidebar')
            </p>
        </div>

    </div>
</div>
@endsection