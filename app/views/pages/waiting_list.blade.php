@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-12">
                    <p class="lead">Waiting list</p>
                </div>
            </div>

            <div class="list-group">
                @forelse($links as $_link)
                <li class="list-group-item">
                    <img src="http://www.google.com/s2/favicons?domain={{ $_link->url }}" width="16" height="16" />
                    {{ link_to_route('links.show', $_link->title, array('id' => $_link->id), array()) }}
                    
                    <a href="{{ URL::route('links.destroy', array('id' => $_link->id)) }}" data-method='delete' data-confirm = 'Are you sure you want to delete this link?' style='float:right'><span class='glyphicon glyphicon-trash'></span></a>
                </li>
                @empty
                <div class="alert alert-danger">You did not put any links to the waiting list</div>
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

        </div>
    </div>
@stop
