@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Добавление товара</strong></div>
                    <div class="panel-body">
                        <table class='table table-striped table-bordered table-hover'>
                            <thead>
                            <tr>
                                <th><strong>#</strong></th>
                                <th><strong>Заголовок</strong></th>
                                <th><strong>Текст</strong></th>
                                <th><strong>Дата создание</strong></th>
                                <th><strong>Обновления</strong></th>
                                <th><strong>Автор</strong></th>
                                <th><strong>Изменить</strong></th>
                                <th><strong>Удалить</strong></th>
                            </tr>
                            </thead>
                            @foreach($news as $new)
                                <tr>
                                    <th>{{$new->id}}</th>
                                    <th>{{$new->title}}</th>
                                    <th>{!! $new->markdownContent !!}</th>
                                    <th>{{$new->created_at}}</th>
                                    <th>{{$new->updated_at}}</th>
                                    <th>{{$new->user->name}}</th>
                                    <th><a href="{{ url('news/edit/' . $new->id)}}" > Изменить</a></th>
                                    <th><a href="{{ url('news/destroy/' . $new->id)}}" > Удалить</a></th>
                                </tr>
                            @endforeach
                        </table>



                            @foreach($news as $new)
                            <div style="padding: 5px; margin-bottom: 3px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.5);">
                            <h3>{{$new->title}}</h3>
                            <p>{!! $new->markdownContent !!}</p>
                            <p style="font-size: 15px">Автор: {{$new->user->name}} </p>
                            <p style="font-size: 10px">Создан: {{$new->created_at}} </p>
                            <a href="{{ url('news/edit/' . $new->id)}}" > Изменить</a>
                            <a href="{{ url('news/destroy/' . $new->id)}}" > Удалить</a>
                            </div>
                            @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection