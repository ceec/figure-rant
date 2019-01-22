@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                <div class="row">
                    <div class="col-md-3">
                        <h3>Blog</h3>
                        <a href="/home/blog/add">Add New Blog</a><br>
                        <a href="/home/blog/list">Edit Blog</a><br>
                    </div>
                    <div class="col-md-3">
                        <h3>Orders</h3>
                        <a href="/home/order/add">Add New Order</a><br>
                        <a href="/home/order/list">Edit Order</a><br>                        
                    </div>
                    <div class="col-md-3">
                        <h3>Figures</h3>
                        <a href="/home/figure/add">Add New Figure</a><br>
                        <a href="/home/figure/list">Edit Figure</a><br>
                    </div>    
                    <div class="col-md-3">
                        <h3>Goods</h3>
                        <a href="/home/good/add">Add New Goods</a><br>
                        <a href="/home/good/list">Edit Goods</a><br>
                    </div>                                                          
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h3>Groups</h3>
                        <a href="/home/group/add">Add New Group</a><br>
                        <a href="/home/group/list">Edit Group</a><br>                        
                    </div>
                    <div class="col-md-3">
                        <h3>Characters</h3>
                        <a href="/home/character/add">Add New Character</a><br>
                        <a href="/home/character/list">Edit Character</a><br>                        
                    </div>   
                    <div class="col-md-3">
                        <h3>Sculptors</h3>
                        <a href="/home/sculptor/add">Add New Sculptor</a><br>
                        <a href="/home/sculptor/list">Edit Sculptor</a><br>                        
                    </div>                                        
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h3>Stores</h3>
                        <a href="/home/store/add">Add New Store</a><br>
                        <a href="/home/store/list">Edit Store</a><br>                          
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
