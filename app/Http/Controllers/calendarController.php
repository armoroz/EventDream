<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use \App\Models\appointment as appointment;
use \App\Models\venueevent as venueevent;
class CalendarController extends Controller 
{ 
    public function index() 
    { 
        return view('calendar.display');
    }
	
    public function vendisplay($venueid) 
    { 
        return view('calendar.display')->with('venueid',$venueid);
    }

	public function json()
	{
		//$this->view->disable();
		$content = Venueevent::all()->toJson();
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
		$content = Venueevent::where('venueid',$venueid)->get();
		//$content=$json_encode($events);
		return response($content)->withHeaders([
				'Content-Type' => 'application/json',
				'charset' => 'UTF-8'
			]);
	}
} 

			
?>