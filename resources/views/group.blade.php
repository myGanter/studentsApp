@extends('app')

@section('content')
<table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Рдактирование</th>
            <th>Удаление</th>
        </tr>
        @foreach ($groups as $group)
            <tr>
                <td>{{$group->id}}</td>
                <td>{{$group->name}}</td>
                <td>{{$group->description}}</td>
                <td><button @click="id = {{$group->id}}; swapShow(); transformReq();" class="btn btn-warning">Рдактировать</button></td>
                <td>
                    <form action="{{ url('gro/'.$group->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>  
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('content2')  
    <form id="transform" action="{{ url('gro') }}" method="POST">      
        {{ csrf_field() }}
        <div class="form-group">
            <label for="na">Название</label>
            <input type="text" class="form-control" id="na" name="name">
        </div>
        <div class="form-group">
            <label for="descrip">Описание</label>
            <textarea class="form-control" rows="3" id="descrip" name="description"></textarea>
        </div> 
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection