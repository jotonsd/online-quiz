<?php

namespace App\Http\Controllers;

use App\Models\ExamCandidate;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;
use File;

class QuizController extends Controller
{

    public function index(){
        if (session('user_role')=='admin'){
            return view('admin.quiz-list')->with('quiz_list',Quiz::orderBy('id','desc')->get());
        }
        return view('user.quiz-list')->with('quiz_list',Quiz::join('questions','quizzes.id','=','questions.quiz_id')->distinct('quizzes.id')
            ->select('quizzes.id as quiz_id','quizzes.*')
            ->orderBy('id','desc')->get());
    }

    public function addQuiz(){
        return view('admin.add-quiz');
    }

    public function storeQuiz(Request $request){
        $request->validate([
            'title'=> ['required'],
            'from_time'    => ['required'],
            'to_time' => ['required'],
            'duration' => ['required'],
            'image' => ['required', 'mimes:jpg,jpeg,png', 'max:512', 'dimensions:min_width=735,min_height=490,max_width=745,max_height=500'],
            'description' => ['required'],
           ]);
        $max = Quiz::max('id')+1;
        $imageName ='quiz-'.$max.'.'.$request->image->extension();
        $request->image->move(public_path('img/quiz/'), $imageName);

        if (Quiz::create([
            'title'=>$request->title,
            'image'=>$imageName,
            'description'=>$request->description,
            'from_time'=>$request->from_time,
            'to_time'=>$request->to_time,
            'duration'=>$request->duration,
        ])){
            return redirect()->back()->with('success','Quiz: '.$request->title.' added successfully!');
        }
        return redirect()->back()->with('error','Quiz: '.$request->title.' was not added. Something wrong!');
    }

    public function editQuiz($id)
    {
        $data = array('data' => Quiz::findOrFail($id), );
        return view('admin.edit-quiz',$data);
    }

    public function updateQuiz(Request $request,$id){
        $request->validate([
            'title'=> ['required'],
            'from_time'    => ['required'],
            'to_time' => ['required'],
            'duration' => ['required'],
            'description' => ['required'],
           ]);

        $imageName = Quiz::where('id',$id)->value('image');

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['required', 'mimes:jpg,jpeg,png', 'max:512', 'dimensions:min_width=735,min_height=490,max_width=745,max_height=500'],
            ]);
            $previous_image = 'img/quiz/'.Quiz::where('id',$id)->value('image');
            File::delete($previous_image);

            $imageName ='quiz-'.$id.'.'.$request->image->extension();
            $request->image->move(public_path('img/quiz/'), $imageName);
        }

        if (Quiz::where('id',$id)->update([
            'title'=>$request->title,
            'image'=>$imageName,
            'description'=>$request->description,
            'from_time'=>$request->from_time,
            'to_time'=>$request->to_time,
            'duration'=>$request->duration,
        ])){
            return redirect()->route('add.quiz')->with('success','Quiz: '.$request->title.' updated successfully!');
        }
        return redirect()->route('add.quiz')->with('error','Quiz: '.$request->title.' was not updated. Something wrong!');
    }

    public function deleteQuiz($id)
    {
        if (Quiz::where('id',$id)->delete()){
            $previous_image = 'img/quiz/'.Quiz::where('id',$id)->value('image');
            File::delete($previous_image);
            return redirect()->back()->with('success','Quiz: '.$request->title.' deleted successfully!');
        }
        return redirect()->back()->with('error','Quiz: '.$request->title.' was not deleted. Something wrong!');
    }

    public function joinQuiz($id){

        if (count(ExamCandidate::where('quiz_id',$id)->where('user_id','=',session('user_id'))->get())>0){
            return redirect()->back()->with('error','You already participated this quiz');
        }

        if (time()>=strtotime(Quiz::where('id',$id)->value('to_time'))){
            return redirect()->back()->with('error','Quiz is no longer available');
        }
        if (time()<strtotime(Quiz::where('id',$id)->value('from_time'))){
            return redirect()->back()->with('error','Quiz is not available now. Wait for its availability ');
        }

        if (session('user_role')=='user'&&count(Result::where('quiz_id',$id)->where('user_id',session('user_id'))->get())>0){
            return redirect()->back()->with('error','You already participated this quiz');
        }

        ExamCandidate::create([
           'user_id'=>session('user_id'),
           'quiz_id'=>$id
        ]);

        return view('user.give-quiz')->with('quiz',Quiz::where('id',$id)->first())
            ->with('questions',Question::where('quiz_id',$id)->get())
            ->with('start_time',Carbon::now());
    }

}
