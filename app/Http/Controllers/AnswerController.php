<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Inquiry;

class AnswerController extends Controller
{
    public function store($inquiryId, Request $request){
        $request->validate([
            'content'=>['required']
        ]);
        
        $inquiry = Inquiry::findOrFail($inquiryId);

        $item = new Answer();
        $item->content = $request->input('content');
        $item->inquiry_id = $inquiry->id;
        $item->save();
    }

    public function update($inquiryId, $id, Request $request){
        $request->validate([
            'content'=>['required']
        ]);
        $item = Answer::findOrFail($id);
        $item->content = $request->input('content');
        $item->save();
    }

    public function destroy($inquiryId, $id, Request $request){
        $item = Answer::destroy($id);
    }
}
