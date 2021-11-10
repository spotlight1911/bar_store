@extends('admin.add')

@section('form')
    <h2>Edit ingredients</h2>
    <div class="panel-body">
{{--        @include('common.errors')--}}
        <form action="{{ route('ingredient.update', $ingredient->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <!-- Имя задачи -->
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="name" class="form-control" value="{{$ingredient->name}}">
                </div>
            </div>
            <div class="form-group">
                <label for="descriptions" class="col-sm-3 control-label">Описание</label>
                <div class="col-sm-6">
                    <textarea  name="description" id="descriptions" class="form-control" value="{{$ingredient->description}}"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
