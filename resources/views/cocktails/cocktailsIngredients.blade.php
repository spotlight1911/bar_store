@extends('layouts.app')

@section('content')
    <!-- Форма создания задачи... -->

    <!-- Текущие задачи -->
    @if (count($ingridients) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Please select ingridients
            <div class="panel-body">
                <div class="text-center sticky-top">
                    <form method="get" id="addingridients" action="{{url('cocktails/cocktails')}}">
                        <button class="btn btn-success sticky-top"><i class="fa fa-get-pocket"></i> Get cocktails</button>
                    </form>
                </div>
                <table class="table table-striped task-table">
                    <!-- Тело таблицы -->
                    <tbody>
                        @foreach ($ingridients as $ingridient)
                            <tr>
                                <td >
                                    <div><img src="{{asset($ingridient->photo)}}" alt = "Not have photo"/></div>
                                </td>
                                <td class="table-text">
                                    <div>{{$ingridient->name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{$ingridient->description}}</div>
                                </td>
                                <td>
                                    <label>Добавить ингредиент</label>
                                    <input form = "addingridients" type="checkbox" name="ingridienеs[]" value="{{$ingridient->id}}">
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
