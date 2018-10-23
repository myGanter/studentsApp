@extends('app')

@section('content')  
    @if ($show)  
        <h1 class="groupName">{{ $chooseGroup->name }}</h1>
        <table class="table table-striped">      
            <tr>
                <th>ФИО</th>
                <th>Предмет</th>
                <th>Средняя оценка</th>            
            </tr>
            @foreach ($students as $student) 
                @foreach ($student->summary as $key => $value)
                    <tr>    
                        <td class="{{$student->getCssClass($key)}}">{{$student->name}}</td>
                        <td>{{$key}}</td>
                        <td>{{$value}}</td>
                    </tr>
                @endforeach 
            @endforeach              
        </table>
    @endif
@endsection

@section('content2')
    <form id="transform" action="{{ url('genSumm') }}" method="POST">      
        {{ csrf_field() }}

        <div class="form-group">
            <label for="exampleSelect1">Группы</label>
            <select v-on:input="resetList()" id="GRO" class="form-control" name="id">
                @foreach ($groups as $group)
                    <option value="{{$group->id}}">{{$group->name}}</option>          
                @endforeach                  
            </select>
        </div>          
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection