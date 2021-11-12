@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                <table>
                    @foreach($cocktails as $cocktail)
                        <tr>
                            <td rowspan="{{5+count($recipe[$cocktail->id])}}"><img src="{{asset($cocktail->photo)}}" class="imgOfBar" ></td>
                            <td><h2>{{ $cocktail->name }}</h2></td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>Описание: </h3>
                                <h4>{{$cocktail->description}}</h4>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>Рецепт: </h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Наименование:
                            </td>
                            <td>
                                Количество:
                            </td>
                        </tr>
                        <tr>
                                @foreach($recipe[$cocktail->id] as $key => $value)
                                <tr>
                                    <td>
                                        {{$key}}
                                    </td>
                                    <td colspan="2">
                                        {{$value}}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                @endforeach
                    @endforeach
                </table>
                    <footer class="navbar navbar-default ">
                            <div class="navbar-header">
                                <h5>Laravel final project php 21-1 @</h5>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
