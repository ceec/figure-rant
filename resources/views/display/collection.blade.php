@extends('layouts.layout')

@section('title')
@parent
About - figurerant.com
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Collection</h2>
            <div class="row">
            <?php $x = 0; ?>

            @foreach($figures as $figure)
                <div class="col-md-3">
                    @if($figure->figureDB->productline_id == 7)
                        <img class="img-responsive" src="/images/nendoroids/{{$figure->figureDB->url}}-released.jpg">
                    @else
                        <img class="img-responsive" src="/images/scales/{{$figure->figureDB->url}}-released.jpg">
                    @endif                    
                    {{$figure->figureDB->name}}<br>
                </div>
                <?php $x++; ?>
                @if ($x%4 == 0)
                    </div>
                    <div class="row">
                @endif
            @endforeach
                               
            </div>          
        </div>
    </div>
</div>
@endsection