@extends('layouts.layout')

@section('title')
@parent
About - figurerant.com
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h2>Collection -  {{$totalHave}} Figures</h2>
            <div class="row">
            <?php $x = 0; ?>

            @foreach($figures as $figure)
                <div class="col-md-3">
                    <img class="img-responsive" src="/images/collection/main/{{$figure->figureDB->id}}.jpg">                 
                    <a href="/figure/{{$figure->figureDB->url}}">{{$figure->figureDB->name}}</a><br>
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