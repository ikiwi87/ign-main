<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::All();
        // dd($services);
        return view('be/service/list', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('be/service/add');
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
            'name' => 'required|max:500',
            'description' => 'required',
            'content' => 'required',
        ],[
            'name.required' =>'Please insert name',
            'description.required' =>'Please insert description',
            'content.required' =>'Please insert content',
        ]);
        $service = new Service();
        $service->name = $rq->name;
        $service->slug_name = str_slug($rq->name);
        $service->description = $rq->description;
        $service->content = $rq->content;
        $service->link = $rq->link;
        if ($rq->hasFile('image')) {
            $file = $rq->file('image');
            $name = $file->getClientOriginalName();
            $img = str_random(4)."-".$name;
            while (file_exists("upload/service/".$img)){
                $img = str_random(4)."-".$name;
            }
            $file->move("upload/service", $img);
            $service->image = $img;
        } else {
            $service->image = "";
        }
        
        $service->save();
        return redirect()->route('service_list')->with('msg','Add new service success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::Find($id);
        return view('be/service/edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $rq, $id)
    {
        $this->validate($rq,[
            'name' => 'required|max:500',
            'description' => 'required',
            'content' => 'required',
        ],[
            'name.required' =>'Please insert name',
            'description.required' =>'Please insert description',
            'content.required' =>'Please insert content',
        ]);
        $service = Service::find($id);
        $service->name = $rq->name;
        $service->slug_name = str_slug($rq->name);
        $service->description = $rq->description;
        $service->content = $rq->content;
        $service->link = $rq->link;
        if ($rq->HasFile('image')) {
            $file = $rq->file('image');
            $name = $file->getClientOriginalName();
            $img = $name."-".str_random(4);
            while (file_exists("upload/service/".$img)){
                $img = $name."-".str_random(4);
            }
            $file->move("upload/service", $img);
            unlink("upload/service/".$service->image);
            $service->image = $img;
        }
        $service->save();
        return redirect()->route('service_edit', $id)->with('msg','Update service success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::Find($id);
        $service->delete();
        return redirect()->route('service_list')->with('msg','Service deleted');
    }
}
