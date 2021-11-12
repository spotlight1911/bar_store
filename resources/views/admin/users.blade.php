@extends('admin.add')

@section('form')
    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
        <form action="{{ url('/admin/add/admin/edit')}}" id="adduser" method="GET" class="form-horizontal">
        {{ csrf_field() }}
{{--            {{method_field('PUT')}}--}}
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Добавить администратора
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-body">
        <table class="table table-striped task-table">
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="table-text">
                        <div>{{$user->name }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{$user->email}}</div>
                    </td>
{{--                    <td>--}}
{{--                        <form method="post" action="{{route('ingredient.destroy', $user->id)}}">--}}
{{--                            {{ csrf_field() }}--}}
{{--                            {{method_field('DELETE')}}--}}
{{--                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>--}}
{{--                        </form>--}}
{{--                        <form method="post" action="{{route('ingredient.edit', $user->id)}}">--}}
{{--                            {{ csrf_field() }}--}}
{{--                            {{method_field('GET')}}--}}
{{--                            <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>--}}
{{--                        </form>--}}
{{--                    </td>--}}
                    <td>
                        <label>Назначить админом</label>
                        <input form = "adduser" type="checkbox" name="users[]" value="{{$user->id}}"
                        @if($user->is_admin === 1) checked @endif>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection
