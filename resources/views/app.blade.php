<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Студенты App</title>        
        
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">    
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">       
    </head>

    <body>
        <div id="app">
            <div class="container">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col">            
                        <div id="tabs"> 
                            <div class="head">
                                <ul  class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a id="generalSummary" @click="setActive('generalSummary')" class="nav-link" href="{{ route('genSumm') }}">Общая сводка</a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="gro" @click="setActive('gro')" class="nav-link" href="{{ route('gro') }}">Группы</a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="stud" @click="setActive('stud')" class="nav-link" href="{{ route('stud') }}">Студенты</a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="inv" @click="setActive('inv')" class="nav-link" href="{{ route('ite') }}">Предметы</a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="asse" @click="setActive('asse')" class="nav-link" href="{{ route('rati') }}">Оценки</a>
                                    </li>
                                </ul>
                            </div>
        
                        </div>
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
          
        
        @include('errors')

        <div class="mainTable">
        @yield('content')
        </div> 

        <div class="formAdUp" id="AdUpForm">
            <div class="inputPole">
                <div class="inputContainer">
                    <div class="inputHeading">
                        Форма
                        <button @click="swapShow(); resetReq();" id="closWindow" class="btn btn-danger">
                            X
                        </button>
                        <div class="clear"></div>
                    </div>
                    <div class="inputContent">                
                        @yield('content2')
                    </div>
                </div>
            </div> 
            <div class="addBut">
                <button @click="swapShow()" id="addRecord" class="btn btn-outline-primary">{{ isset($show) ? 'Выбрать группу' : 'Добавить' }}</button>    
            </div>         
        </div>  
        </div>      
        <script src="{{ asset('js/app.js') }}"></script>        
    </body>
</html>
