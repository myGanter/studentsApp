@extends('app')

@section('content')
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Группа</th>
            <th>ФИО</th>
            <th>Предмет</th>
            <th>Оценка</th>
            <th>Рдактирование</th>
            <th>Удаление</th>            
        </tr>
        @foreach ($groups as $group)                               
            @foreach ($group->students()->get() as $stud)                                
                @foreach ($stud->ratings()->get() as $rating)   
                    @if (isset($rating->item()->get()[0]->name))
                        <tr>
                            <td>{{$rating->id}}</td> 
                            <td>{{$group->name}}</td>  
                            <td>{{$stud->name.' '.$stud->surname.' '.$stud->patronymic}}</td>                        
                            <td>{{$rating->item()->get()[0]->name}}</td>                    
                            <td>{{$rating->assessment}}</td>
                            <td><button @click="id = {{$rating->id}}; swapShow(); transformReq();" class="btn btn-warning">Рдактировать</button></td>
                            <td>
                                <form action="{{ url('rati/'.$rating->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>  
                            </td>
                        </tr> 
                    @endif
                @endforeach                   
            @endforeach       
        @endforeach        
    </table>
@endsection

@section('content2') 
    <form id="transform" action="{{ url('rati') }}" method="POST">      
        {{ csrf_field() }}

        <div class="form-group">
            <label for="exampleSelect1">Группы</label>
            <select v-on:input="resetList()" id="GRO" class="form-control">
                @foreach ($groups as $group)
                    <option value="{{$group->id}}">{{$group->name}}</option>          
                @endforeach                  
            </select>
        </div>  

        @foreach ($groups as $group)
            <div v-if="group == {{$group->id}}" class="form-group">
                <label for="exampleSelect1">Студенты</label>
                <select v-on:input="writte()" class="form-control" name="student_id">
                    @foreach ($group->students()->get() as $stud)
                        <option value="{{$stud->id}}">{{$stud->name.' '.$stud->surname.' '.$stud->patronymic}}</option>          
                    @endforeach                  
                </select>
            </div> 
        @endforeach   

        <div class="form-group">
            <label for="exampleSelect1">Предмет</label>
            <select class="form-control" name="item_id">
                @foreach ($items as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>          
                @endforeach                  
            </select>
        </div>   
        
        <div class="form-group">
            <label for="na">Оценка</label>
            <input type="number" class="form-control" min="1" max="5" required name="assessment">
        </div>        
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection