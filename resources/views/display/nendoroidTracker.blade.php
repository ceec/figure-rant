@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1>Nendoroid Tracker</h1>

        <h2>Available</h2>
        <hr>
        @foreach($figures as $nendo)
            <div class="row">
                <?php
                    //format the url 
                    //$folder = str_replace('nendoroid-','',$nendo->url);
                    $folder = $nendo->url;
                ?>
                <div class="col-md-3">
                    <h3>{{$nendo->name}}</h3>
                    @if ($nendo->item_number != 0 )
                        <h4>{{$nendo->item_number}}</h4>
                    <p>
                        Release Date: {{date('F Y',strtotime($nendo->available_release_date))}}<br>
                        <a target="_blank" href="{{$nendo->manufacturer_url}}">GSC Link</a><br>
                        <a target="_blank" href="http://www.amiami.com/top/detail/detail?gcode={{$nendo->amiami_id}}">AmiAmi Link</a>
                    </p>                        
                    @endif
                </div>
                <div class="col-md-3">
                    @if (file_exists(public_path('/images/nendoroids/'.$folder.'-concept.jpg')))

                        <img class="img-responsive" src="/images/nendoroids/{{$folder}}-concept.jpg">
                        Announced: {{$nendo->announce_date}}
                    @endif
                </div>                
                <div class="col-md-3">
                    @if (file_exists(public_path('/images/nendoroids/'.$folder.'-prototype.jpg')))
                        <img class="img-responsive" src="/images/nendoroids/{{$folder}}-prototype.jpg">
                        Prototype Seen: {{$nendo->seen_date}}
                    @endif
                </div>
                <div class="col-md-3">
                    @if (file_exists(public_path('/images/nendoroids/'.$folder.'-released.jpg')))
                        <img class="img-responsive" src="/images/nendoroids/{{$folder}}-released.jpg">
                        Preorders opened: {{$nendo->available_date}}
                    @endif
                </div>                  
            </div>

        @endforeach



   
        </div>
        <div class="col-md-2">
        </div>

    </div>
</div>

@endsection