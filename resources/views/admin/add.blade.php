@extends('layouts.app')

@section('content')
    <ul>
        <li>
            <form method="post" action="{{url('/admin/add/ingredient')}}">
                {{ csrf_field() }}
                {{method_field('GET')}}
                <button class="btn btn-warning">ингридиенты</button>
            </form>
        </li>
        <li>
            <form method="post" action="{{url('admin/add/cocktails')}}">
                {{ csrf_field() }}
                {{method_field('GET')}}
                <button class="btn btn-warning">Коктели</button>
            </form>
        </li>
        <li>
        <form method="post" action="{{url('admin/add/users')}}">
            {{ csrf_field() }}
            {{method_field('GET')}}
            <button class="btn btn-warning">Пользователи</button>
        </form>
        </li>
    </ul>
    @yield('form')
    @yield('cocktail')

@endsection
