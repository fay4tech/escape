<?php

namespace App\Http\Controllers;

use App\Company;
use App\Room;
use Illuminate\Http\Request;
use App\Traits;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    use Traits\CalculateNote;
    /**
     * @var
     */
    private $table;

    /**
     * @var
     */
    private $counter;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * To Build index page
     */
    public function index(Request $request)
    {
        if (Auth::check() && auth()->user()->lvl > 8){
        $rooms = Room::where('name', 'like', "%$request->search%")->paginate(10);
        }else {
        $rooms = Room::where('activ','1')->where('name', 'like', "%$request->search%")->paginate(10);
        }
        $companies = Company::where('name', 'like', "%$request->search%")->paginate(10);
        $companies->forget(['id' => '0']); // remove N/A company from the collection
        return view('search.index', compact('rooms', 'companies'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * To build the filter page
     */
    public function searchFilter(Request $request)
    {
        $results = null;
        $lands = $this->land();
        $city = $this->city();

        if ($request->search != null)
        {

            if ($request->category1 == 'Select land'){
                return redirect('search/filter')->with('error','Please select the Land');
            }
            elseif ($request->category1 == 'Select'){
                return redirect('search/filter')->with('error','Please select the City');
            }
            elseif ($request->category1 == 'Select'){
                return redirect('search/filter')->with('error','Please select the choice');
            }
            elseif (($request->category3 === 'note' || $request->category3 === 'price') && !is_numeric($request->search)){
                Session::flash('message', 'You must enter a number for this search!!');
                Session::flash('alert-class', 'alert-danger');
                return view('search.filter', compact('results', 'search', 'lands', 'city', 'table'));
            }else{
                $search = $request->search;
                $results = ($this->filterS($request->category1, $request->category2, $request->category3, $request->search));
                $table = $this->table;
                $count = $this->counter;
                $column = $request->category3;
            }
        }
        return view('search.filter', compact('results', 'search', 'lands', 'city', 'table', 'count', 'column'));
    }

    /**
     * @return array
     * return all country 1 times for our select
     */
    public function land()
    {
        $land = [];
        $results = DB::table('companies')->select('country')->distinct()->get()->toArray();
        foreach ($results as $key => $result){
            if($key != 0){
                $land[] = $result->country;
            }
        }
        return $land;
    }

    /**
     * @return array
     * return all city for select
     */
    public function city()
    {
        $city = [];
        $results = Company::select('country', 'city')->distinct()->get();
        foreach ($results as $key => $result){
            if($result->country != null && $result->city != null){
                $city[] = array('land' => $result->country, 'city' => $result->city );
            }
        }
        return $city;
    }

    /**
     * @param $land
     * @param $city
     * @return array
     * make array with only id room  with land and city match
     */
    public function companyRoom($land, $city)
    {
        $room_id = '';
        $results = DB::table('companies')->where('country', '=', $land )->where('city', '=', $city)->get();
        foreach ($results as $result) {
            if(!isset($recherche)){
                $recherche = Company::find($result->id)->rooms()->get();
            }else{
                $recherche = $recherche->merge(Company::find($result->id)->rooms()->get());
            }
        }
        foreach ($recherche as $value){
            $room_id .= $value->id.',';
        }
        $room_id = substr($room_id, 0, -1);
        $room_id = explode(',', $room_id);
        return ($room_id);
    }


    /**
     * @param $land
     * @param $city
     * @param $column
     * @param $search
     * @return Collection|mixed
     */
    public function filterS($land, $city, $column, $search)
    {
        switch ($column){
            case 'price':
                $results = $this->price($land, $city, $search);
                $this->counter = count($results);
                $this->table = 'companies';
                break;
            case 'note':
                $results = $this->globalNote($land, $city, $search);
                $this->counter = count($results);
                $this->table = 'rooms';
                break;
            case 'word':
                $results = Room::where('activ','1')
                                                    ->whereIn('id', $this->companyRoom($land, $city) )
                                                    ->where('name', 'like', '%'.$search.'%')
                                                    ->orWhere('theme', 'like', '%'.$search.'%')
                                                    ->orWhere('pitch', 'like', '%'.$search.'%')
                                                    ->orWhere('avis', 'like', '%'.$search.'%')
                                                    ->orderBy('name')->get();
                $this->counter = count($results);
                $results = Room::whereIn('id', $this->companyRoom($land, $city) )
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('theme', 'like', '%'.$search.'%')
                    ->orWhere('pitch', 'like', '%'.$search.'%')
                    ->orWhere('avis', 'like', '%'.$search.'%')
                    ->orderBy('name')->get();
                $this->table = 'rooms';
                break;
            default:
                $results = Room::where('activ','1')->whereIn('id', $this->companyRoom($land, $city) )
                                                    ->where($column, 'like', '%'.$search.'%')
                                                    ->orderBy('name')->get();
                $this->table = 'rooms';
                break;
        }
        return $results;
    }


    /**
     * calculate the average mark of the rooms and return by Decreasing average
     * @param $land
     * @param $city
     * @param $search
     * @return mixed
     */
    public function globalNote($land, $city, $search)
    {
        $results = Room::whereIn('id', $this->companyRoom($land, $city))->get();
        foreach ($results as  $key => $result) {
            $result->note= $this->note(
                                    $result->immersion,
                                    $result->enigmas,
                                    $result->search,
                                    $result->enigmas_ench,
                                    $result->enigmas_quant,
                                    $result->enigmas_orig,
                                    $result->immersion_ambi,
                                    $result->immersion_hist,
                                    $result->divertissement,
                                    $result->note_mj    
        );
            $results[$key] = $result;
        }
        $results = $results->where('note', '>=', $search)->sortByDesc('note');
        return $results;
    }

    /**
     * @param $land
     * @param $city
     * @param $search
     * @return Collection
     * Find the lower price
     */
    public function price($land, $city, $search)

    {
        $price = (int)$search;
        $results = DB::table('companies')->where('country', '=', $land)
                                         ->where('city', '=', $city)
                                         ->where('pricemin', '<=', $price )
                                         ->orderBy('name')->get();
        return $results;
    }


}
