@extends('layouts.layout')

@section('title')
@parent
Figure Rant
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            @foreach ($blogs as $blog)
                <?php
                    $nicedate = date('F d, Y',strtotime($blog->created_at));
                    $nicetime = date('h:i A',strtotime($blog->created_at));

                    if ($blog->updated_by == 1) {
                        $blog->updated_by = 'CC';
                    }
                ?>            
                @if ($blog->image !='')
                    <div class="">
                        <a href="/{{$blog->type}}/{{$blog->url}}"><img class="img-responsive" src="/images/{{$blog->image}}" alt=""></a>
                    </div>
                @endif            
                <h2>
                    <a href="/{{$blog->type}}/{{$blog->url}}">{{$blog->title}}</a> <small>{{$nicedate}}</small>
                </h2>                

                <br>
                <br>
                <br>
                <br>
            @endforeach

            <!-- Pager -->
            {{$blogs->links()}}

        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-2">
            <p>
                @include('display.rightsidebar')
            </p>
        </div>

    </div>
</div>
@endsection
