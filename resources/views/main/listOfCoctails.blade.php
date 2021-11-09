@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                <table>
        @foreach($coctails as $coctail)
             <tr>
                 <td rowspan="2"><img src="{{asset($coctail->photo)}}" class="imgOfBar" ></td>
                   <td><h2>{{ $coctail->name }}</h2></td>
             </tr>
                        <tr>
                            <td>
                                <h4>{{$coctail->recipe}}</h4>
                            </td>
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
