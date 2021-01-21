<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Charioteer;
use App\Charioteerreport;
use App\Charioteermessage;

use Session, Auth;
use OneSignal;

class OneSignalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('sendPush', 'broadcast', 'postQstnAPI', 'reportQstnAPI', 'contactAPI');
    }

    public function index()
    {
        $charioteers = Charioteer::orderBy('id', 'desc')->paginate(7);
        $reports = Charioteerreport::orderBy('id', 'desc')->get();
        $messages = Charioteermessage::orderBy('id', 'desc')->get();

        return view('dashboard.charioteer.index')
                            ->withCharioteers($charioteers)
                            ->withReports($reports)
                            ->withMessages($messages);
    }

    public function searchNow(Request $request)
    {
        
        $charioteers = Charioteer::where('question', 'like', "%{$request->q}%")
                                 ->orWhere('answer', 'like', "%{$request->q}%")
                                 ->orWhere('incanswer', 'like', "%{$request->q}%")
                                 ->orderBy('id', 'desc')->paginate(7);

        $reports = Charioteerreport::orderBy('id', 'desc')->get();  
        $messages = Charioteermessage::orderBy('id', 'desc')->get();

        return view('dashboard.charioteer.index')
                            ->withCharioteers($charioteers)
                            ->withReports($reports)
                            ->withMessages($messages);
    }

    public function storeQA(Request $request)
    {
        $this->validate($request,array(
            'question'       => 'required|max:255',
            'answer'         => 'required|max:255',
            'option1'        => 'required|max:255',
            'option2'        => 'required|max:255',
            'option3'        => 'required|max:255'
        ));

        $charioteer = new Charioteer();
        $charioteer->question = $request->question;
        $charioteer->answer = $request->answer;
        $charioteer->incanswer = $request->option1 .','. $request->option2 .','. $request->option3;

        $charioteer->save();

        Session::flash('success', 'Added Successfully!');
        return redirect()->route('dashboard.onesignal');
    }

    public function updateQA(Request $request, $id)
    {
        $this->validate($request,array(
            'question'       => 'required|max:255',
            'answer'         => 'required|max:255',
            'option1'        => 'required|max:255',
            'option2'        => 'required|max:255',
            'option3'        => 'required|max:255'
        ));

        $charioteer = Charioteer::findOrFail($id);
        $charioteer->question = $request->question;
        $charioteer->answer = $request->answer;
        $charioteer->incanswer = $request->option1 .','. $request->option2 .','. $request->option3;
        
        $charioteer->save();

        Session::flash('success', 'Updated Successfully!');
        return redirect()->back();
        // return redirect()->route('dashboard.onesignal');
    }

    public function approveQA(Request $request, $id)
    {
        $this->validate($request,array(
            'question'       => 'required|max:255',
            'answer'         => 'required|max:255'
        ));

        $charioteer = Charioteer::findOrFail($id);
        $charioteer->status = 1;
        $charioteer->question = $request->question;
        $charioteer->answer = $request->answer;
        

        $charioteer->save();

        Session::flash('success', 'Updated Successfully!');
        return redirect()->route('dashboard.onesignal');
    }

    public function unapproveQA(Request $request, $id)
    {
        $charioteer = Charioteer::findOrFail($id);
        $charioteer->status = 0;
        $charioteer->save();

        Session::flash('success', 'Updated Successfully!');
        return redirect()->route('dashboard.onesignal');
    }

    public function delQA($id)
    {
        $charioteer = Charioteer::findOrFail($id);
        $charioteer->delete();

        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.onesignal');
    }

    public function delReport($id)
    {
        $report = Charioteerreport::findOrFail($id);
        $report->delete();

        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.onesignal');
    }

    public function delMessage($id)
    {
        $message = Charioteermessage::findOrFail($id);
        $message->delete();

        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.onesignal');
    }

    public function sendPush()
    {
        $charioteer = Charioteer::inRandomOrder()
                                ->where('status', 1)
                                ->first();
        $charioteer->count = $charioteer->count + 1;
        $charioteer->save();

        OneSignal::sendNotificationToAll(
            "উত্তর দেখতে নোটিফিকেশনে ক্লিক করুন",
            $url = null, 
            $data = array("answer" => $charioteer->answer),
            $buttons = null, 
            $schedule = null,
            $headings = $charioteer->question
        );

        Session::flash('success', 'Sent Successfully!');
        if(Auth::check()) {
            return redirect()->route('dashboard.onesignal');
        } else {
            return '200';
        }
    }

    public function sendUpdate(Request $request)
    {
        $this->validate($request,array(
            'heading'       => 'required|max:255',
            'subtitle'      => 'required|max:255'
        ));

        OneSignal::sendNotificationToAll(
            $request->subtitle,
            $url = null, 
            $data = array("update" => "update"),
            $buttons = null, 
            $schedule = null,
            $headings = $request->heading
        );

        Session::flash('success', 'Sent Successfully!');
        if(Auth::check()) {
            return redirect()->route('dashboard.onesignal');
        } else {
            return '200';
        }
    }

    public function broadcast(Request $request)
    {
        $questions = collect();
        if($request->api_key == 'rifat2020' && $request->last_id > -1) { // -1 karon, jokhon size 0 dibe tokhon jeno kaaj kore
            $questionscount = Charioteer::where('status', 1)->count();
            if($questionscount > (int) $request->last_id) {
                // dd($request->last_id);
                $questions = Charioteer::where('status', 1)
                                       ->orderBy('id', 'desc')->take($questionscount - (int) $request->last_id)->get();
                $questions = $questions->reverse()->values();
            }
        }
        print(json_encode($questions));
    }

    public function testJson()
    {
        // $arrayaa = ['aaa', 'bbb', 'ccc'];
        // $arrayaas = serialize($arrayaa);
        
        // $unaaa = unserialize($arrayaas);
        $testaa = "A,B,C";
        $tesarray = explode(",", $testaa);
        dd($tesarray);
    }

    public function postQstnAPI(Request $request)
    {
        $this->validate($request,array(
            'question'       => 'required|max:255',
            'answer'         => 'required|max:255'
        ));

        $charioteer = new Charioteer;
        $charioteer->status = 0; // as users send this...
        $charioteer->question = $request->question;
        $charioteer->answer = $request->answer;
        $charioteer->save();

        return response()->json([
            'success' => true,
            'question' => $request->question,
            'answer' => $request->answer,
        ]);
    }

    public function reportQstnAPI(Request $request)
    {
        $this->validate($request,array(
            'question'       => 'required|max:255',
            'answer'         => 'required|max:255',
            'report'         => 'sometimes|max:255'
        ));

        $report = new Charioteerreport;
        $report->question = $request->question;
        $report->answer = $request->answer;
        $report->report = $request->report;
        $report->save();

        return response()->json([
            'success' => true
        ]);
    }

    public function contactAPI(Request $request)
    {
        $this->validate($request,array(
            'name'        => 'required|max:255',
            'email'       => 'required|max:255',
            'message'     => 'required|max:255'
        ));

        $message = new Charioteermessage;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();

        return response()->json([
            'success' => true
        ]);
    }
}
