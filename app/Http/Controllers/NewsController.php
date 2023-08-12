<?php

namespace App\Http\Controllers;

use App\News;
use Auth;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::All();
        // dd($news);
        return view('be/news/list', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('be/news/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {
        $this->validate($rq,[
            'title' => 'required|max:500',
            'description' => 'required',
            'content' => 'required',
        ],[
            'title.required' =>'Please insert title',
            'description.required' =>'Please insert description',
            'content.required' =>'Please insert content',
        ]);
        $news = new News();
        $news->author = Auth::user()->id;
        $news->title = $rq->title;
        $news->slug_title = str_slug($rq->title);
        $news->description = $rq->description;
        $news->content = $rq->content;
        $news->link = $rq->link;
        $news->highlight = $rq->highlight;
        if ($rq->hasFile('image')) {
            $file = $rq->file('image');
            $name = $file->getClientOriginalName();
            $img = str_random(4)."-".$name;
            while (file_exists("upload/news/".$img)){
                $img = str_random(4)."-".$name;
            }
            $file->move("upload/news", $img);
            $news->image = $img;
        } else {
            $news->image = "";
        }
        
        $news->save();
        return redirect()->route('news_list')->with('msg','Add new blog success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::Find($id);
        return view('be/news/edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $rq, $id)
    {
        $this->validate($rq,[
            'title' => 'required|max:500',
            'description' => 'required',
            'content' => 'required',
        ],[
            'title.required' =>'Please insert title',
            'description.required' =>'Please insert description',
            'content.required' =>'Please insert content',
        ]);
        $news = News::find($id);
        $news->title = $rq->title;
        $news->slug_title = str_slug($rq->title);
        $news->description = $rq->description;
        $news->content = $rq->content;
        $news->link = $rq->link;
        $news->highlight = $rq->highlight;
        if ($rq->HasFile('image')) {
            $file = $rq->file('image');
            $name = $file->getClientOriginalName();
            $img = $name."-".str_random(4);
            while (file_exists("upload/news/".$img)){
                $img = $name."-".str_random(4);
            }
            $file->move("upload/news", $img);
            unlink("upload/news/".$news->image);
            $news->image = $img;
        }
        $news->save();
        return redirect()->route('news_edit', $id)->with('msg','Update blog success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::Find($id);
        $news->delete();
        return redirect()->route('news_list')->with('msg','News deleted');
    }
}
