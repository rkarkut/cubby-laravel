@extends('layouts.master')

@section('sidebar')

@stop

@section('content')
    <div class="row">
        
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="color: #555;">Login</div>
                    <div class="panel-body">
                        
                        @include('partials.notifications')

                        <form class="form-horizontal" role="form" method="POST">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group" style="text-align: center">
                                <div class="col-sm-12">
                                  <input type="email" name="email" class="form-control login-form-up" id="email" placeholder="Email">
                                </div>
                                <div class="col-sm-12">
                                  <input type="password" name="password" class="form-control login-form-down" id="password" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6"><a href="">Don't have account?</a></div>
                                <div class="col-md-6" style="text-align: right"><button type="submit" class="btn btn-primary btn-sm">Login</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
@stop