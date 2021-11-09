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
                                    @if(count($ingridients[$cocktail->id])>0)
                                        <div>
                                            Для изготовления этого коктейля вам еще необходимо:
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
            Site not have ingridients
        </div>
    @endif
@endsection
