@extends('layouts.master')

@section('content')

    <div class="page-header">

        <div class="row">
            <div class="col-md-9">
                <p class="lead">{{ $category->name }}</p>
            </div>
            <div class="col-md-3">
                
                <input type="text" class="form-control" data-action="seach-link" placeholder="Search link">

            </div>
        </div>

    </div>

    <div id="links-list" class="list-group">
        @forelse($links as $link)

            @include('partials.link', array('link' => $link))
            
        @empty
            <div class="alert alert-danger">Links not found.</div>
        @endforelse
    </div>

    <div class="row" style="text-align: center">
        {{ $links->links() }}
    </div>
    @if(Auth::check())
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2" style="text-align: right"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addNewLink">Add new link</button></div>
        </div>
    @endif

    <div class="modal fade" id="addNewLink" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        {{ Form::open(array('route' => 'links.store', 'method' => 'post')) }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add new link</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <input type="text" name="url" class="form-control" data-action="get-link-title" id="link_url" placeholder="Enter URL">
                        </div>

                        <div class="form-group">
                            <input type="text" name="title" class="form-control" id="link_title" placeholder="Enter title">
                        </div>

                        <input type="hidden" name="current_category" value="{{ $category->id }}" />
                        
                        <div class="form-group">
                            <select name="category" class="form-control">
                            @foreach($_categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            </select>
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
