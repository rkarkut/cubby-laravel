@extends('layouts.master')

@section('content')

    <div class="row">
        
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="color: #555;">Create account</div>
                <div class="panel-body">
                    
                    @include('partials.notifications')
                    
                    <form class="form-horizontal" role="form" method="POST">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group" style="text-align: center">
                            <div class="col-sm-12">
                              <input type="email" name="email" class="form-control login-form-up" id="email" placeholder="Email">
                            </div>
                            <div class="col-sm-12">
                              <input type="password" name="password" class="form-control login-form-center" id="password" placeholder="Password">
                            </div>
                            <div class="col-sm-12">
                              <input type="password" name="password_confirmation" class="form-control login-form-down" id="password" placeholder="Repeat password">
                            </div>
                            <div class="col-sm-12" style="margin: 15px 0 -15px 0">
                                <button type="submit" class="btn btn-primary btn-sm">Register</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>

@stop