@extends('layouts.master')

@section('sidebar')

@stop

@section('content')
    <!-- Begin page content -->
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-body">

                @include('partials.notifications')

                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-9">
                        <p class="lead">Categories</p>
                    </div>
                    <div class="col-md-3">
                        
                        <input type="text" class="form-control" data-action="seach-category" placeholder="Search category">

                    </div>
                </div>

                <div id="categories-list" class="list-group">
                @foreach($categories as $category)

                     @include('partials.category', array('category' => $category))

                @endforeach
                </div>

                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2" style="text-align: right">

                    @if(Auth::check())
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addNewCategory">Add new category</button>
                    @endif
                    
                    </div>
                </div>

                <div class="row" style="text-align: center">
                     {{ $categories->links(); }}
                </div>
            </div>
        </div>
    </div>
        @include('partials.new_category');
@stop