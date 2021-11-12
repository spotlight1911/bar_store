@extends('layouts.app')

@section('content')
    <!-- Форма создания задачи... -->

    <!-- Текущие задачи -->
    @if (count($cocktails) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Тело таблицы -->
                    <tbody>

                    @foreach ($cocktails as $cocktail)
                        <tr>
                            <td >
                                <div><img src="{{asset($cocktail->photo)}}" alt = "Not have photo" class="imgOfBar"/></div>
                            </td>
                            <td class="table-text">
                                <div>{{$cocktail->name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$cocktail->description}}</div>
                                Для изготовления этого коктейля:
                                @if(count($ingridientsName[$cocktail->id])>0)
                                    <div>
                                        вы уже выбрали:
                                        <ul>
                                            @foreach($ingridientsName[$cocktail->id] as $kye=>$name)
                                                <li>{{$kye}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(count($ingridients[$cocktail->id])>0)
                                    <div>
                                        вам еще необходимо:
                                        <ul>
                                            @foreach($ingridients[$cocktail->id] as $name => $count)
                                                <li>{{$name}} - {{$count}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="panel-heading">
            Вы не выбрали ингредиенты
        </div>
    @endif
@endsection
