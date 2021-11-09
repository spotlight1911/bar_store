@extends('layouts.app')

@section('content')
    <!-- Форма создания задачи... -->

    <!-- Текущие задачи -->
    @if (count($ingridients) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Please select ingridients
                {{$ingridientId}}
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Тело таблицы -->
                    <tbody>
                    <form method="get" id="addingridients" action="{{url('cocktails/cocktails')}}">
                        <div class="sticky-top">
                        <button class="btn btn-success"><i class="fa fa-get-pocket"></i> Get cocktails</button>
                        </div>
                    </form>
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
{{--                                <form method="get" action="{{route('cocktails.ingridientId')}}">--}}
{{--                                    --}}
{{--                                </form>--}}

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
