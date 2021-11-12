@extends('admin.add')

@section('form')
    @include('common.errors')
    <form id="ingridientsandcocktails" enctype="multipart/form-data" action="{{route('cocktail.update',$cocktail->id)}}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    {{method_field('PUT')}}
    <!-- Имя задачи -->
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="name" class="form-control" value="{{$cocktail->name}}" readonly>
                <input type="hidden" name="cocktailid" value="{{$cocktail->id}}">
            </div>
        </div>
        <div class="form-group">
            <label for="descriptions" class="col-sm-3 control-label">Описание</label>
            <div class="col-sm-6">
                <textarea  name="description" id="descriptions" class="form-control" readonly>{{$cocktail->description}}</textarea>
            </div>
        </div>
        <div class="form-group text-center">
            <img src="{{'/'.$cocktail->photo}}" style="height: 150px" class="imgOfBar"/>
        </div>
        <div class="form-group text-center">
            <div class="col-sm-6">
                <input type="text" name="photo" id="name" class="form-control" value="{{$cocktail->photo}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-save"></i> Изменить коктель
                </button>
            </div>
        </div>
    </form>
    @if (count($ingridients) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Please select ingridients
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Тело таблицы -->
                    <tbody>
                        @foreach ($ingridients as $ingridient)
                            <tr>
                                <td >
                                    <div><img src="{{asset($ingridient->photo)}}" alt = "Not have photo" class="imgOfBar"/></div>
                                </td>
                                <td class="table-text">
                                    <div>{{$ingridient->name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{$ingridient->description}}</div>
                                </td>
                                <td>
                                    <label for="counts" class="col-sm-3 control-label">Количество: </label>
                                    <input  type="text" name="countid{{$ingridient->id}}" id="counts" class="form-control" form = "ingridientsandcocktails"@if($ingridientsAndCount->has($ingridient->id)) value="{{$ingridientsAndCount->get($ingridient->id)}}" @endif>
                                </td>
                                <td>
                                    <label>Добавить ингредиент</label>
                                    <input form = "ingridientsandcocktails" type="checkbox" name="ingridienеs[]"
                                           @if($ingridientsAndCount->has($ingridient->id))  checked @endif
                                           value="{{$ingridient->id}}">
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
