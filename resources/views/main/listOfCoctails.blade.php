@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
{{--                    <table>--}}
{{--                        <tr>--}}
{{--                            <td rowspan="2"><img src="https://img1.russianfood.com/dycontent/images_upl/44/sm_43179.jpg" class="imgOfBar" ></td>--}}
{{--                            <td><h2>{{$coctails[0]->name}}</h2></td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>--}}
{{--                                <ul>--}}
{{--                                    <li class="list-group-item list-group-item-danger">Апельсиновый ликер типа Куантро (охлажденный) - 2 ст. л.</li>--}}
{{--                                    <li class="list-group-item list-group-item-warning">Коньяк - 1 ст. л.</li>--}}
{{--                                    <li class="list-group-item list-group-item-info">Игристое вино охлажденное (испанское игристое вино Кава) - 1/2 стакана</li>--}}
{{--                                    <li class="list-group-item list-group-item-success">Лимонная цедра для украшения (по желанию)</li>--}}
{{--                                </ul>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <!--        &#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45-->--}}
{{--                    </table>--}}
{{--                <table>--}}

{{--                    foreach ($coctails as $coctail){--}}
{{--                        foreach ($coctail as $val){--}}
{{--                            echo--}}
{{--                            <td rowspan="2"><img src="https://img1.russianfood.com/dycontent/images_upl/44/sm_43179.jpg" class="imgOfBar" ></td>"<tr><td><h2>'$coctail[name]'</h2></td></tr>";--}}
{{--                        }--}}
                <table>
        @foreach($coctails as $coctail)
             <tr>
                 <td rowspan="2"><img src="{{$coctail->photo}}" class="imgOfBar" ></td>
                   <td><h2>{{ $coctail->name }}</h2></td>
             </tr>
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
