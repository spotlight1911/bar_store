@extends('admin.add')

@section('form')
    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
{{--    @include('common.errors')--}}

    <!-- Форма новой задачи -->
        <form enctype="multipart/form-data" action="{{ url('/admin/add/ingredients') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="ingredient" class="col-sm-3 control-label">Ингридиент</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="ingredient" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="descriptions" class="col-sm-3 control-label">Описание</label>
                <div class="col-sm-6">
                    <textarea  name="description" id="descriptions" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="photos" class="col-sm-3 control-label">Фото</label>
                <div class="col-sm-6">
                    <input type="file" name="photo" id="photos" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Добавить ингредиент
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-body">
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
                        <form method="post" action="{{route('ingredient.destroy', $ingridient->id)}}">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
{{--                        <form method="post" action="{{route('tasks.edit', $task->id)}}">--}}
{{--                            {{ csrf_field() }}--}}
{{--                            {{method_field('GET')}}--}}
{{--                            <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>--}}
{{--                        </form>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
