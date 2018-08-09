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

.figure-table {
   height: 200px;
}
</style>
<div class="container">
    <h2>Figures</h2>   
    <table class="table">
      <thead>
        <th>Characters</th>
      </thead>
      <tbody>
        @foreach($characters as $character)
          <tr>
              <td>{{$character->name}}</td>
              @foreach($character->figures as $figure)
                <td>
                  <img class="figure-table" src="/images/{{$figure->imageFolder()}}/{{$figure->url}}-{{strtolower($figure->status->name)}}.jpg">
                </td>
              @endforeach
          </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection