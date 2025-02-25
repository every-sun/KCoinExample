<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index(){
        $announcements= Announcement::orderByDesc('created_at')->paginate(20); 
        return Inertia::render('Announcement/Index', [
            'announcements'=> $announcements
        ]);
    }

    public function show($id){
        $item = Announcement::findOrFail($id); 
        return Inertia::render('Announcement/Show', [
            'announcement'=> $item
        ]);
    }

    public function create(){
        return Inertia::render('Admin/Announcement/Create');
    }

    public function edit($id){
        $item = Announcement::findOrFail($id); 
        return Inertia::render('Admin/Announcement/Create', [
            'announcement'=> $item
        ]);
    }

    public function update($id, Request $request){
        $request->validate([
            'title' => ['required'],
            'content'=>['required'],
        ]);
        $item = Announcement::findOrFail($id); 
        $item->update($request->all());
    }

    public function destroy($id){
        $item = Announcement::destroy($id);
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required'],
            'content'=>['required'],
        ]);
        $item = Announcement::create($request->all());
    }
}
