@extends('layouts.app')

@section('content')
    <div style="background-image: url('images/backgrounds/maincreatecocktail.jpg'); height: 800px">
        <form method="get" action="{{url('cocktails/ingridients')}}">
            <div class="text-center">
            <button type="submit" class="btn btn-default btn-lg">Create your cocktail</button>
            </div>
        </form>
    </div>
@endsection
