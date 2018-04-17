@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add New Order</h1>
    

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/add/order']) !!}


            <div class="form-group">
              <label for="store_order_id">Order ID</label>
               {!! Form::text('store_order_id','',['class'=>'form-control','id'=>'store_order_id']) !!}
            </div>                  
			<div class="form-group">
              <label for="type">Store</label>
               {!! Form::select('store_id',$stores, '',['class'=>'form-control','id'=>'type']) !!}
            </div>                   
                                                                       
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
