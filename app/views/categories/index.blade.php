@extends('layouts.master')

@section('sidebar')

@stop

@section('content')
    <!-- Begin page content -->
    <div class="container">
        <div class="page-header">
            <p class="lead">Categories</p>
        </div>

        <div class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item">

                <a href="{{ URL::route('categories.destroy', array('id' => $category->id)) }}" data-method='delete' data-confirm = 'Are you sure you want to delete this category?' style='float:right; margin-left: 5px'><span class='glyphicon glyphicon-trash'></span></a>

                <span class="badge">{{ $category->links->count() }}</span>
                {{ link_to_route('categories.show', $category->name, array('id' => $category->id), array()) }}
            </li>
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

    <div class="modal fade" id="addNewCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        {{ Form::open(array('route' => 'categories.store', 'method' => 'post')) }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add new link</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter category name">
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success">Save</button>
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </div>
@stop