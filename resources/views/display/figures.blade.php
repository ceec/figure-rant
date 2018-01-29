@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h2>Figures</h2>    
            <table class="table">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Manufacturer</td>
                        <td>Series</td>
                        <td>Character</td>
                        <td>Order</td>
                    </tr>
                </thead>
                @foreach($figures as $figure)
                    <tr>
                        <td>
                            {{$figure->name}}
                        </td>
                        <td>
                            {{$figure->manufacturer_id}}
                        </td>
                        <td>
                            {{$figure->group->name}}
                        </td>  
                        <td>
                            {{$figure->character_id}}
                        </td>        
                        <td>
                            {{$figure->order_id}}
                        </td>                                        
                    </tr>
                @endforeach      
            </table>  
        </div>
        <div class="col-md-2">
            <p>
                @include('display.rightsidebar')
            </p>
        </div>

    </div>
</div>
@endsection