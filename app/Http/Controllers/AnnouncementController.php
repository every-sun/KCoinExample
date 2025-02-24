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
        $announcement = Announcement::find($id); 
        return Inertia::render('Announcement/Index', [
            'announcement'=> $announcement
        ]);
    }

    public function create(){
        return Inertia::render('Announcement/Index');
    }

    public function edit($id){
        // 수정 페이지로 이동
    }

    public function update($id){
        // 아이템 업데이트
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
        return Inertia::render('Announcement/Index', [
            'item'=> $item
        ]);
    }
}
