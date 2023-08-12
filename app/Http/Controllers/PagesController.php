<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\News;
use App\Project;
use App\Project_type;
use App\Service;
use App\Contact;
use DB;

class PagesController extends Controller
{
    function __construct() 
    {
        $news = News::where('highlight', 1)->orderBy('id','DESC')->take(5)->get();
        // dd($categories);
        view::share(['news'=>$news]);
    }

    public function index()
    {
        $provinces = DB::table('province')->orderBy('type')->get();
        // $schools = School::all();
        // dd($provinces);
        return view('fe/layouts/index', compact('provinces'));
    }

    public function about()
    {
        $news = News::orderBy('id', 'DESC')->paginate(4);
        return view('fe/pages/about_us', compact('news'));
    }

    public function project()
    {
        $types = Project_type::all();
        $projects = Project::all();
        return view('fe/pages/project', compact('projects', 'types'));
    }

    public function project_detail($id)
    {
        $project = Project::find($id);
        $projects = Project::orderBy('id', 'DESC')->paginate(4);
        return view('fe/pages/project_detail', compact('project', 'projects'));
    }

    public function news()
    {
        $news = News::orderBy('id', 'DESC')->paginate(21);
        return view('fe/pages/news', compact('news'));
    }

    public function news_detail($id)
    {
        $new = News::find($id);
        $other_news = News::orderBy('id', 'DESC')->paginate(4);
        return view('fe/pages/news_detail', compact('other_news', 'new'));
    }

    public function service()
    {
        $services = Service::orderBy('id', 'DESC')->paginate(21);
        return view('fe/pages/service', compact('services'));
    }

    public function service_detail($id)
    {
        $service = Service::find($id);
        $other_service = Service::orderBy('id', 'DESC')->paginate(4);
        return view('fe/pages/service_detail', compact('other_service', 'service'));
    }

    public function contact()
    {
        $news = News::orderBy('id', 'DESC')->paginate(4);
        return view('fe/pages/contact_us', compact('news'));
    }

    public function store_contact(Request $rq)
    {
        $contact = new Contact();
        $contact->name = $rq->name;
        $contact->email = $rq->email;
        $contact->message = $rq->message;
        // dd($contact);
        $contact->save();
        return redirect()->back()->with('msg', 'Send message success!');
    }
}
