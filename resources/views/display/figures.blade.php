@extends('layouts.layout')

@section('title')
@parent
Figures - figurerant.com
@stop

@section('content')
<style>
.figure-name {
    margin-top: 5px;
}
</style>
<div class="container">
    <h2>Figures</h2>   
    <div class="row">
        <!-- lets have them be four across? -->
        <?php $count = 0; ?>
        @foreach($figures as $figure)
            <?php $count++; ?>
            <div class="col-md-3">
                <a href="/figure/{{$figure->url}}">
                <img class="img-responsive" src="/images/{{$figure->imageFolder()}}/{{$figure->url}}-released.jpg">
                <h4 class="figure-name">{{$figure->name}}</h4>
                </a>
            </div>
            @if ($count%4 == 0)
                </div>
                <div class="row">
            @endif
        @endforeach
        <div class="col-md-10">
             
        </div>

    </div>
</div>
@endsection