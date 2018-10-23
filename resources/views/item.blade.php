@extends('app')

@section('content')
<table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Рдактирование</th>
            <th>Удаление</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>      
                <td><button @click="id = {{$item->id}}; swapShow(); transformReq();" class="btn btn-warning">Рдактировать</button></td>
                <td>
                    <form action="{{ url('ite/'.$item->id) }}" method="POST">
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
    <form id="transform" action="{{ url('ite') }}" method="POST">      
        {{ csrf_field() }}
        <div class="form-group">
            <label for="na">Название</label>
            <input type="text" class="form-control" id="na" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection