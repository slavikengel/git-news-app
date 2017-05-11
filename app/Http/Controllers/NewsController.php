<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    /**
     * Распределение ролей
     */
    public function __construct()
    {
        $this->middleware('gate:moderator',[
            'only' => ['create', 'edit', 'store', 'update']
        ]);
        $this->middleware('gate:admin',[
            'only' => ['destroy']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news/index');
    }


    /**
     * Форма для создание нового ресурса.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news/forms/create');
    }

    /**
     * Создание нового ресурса.
     *
     * @param \App\Http\Requests\NewsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $user = Auth::user();
        $user->news()->create($request->all());
        return redirect('news/show');
    }

    /**
     * Вывод ресурса из БД на экран
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $news = News::all();
        return view('news/show', compact('news'));
    }

    /**
     * Вывод формы для редактирование опредеенного ресурса
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('news/forms/edit', compact('news'));
    }

    /**
     * Обновление отредактированного ресурса и сохранение в БД
     *
     * @param \App\Http\Requests\NewsRequest $request, $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $news = News::find($id);
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->update();
        return redirect('news/show');
    }

    /**
     * Удаление определенного ресурса из БД
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteNew = News::find($id);
        $deleteNew->delete();
        return redirect('news/show');
    }
}
