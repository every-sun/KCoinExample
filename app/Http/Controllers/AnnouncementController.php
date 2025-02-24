<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index(){
        $announcements= Announcement::orderByDesc('created_at')->paginate(10); 
        return Inertia::render('Announcement/Index', [
            'announcements'=>$announcements
        ]);
    }

    public function create(){
        return Inertia::render('Announcement/Index');
    }

    public function destroy($id){
        $item = Announcement::destroy($id);
        return;
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required'],
            'content'=>['required'],
        ]);
        $item = Announcement::create($request->all());
        return;
    }
}
