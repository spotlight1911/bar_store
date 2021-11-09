@extends('layouts.app')

@section('content')
    <div style="background-image: url('images/backgrounds/jaegershot.jpg'); height: 800px">
        <form method="get" action="{{url('cocktails/ingridients')}}">
            <div class="text-center">
            <button type="submit" class="btn btn-default btn-lg">Create your cocktail</button>
            </div>
        </form>
    </div>
    <footer class="navbar navbar-default ">
        <div class="navbar-header">
            <h5>Laravel final project php 21-1 @</h5>
        </div>
    </footer>
@endsection
