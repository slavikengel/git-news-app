@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Популярные новости</strong></div>
                    <div class="panel-body">
                        <a href="{{ route('news.create') }}"><button class="btn btn-primary">Добавить новость</button></a>
                        @foreach($news as $new)
                            <div class="border">
                                <h3 class="newsTitle">{{$new->title}}</h3>
                                <p class="newsData"> <b> Автор: </b> {{$new->user->name}}, <b>Создано:</b> {{$new->created_at}} </p>
                                <p>{!! $new->markdownContent !!}</p>
                                <a class="btn btn-primary" href="{{ route('news.edit',$new->id)}}" > Изменить</a>
                                <!-- Link news/destroy -->
                                <a class="btn btn-warning"   href="{{ route('news.destroy', $new->id) }}"
                                   onclick="event.preventDefault();
                               document.getElementById('{{'destroy-form' . $new->id}}').submit();">
                                    Удалить новость
                                </a>
                                <form id="destroy-form{{$new->id}}" action="{{ route('news.destroy', $new->id) }}"
                                      method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                                <!-- END Link news/destroy -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection