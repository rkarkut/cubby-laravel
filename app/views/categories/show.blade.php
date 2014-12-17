@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">

            @include('partials.notifications')
            
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-9">
                    <p class="lead">{{ $category->name }}</p>
                </div>
                <div class="col-md-3">
                    
                    <input type="text" class="form-control" data-action="seach-link" data-category="{{ $category->id }}" placeholder="Search link">

                </div>
            </div>

            @if(count($categories) > 0)
            <h6>Categories</h6>
            <div id="categories-list" class="list-group">
                @foreach($categories as $category)

                    @include('partials.category', array('category' => $category))
                    
                @endforeach
            </div>
            @endif

            @if(count($links) > 0)
            <h6>Links</h6>
            <div id="links-list" class="list-group">
                @foreach($links as $link)

                    @include('partials.link', array('link' => $link))

                @endforeach
            </div>
            @else
                <div class="alert alert-danger">Links not fund!</div>
            @endif

            <div class="row" style="text-align: center">
                {{ $links->links() }}
            </div>
            @if(Auth::check())

                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-1"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addNewCategory">Add category</button></div>
                    <div class="col-md-1" style="text-align: right"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addNewLink">Add link</button></div>
                </div>

            @endif
        </div>
    </div>

    @include('partials.new_category');
    @include('partials.new_link');

@stop
