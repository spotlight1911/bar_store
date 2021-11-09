@extends('layouts.app')

@section('content')
    <!-- Форма создания задачи... -->

    <!-- Текущие задачи -->
    @if (count($cocktails) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Please select ingridients
            </div>
            <div class="panel-body">
                <div class="text-center">
                    <form method="get" id="addingridients" action="{{url('cocktails/cocktails')}}">
                        <button class="btn btn-success"><i class="fa fa-get-pocket"></i> Get cocktails</button>
                    </form>
                </div>
                <table class="table table-striped task-table">
                    <!-- Тело таблицы -->
                    <tbody>

                    @foreach ($cocktails as $cocktail)
                        <tr>
                            <td >
                                <div><img src="{{asset($cocktail->photo)}}" alt = "Not have photo"/></div>
                            </td>
                            <td class="table-text">
                                <div>{{$cocktail->name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$cocktail->description}}</div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="panel-heading">
            Site not have ingridients
        </div>
    @endif
@endsection
