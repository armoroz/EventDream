<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use \App\Models\appointment as appointment;
use \App\Models\venueevent as venueevent;
use \App\Models\venue;
class CalendarController extends Controller 

{ 
    public function index() 
    { 
        return view('calendar.display');
    }
	
    public function vendisplay($venueid) 
    { 
		$venue = venue::find($venueid);
        return view('calendar.display')->with('venueid',$venueid)->with('venue',$venue);
    }

	public function json()
	{
		//$this->view->disable();
		$content = venueevent::all()->toJson();
		//$content=$json_encode($events);
		return response($content)->withHeaders([
				'Content-Type' => 'application/json',
				'charset' => 'UTF-8'
			]);
	}
	
	/*public function json($venueID)
	{
		$events = Venueevent::where('venueid', $venueID)->get();
		$content = $events->toJson();
		return response($content)->withHeaders([
			'Content-Type' => 'application/json',
			'charset' => 'UTF-8'
		]);
	}*/
	
	
	public function venuejson($venueid)
	{
		//$this->view->disable();
		$content = venueevent::where('venueid',$venueid)->get();
		//$content=$json_encode($events);
		return response($content)->withHeaders([
				'Content-Type' => 'application/json',
				'charset' => 'UTF-8'
			]);
	}
} 

			
?>