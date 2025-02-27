<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function index(){
        $inquiries = Inquiry::withCount('answers')->orderByDesc('created_at')->paginate(20);
        return Inertia::render('Inquiry/Index', [
            'inquiries'=>$inquiries
        ]);
    }
    public function show($id){
        $item = Inquiry::with('answers')->findOrFail($id); 
        return Inertia::render('Inquiry/Show', [
            'inquiry'=> $item
        ]);
    }
    public function create(){
        return Inertia::render('Inquiry/Create');
    }

    public function edit($id){
        $item = Inquiry::findOrFail($id); 
        return Inertia::render('Inquiry/Create', [
            'inquiry'=> $item
        ]);
    }

    public function update($id, Request $request){
        $request->validate([
            'title' => ['required'],
            'content'=>['required'],
            'type'=>['required']
        ]);
        $item = Inquiry::findOrFail($id); 
        $item->update($request->all());
    }

    public function destroy($id){
        $item = Inquiry::destroy($id);
        return redirect()->route('inquiry.index');
    }
    
    public function store(Request $request){
        $request->validate([
            'title' => ['required'],
            'content'=>['required'],
            'type'=>['required']
        ]);
        $item = Inquiry::create($request->all());
    }
}
