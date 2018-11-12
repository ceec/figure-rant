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
    <h2>Goods</h2>   
    <div class="row">
        <!-- lets have them be four across? -->
        <?php $count = 0; ?>
        @foreach($goods as $good)
            <?php $count++; ?>
            <div class="col-md-3">
                <a href="/good/{{$good->url}}">
                <img class="img-responsive" src="/images/good/{{$good->url}}-released.jpg">
                <h4 class="figure-name">{{$good->name}}</h4>
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