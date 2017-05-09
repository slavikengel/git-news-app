<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.forms.create');
    }

    /**
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $news = News::all();
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
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
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
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
