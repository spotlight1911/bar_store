@extends('admin.add')

@section('form')
    <h2>Edit cocktails</h2>
    <div class="panel-body">
        @include('common.errors')
        <form enctype="multipart/form-data" action="{{route('cocktail.editIngridients', $cocktail->id)}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
{{--        {{method_field('GET')}}--}}
        <!-- Имя задачи -->
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="name" class="form-control" value="{{$cocktail->name}}">
                    <input type="hidden" name="cocktailid" value="{{$cocktail->id}}">
                </div>
            </div>
            <div class="form-group">
                <label for="descriptions" class="col-sm-3 control-label">Описание</label>
                <div class="col-sm-6">
                    <textarea  name="description" id="descriptions" class="form-control" >{{$cocktail->description}}</textarea>
                </div>
            </div>
            <div class="text-center">
                <img src="{{'/'.$cocktail->photo}}" style="height: 150px"/>
            </div>
            <div class="form-group">
                <label for="photos" class="col-sm-3 control-label">Фото</label>
                <div class="col-sm-6">
                    <input type="file" name="photo" id="photos" class="form-control">
                    <input type="hidden" name = "oldPhoto" value="{{$cocktail->photo}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-save"></i> Изменить ингредиенты
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
