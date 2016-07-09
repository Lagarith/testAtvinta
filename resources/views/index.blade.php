@extends('layouts.default')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">Новая запись</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/') }}">
                        {{ csrf_field() }}
                        <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{Auth::id()}}">
                        <label for="title" class="col-md-1 control-label">Заголовок:</label>
                            <div class="col-md-12">
                                <input id="title" type="text" class="form-control" name="title">
                            </div>                                                                  
                                                                       
                        <label for="title" class="col-md-1 control-label">Текст:</label>
                            <div class="col-md-12">
                                <textarea name="text" class="form-control" rows="16"></textarea>
                            </div>
                        
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-2">
                                </br><p><b>Удалить через:</b></p>
                                <input type="radio" name="add_time" value="{{0}}">Не удалять</br>
                                <input type="radio" name="add_time" value="{{60*5}}">Через 5 минут</br>
                                <input type="radio" name="add_time" value="{{60*60}}" checked>Через 1 час</br>
                                <input type="radio" name="add_time" value="{{60*60*3}}">Через 3 часа</br>
                                <input type="radio" name="add_time" value="{{60*60*24*7}}">Через 1 неделю</br>
                                <input type="radio" name="add_time" value="{{60*60*24*30}}">Через 1 месяц</br>
                            </div>
                            <div class="col-md-3">
                                </br><p><b>Доступ:</b></p>
                                <input type="radio" name="access_status" value="1" checked>Всем пользователям</br>
                                <input type="radio" name="access_status" value="2">Только по ссылке</br>
                                @if (Auth::guest())
                                    <input type="radio" name="access_status" value="3" disabled><i>Только мне (нужно <a href="{{ url('/login') }}">войти</a> или <a href="{{ url('/register') }}">зарегестрироваться</a>)</br>
                                        @else
                                            <input type="radio" name="access_status" value="3">Только мне</br>
                                @endif                                                                
                            </div>
                            <div class="col-md-3">
                                </br><p><b>Тип текста:</b></p>
                                <input type="radio" name="lang" value="0" checked>Просто текст</br>
                                <input type="radio" name="lang" value="1">ЯП или типа того</br>
                            </div>
                        </div>                      
                        
                            
                        
                        
                        
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-5">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-floppy-o"></i>Сохранить
                                    </button>
                                </div>
                            </div>
                                               
                    </form>
                    
                    @if(Session::has('message'))
                    {{Session::get('message')}}
                    @endif                    
                    
                </div>
            </div>
        </div>
        
        
            
            <form class="form-horizontal" role="form" method="POST" action="/search">
                {{ csrf_field() }}
                <div class="col-md-3">
                    <input class="form-control" type="text" name="Result" placeholder="Что искать?" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fa-btn"></i>Поиск
                </button>
                
            </form>
                <div class="col-md-4"></br>
                    
            <div class="panel panel-default">
                <div class="panel-heading">Последние 10</div>
                <div class="panel-body">
                    <?php $i = 0; ?>
                    <?php //dd($messages); ?>
                    @foreach ($messages as $message)
                        <?php $i++;?>
                        
                        <h4><a href="/{{ $message->slug, ['id'=>$message->id] }}">{{$message->title}}</a></h4>
                        <small>Дата статьи: {{$message->created_at}}</small>
                        @if ($i === 8) @break;
                        @endif
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
    
@stop