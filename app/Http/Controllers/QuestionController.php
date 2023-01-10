<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function addQuestion($id){
        return view('admin.add-questions')->with('quiz_list',Quiz::where('id',$id)->first())
            ->with('questions',Question::where('quiz_id',$id)->get())
            ->with('quiz_id',$id);
    }

    public function storeQuestion(Request $request){
        if (Question::create([
            'quiz_id'=>$request->quiz_id,
            'Question'=>$request->question,
            'option_a'=>$request->option_a,
            'option_b'=>$request->option_b,
            'option_c'=>$request->option_c,
            'option_d'=>$request->option_d,
            'correct_option'=>$request->correct_option,
        ])){
            return redirect()->back()->with('success','Question added successfully!');
        }
        return redirect()->back()->with('error','Something wrong!');
    }

    public function editQuestion($id){
        $data = array('data' => Question::findOrFail($id), );
        return view('admin.edit-question',$data);
    }

    public function updateQuestion(Request $request,$id){
        if (Question::where('id',$id)->update([
            'quiz_id'=>$request->quiz_id,
            'Question'=>$request->question,
            'option_a'=>$request->option_a,
            'option_b'=>$request->option_b,
            'option_c'=>$request->option_c,
            'option_d'=>$request->option_d,
            'correct_option'=>$request->correct_option,
        ])){
            return redirect()->route('add.question',$request->quiz_id)->with('success','Question updated successfully!');
        }
        return redirect()->route('add.question',$request->quiz_id)->with('error','Something wrong!');
    }

    public function deleteQuestion($id)
    {
        $quiz_id = Question::where('id',$id)->value('quiz_id');
        if (Question::where('id',$id)->delete()){
            return redirect()->route('add.question',$quiz_id)->with('success','Question deleted successfully!');
        }
        return redirect()->route('add.question',$quiz_id)->with('error','Something wrong!');
    }

}
