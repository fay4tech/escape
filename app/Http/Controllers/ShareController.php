<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Builder;

class ShareController extends Controller
{
    protected $data;

    public function index(){

            $rooms = Room::where('activ', '1')->select('id', 'dispo_id', 'name','positive', 'negative', 'company_id')->get();            
            $companies = Company::all();
            $enseigne = null;
            foreach ($rooms as $room) { 
                $note = $this->getNote($room->id);
                $room->company_name = $this->getCompany($room->company_id);
                $room->company_region = $this->getRegion($room->company_id);
                $room->note_i = round($note['i'], 2);
                $room->note_e = round($note['e'], 2);
                $room->note_g = round($note['g'], 2);
                $room->url = route('rooms.show', $room->id);
            }
            $this->data = $room;
            return view('share.index', compact('rooms', 'companies'));
    }


    public function show(Request $request){

        $rooms = Room::where('activ', '0')->get();            
        $companies = Company::all();
        $enseigne = null;
        if(Auth::check() && Auth::user()->lvl == 10){   
            foreach ($rooms as $room) { 
                $note = $this->getNote($room->id);
                $room->company_name = $this->getCompany($room->company_id);
                $room->note_i = round($note['i'], 2);
                $room->note_e = round($note['e'], 2);
                $room->note_g = round($note['g'], 2);
                $room->url = route('rooms.show', $room->id);
            }
            $this->data = $rooms;
            return view('share.show', compact('rooms', 'companies'));
        }else{
            return redirect()->back()->with("error","vous n'êtes pas Super Admin!!.");/*Your are not Super Admin*/
        }
        
}


    private function getNote($id){
        $room = Room::find($id);
        $note['i'] = ($room->immersion + $room->immersion_ambi + $room->immersion_hist)/3 * 2;
        $note['i'] = round($note['i']);
        $note['e'] = ($room->enigmas + $room->enigmas_ench + $room->enigmas_quant + $room->enigmas_orig)/4 * 2;
        $note['e'] = round($note['e']);
        $note['g'] = ( $room->immersion + $room->enigmas + $room->search + $room->enigmas_ench + $room->enigmas_quant + $room->enigmas_orig + $room->immersion_ambi + $room->immersion_hist + $room->divertissement + $room->note_mj) /10 * 2;
        $note['g'] = round($note['g']);
        return $note;
    }

    private function getCompany($id){
        $company = Company::find($id);
        $name = $company->name;
        return $name;
    }
    private function getRegion($id){
        $company = Company::find($id);
        $name = $company->region;
        return $name;
    }

    public function getJson(){
        $data = $this->setJson();
        return response()->json($data, 200);
    }
    private function setJson(){
        $data = $this->index();
        return ($data->rooms);        
    }
    
}
