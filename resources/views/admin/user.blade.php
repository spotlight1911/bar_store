@extends('admin.add')

@section('form')
{{--    {{dd($users)}}--}}
    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
{{--    @include('common.errors')--}}


    </div>
    <div class="panel-body">
        <table class="table table-striped task-table">
            <!-- Тело таблицы -->
            <thead>
            <tr>
                <td>Login</td>
                <td>Email</td>
                <td>Rights</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>

                    <td class="table-text">
                        <div>{{ $user->name }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{$user->email}}</div>
                    </td>
                    <td class="table-text"></tdclass>
                        <div>@if($user->is_admin === 1)
                                 Admin
                            @elseif($user->is_admin === 2)
                                 Super Admin
                            @else
                                 User
                                 @endif
{{--                            {{$user->is_admin}}--}}
                        </div>
                    </td>
                    <td>
                        @if($user->is_admin !== 2)
                        <form method="post" action="{{route('user.takeRights', $user->id)}}">
                            {{ csrf_field() }}
                            {{method_field('GET')}}
                            <button class="btn btn-warning"><i class="fa fa-close"></i></button>
                        </form>
                        <form method="post" action="{{route('user.giveRights', $user->id)}}">
                            {{ csrf_field() }}
                            {{method_field('GET')}}
                            <button class="btn btn-success"><i class="fa fa-check"></i></button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="{{route('user.destroy', $user->id)}}">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
