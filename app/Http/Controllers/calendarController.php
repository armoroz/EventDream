<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use \App\Models\appointment as appointment;
class CalendarController extends Controller 
{ 
    public function index() 
    { 
        return view('calendar.display'); 
    } 
	public function json()
	{
    //$this->view->disable();
    $content = Appointment::all()->toJson();
    //$content=$json_encode($events);
    return response($content)->withHeaders([
            'Content-Type' => 'application/json',
            'charset' => 'UTF-8'
        ]);
	}
} 

			
?>