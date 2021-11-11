@extends('admin.add')

@section('form')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form enctype="multipart/form-data" action="{{ url('/admin/add/cocktails') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="ingredient" class="col-sm-3 control-label">Коктель</label>
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
                            <label for="recipes" class="col-sm-3 control-label">Рецепт</label>
                            <div class="col-sm-6">
                                <textarea  name="recipe" id="recipes" class="form-control"></textarea>
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
                                    <i class="fa fa-plus"></i> Добавить коктель
                                </button>
                            </div>
                        </div>
                    </form>
                <table>
        @foreach($cocktails as $cocktail)
             <tr>
                 <td rowspan="3"><img src="{{asset($cocktail->photo)}}" class="imgOfBar" ></td>
                 <td><h2>{{ $cocktail->name }}</h2></td>
                 <td>
                     <form method="post" action="{{route('cocktail.destroy', $cocktail->id)}}">
                         {{ csrf_field() }}
                         {{method_field('DELETE')}}
                         <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                     </form>
                 </td>
                 <td>
                     <form method="post" action="{{route('cocktail.edit', $cocktail->id)}}">
                         {{ csrf_field() }}
                         {{method_field('GET')}}
                         <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                     </form>
                 </td>
             </tr>
             <tr>
                 <td>
                     <h3>Описание: </h3>
                     <h4>{{$cocktail->description}}</h4>
                 </td>
             </tr>
             <tr>
                 <td>
                     <h3>Рецепт: </h3>
                     <h4>{{$cocktail->recipe}}</h4>
                 </td>
             </tr>
        @endforeach
                </table>
                    <footer class="navbar navbar-default ">
                            <div class="navbar-header">
                                <h5>Laravel final project php 21-1 @</h5>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
