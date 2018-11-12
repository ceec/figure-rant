@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing <a href="/good/{{$good->url}}">{{$good->name}}</a></h1>
    <h3><a href="/home/good/list">Edit List</a></h3>

    <div class="row">
        <div class="col-md-3">
            <img class="img-responsive" src="/images/goods/test.jpg">
        </div>    
    	<div class="col-md-9">
            {!! Form::open(['url' => '/edit/good']) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        {!! Form::text('name',$good->name,['class'=>'form-control','id'=>'name']) !!}
                    </div>   
                    <div class="form-group">
                        <label for="url">url </label>
                        {!! Form::text('url',$good->url,['class'=>'form-control','id'=>'url']) !!}
                    </div>              
                    <div class="form-group">
                        <label for="manufacturer_url">Manufacturer URL </label>
                        {!! Form::text('manufacturer_url',$good->manufacturer_url,['class'=>'form-control','id'=>'manufacturer_url']) !!}
                    </div>    
                        </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="announce_date">Announce Date </label>
                                {!! Form::date('announce_date',$good->announce_date,['class'=>'form-control','id'=>'announce_date']) !!}
                            </div>   
                            <div class="form-group">
                                <label for="available_date">Available Date </label>
                                {!! Form::date('available_date',$good->available_date,['class'=>'form-control','id'=>'available_date']) !!}
                            </div>   
                            <div class="form-group">
                                <label for="release_date">Release Date </label>
                                {!! Form::date('release_date',$good->release_date,['class'=>'form-control','id'=>'release_date']) !!}
                            </div>                                                                                   
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="seen_date">Seen Date </label>
                                {!! Form::date('seen_date',$good->seen_date,['class'=>'form-control','id'=>'seen_date']) !!}
                            </div>    
                            <div class="form-group">
                                <label for="available_release_date">Available Release Date </label>
                                {!! Form::date('available_release_date',$good->available_release_date,['class'=>'form-control','id'=>'available_release_date']) !!}
                            </div>   
                            <div class="form-group">
                                <label for="price">Price</label>
                                {!! Form::number('price',$good->price,['class'=>'form-control','id'=>'price']) !!}
                            </div>                                                                                   
                        </div>
                    </div>
 
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="released">Status</label>
                                {!! Form::select('status_id',$status,$good->status_id,['class'=>'form-control', 'id'=>'released']) !!} 
                            </div>  
                            <div class="form-group">
                                <label for="group_id">Group</label>
                                {!! Form::select('group_id',$groups,$good->group_id,['class'=>'form-control', 'id'=>'group_id']) !!} 
                            </div>                                                             
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="item_number">Item Number</label>
                                {!! Form::text('item_number',$good->item_number,['class'=>'form-control','id'=>'item_number']) !!}
                            </div>      
                            <div class="form-group">
                                <label for="character_id">Character</label>
                                {!! Form::select('character_id',$characters,$good->character_id,['class'=>'form-control', 'id'=>'character_id']) !!} 
                            </div>                                                      
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="released">Manufacturer</label>
                                {!! Form::select('manufacturer_id',$manufacturers,$good->manufacturer_id,['class'=>'form-control', 'id'=>'manufacturer_id']) !!} 
                            </div>    
                            <div class="form-group">
                                <label for="sculptor_id">Sculptor</label>
                                {!! Form::select('sculptor_id',$sculptors,$good->sculptor_id,['class'=>'form-control', 'id'=>'sculptor_id']) !!} 
                            </div>                                                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productline_id">Product Line</label>
                                {!! Form::select('productline_id',$productlines,$good->productline_id,['class'=>'form-control', 'id'=>'productline_id']) !!} 
                            </div>      
                            <div class="form-group">
                                <label for="scale_id">Scale</label>
                                {!! Form::select('scale_id',$scales,$good->scale_id,['class'=>'form-control', 'id'=>'scale_id']) !!} 
                            </div>                                                       
                        </div>
                    </div>
                </div>
            </div>
			
               
            {!! Form::hidden('good_id',$good->id) !!}                                                                       
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
    	</div>

   	</div>
</div>
@endsection
