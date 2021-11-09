@extends('layouts.app')

@section('content')
    <form method="get" action="{{route('cocktails.ingredients')}}">
        <input type="submit" value="Create your cocktail">
    </form>
@endsection
