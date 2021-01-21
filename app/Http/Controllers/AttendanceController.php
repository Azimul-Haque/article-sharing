<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Attendance;

class AttendanceController extends Controller
{
    public function test(Request $request) 
    {
        // $visit = new Attendance;
        // $visit->data = json_encode($request->post());
        // $visit->save();

        // $visits = Attendance::orderBy('id', 'desc')->get();
        
        return 'GET OPTION FROM: '. $request->SN .'\n
                ATTLOGStamp=None\n
                OPERLOGStamp=9999\n
                ATTPHOTOStamp=None\n
                ErrorDelay=60\n
                Delay=30\n
                TransTimes=00: 00;14: 05\n
                TransInterval=1\n
                TransFlag=TransData AttLog\n
                TimeZone=6\n
                Realtime=1\n
                Encrypt=None';
        // return redirect('/iclock/getrequest?SN=' . $request->SN);
        // return view('attendance.index')->withVisits($visits);
    }

    public function testPost(Request $request) 
    {
        // $visit = new Attendance;
        // $visit->data = json_encode($request->all());
        // $visit->save();

        // $visits = Attendance::orderBy('id', 'desc')->get();
        
        return 'OK';
        // return view('attendance.index')->withVisits($visits);
    }

    public function test2(Request $request) 
    {
    	// $visit = new Attendance;
    	// $visit->data = json_encode($request->all());
    	// $visit->save();

    	// $visits = Attendance::orderBy('id', 'desc')->get();
    	
    	return 1;
    	// return view('attendance.index')->withVisits($visits);
    }
}
