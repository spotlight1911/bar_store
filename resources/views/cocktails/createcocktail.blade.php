@extends('layouts.app')

@section('content')
    <div class="row" >
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
    <div style="background-image: url('images/backgrounds/jaegershot.jpg'); background-size: auto 100%; height: 50vh; width: 70vw" >
        <form method="get" action="{{url('cocktails/ingridients')}}">
            <div class="text-center">
            <button type="submit" class="btn btn-default btn-lg">Create your cocktail</button>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    <footer class="navbar navbar-default ">
        <div class="navbar-header">
            <h5>Laravel final project php 21-1 @</h5>
        </div>
    </footer>
@endsection
