<?php

namespace App\Http\Controllers;

use App\Project;
use App\Image;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::All();
        // dd($projects);
        return view('be/project/list', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('be/project/add');
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
            'info' => 'required',
        ],[
            'title.required' =>'Please insert title',
            'description.required' =>'Please insert description',
            'info.required' =>'Please insert info',
        ]);
        $project = Project::create();
        $project->title = $rq->title;
        $project->slug_title = str_slug($rq->title);
        $project->description = $rq->description;
        $project->info = $rq->info;
        $project->link = $rq->link;
        $project->client = $rq->client;
        $project->highlight = $rq->highlight;
        if ($rq->hasFile('image')) {
            $file = $rq->file('image');
            $name = $file->getClientOriginalName();
            $img = str_random(4)."-".$name;
            while (file_exists("upload/project/".$img)){
                $img = str_random(4)."-".$name;
            }
            $file->move("upload/project", $img);
            $project->image = $img;
        } else {
            $project->image = "";
        }
        
            foreach ($rq->list_image as $value) {
                $image = new Image();
                $image->project_id = $project->id;
                if ($rq->hasFile('list_image')) {
                    $file = $value;
                    $name = $file->getClientOriginalName();
                    $img = $name;
                    while (file_exists("upload/project_image/".$img)){
                        $img = str_random(4)."-".$name;
                    }
                    $file->move("upload/project_image/", $img);
                    $image->image = $img;
                } else {
                    $image->file = '';
                }
                // dd($file->getClientOriginalExtension());
                $image->save();
            }
        // dd($project);
        
        $project->save();
        return redirect()->route('project_list')->with('msg','Add new project success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::Find($id);
        return view('be/project/edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $rq, $id)
    {
        $this->validate($rq,[
            'title' => 'required|max:500',
            'description' => 'required',
            'info' => 'required',
        ],[
            'title.required' =>'Please insert title',
            'description.required' =>'Please insert description',
            'info.required' =>'Please insert info',
        ]);
        $project = Project::find($id);
        $project->title = $rq->title;
        $project->slug_title = str_slug($rq->title);
        $project->description = $rq->description;
        $project->info = $rq->info;
        $project->link = $rq->link;
        $project->client = $rq->client;
        $project->highlight = $rq->highlight;
        if ($rq->HasFile('image')) {
            $file = $rq->file('image');
            $name = $file->getClientOriginalName();
            $img = $name."-".str_random(4);
            while (file_exists("upload/project/".$img)){
                $img = $name."-".str_random(4);
            }
            $file->move("upload/project", $img);
            unlink("upload/project/".$project->image);
            $project->image = $img;
        }
        $project->save();
        return redirect()->route('project_edit', $id)->with('msg','Update project success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::Find($id);
        $project->delete();
        return redirect()->route('project_list')->with('msg','News deleted');
    }
}
