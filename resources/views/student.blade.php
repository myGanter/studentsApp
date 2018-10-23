@extends('app')

@section('content')
<table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Группа</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Отчество</th>
            <th>Дата рождения</th>
            <th>Рдактирование</th>
            <th>Удаление</th>
        </tr>
        @foreach ($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{isset($student->group()->get()[0]->name) == true ? $student->group()->get()[0]->name : 'Группа удалена :('}}</td>   
                <td>{{$student->name}}</td>   
                <td>{{$student->surname}}</td>   
                <td>{{$student->patronymic}}</td>   
                <td>{{$student->date}}</td>       
                <td><button @click="id = {{$student->id}}; swapShow(); transformReq();" class="btn btn-warning">Рдактировать</button></td>
                <td>
                    <form action="{{ url('stud/'.$student->id) }}" method="POST">
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
    <form id="transform" action="{{ url('stud') }}" method="POST">      
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleSelect1">Группа</label>
            <select class="form-control" name="group_id">
                @foreach ($groups as $group)
                    <option value="{{$group->id}}">{{$group->name}}</option>          
                @endforeach                  
            </select>
        </div>   
        <div class="form-group">
            <label for="na">Имя</label>
            <input type="text" class="form-control" id="na" name="name">
        </div>
        <div class="form-group">
            <label for="na">Фамилия</label>
            <input type="text" class="form-control" id="na" name="surname">
        </div>
        <div class="form-group">
            <label for="na">Отчество</label>
            <input type="text" class="form-control" id="na" name="patronymic">
        </div>
        <div class="form-group">
            <label for="datePr">Дата рождения</label>
            <input type="date" class="form-control" id="datePr" name="date" placeholder="Дата" required>
        </div>  
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection