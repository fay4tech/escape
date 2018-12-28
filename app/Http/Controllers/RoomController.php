<?php
/**
 * Copyright  Faycal.(c) 2018.
 */

namespace App\Http\Controllers;


use App\Room;
use App\Company;
use App\Traits;
use App\Forms\RoomForm;
use DateTime;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Support\Facades\Auth;

/**
 * Class RoomController
 * @package App\Http\Controllers
 */
class RoomController extends Controller
{
    /**
     * @var FormBuilder
     */
    private $formBuilder;


    use Traits\StoreImageTrait;
    use Traits\CalculateNote;

    /**
     * RoomController constructor.
     * @param FormBuilder $formBuilder
     */
    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(config('app.locale'));
        //for the 5 best views in rooms
        $bestViews = Room::orderby('views', 'desc')->take('10')->get();
        //for the 5 best globalNote in rooms
        $notes = $this->globalNotes()->all();
        $bestNotes =  $this->globalNotes()->sortByDesc('globalNote')->take(10);
        // for show 11 rooms
        if(Auth::check() && auth()->user()->lvl > 8){
            $rooms = Room::orderBy('id', 'desc')->paginate(11);
        }else{
            $rooms = Room::where('activ', '=', 1)->orderBy('id', 'desc')->paginate(11);
        }
        $toutes = 'disabled';
        $division = $this->division();
        return view('rooms.index', compact('rooms', 'bestViews', 'bestNotes', 'notes', 'admintoguest', 'toutes', 'division'));
    }
    
    
    public function adminToGuest()
    {
        //for the 10 best views in rooms
        $bestViews = Room::orderby('views', 'desc')->take('10')->get();
        //for the 10 best globalNote in rooms
        $notes = $this->globalNotes()->all();
        $bestNotes =  $this->globalNotes()->sortByDesc('globalNote')->take(10);
        // for show 11 rooms
        $rooms = Room::where('activ', '=', 1)->orderBy('id', 'desc')->paginate(11);
        $admintoguest = 1;
        $visible = 'disabled';
        $division = $this->division();
        return view('rooms.index', compact('rooms', 'bestViews', 'bestNotes', 'notes', 'admintoguest', 'visible', 'division'));
    }
    public function adminOnlyHiden()
    {
        //for the 10 best views in rooms
        $bestViews = Room::orderby('views', 'desc')->take('10')->get();
        //for the 10 best globalNote in rooms
        $notes = $this->globalNotes()->all();
        $bestNotes =  $this->globalNotes()->sortByDesc('globalNote')->take(10);
        // for show 11 rooms
        $rooms = Room::where('activ', '=', 0)->orderBy('id', 'desc')->paginate(11);
        $admintoguest = 2;
        $hiden = 'disabled';
        $division = $this->division();
        return view('rooms.index', compact('rooms', 'bestViews', 'bestNotes', 'notes', 'admintoguest', 'hiden', 'division'));
    }

    /**
     * Display the specified resource.
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        switch ($room->lvl) {
            case 0:
                $roomLvl =__('Très Facile');
            break;

            case 1:
                $roomLvl = __('Facile');
                break;

            case 2:
                $roomLvl = __('Normal');
                break;

            case 3:
                $roomLvl = __('Dur');
                break;

            case 4:
                $roomLvl = __('Très dur');
                break;
            case 5:
                $roomLvl = __('Personnalisable');
                break;
        }
        
        $globalNotes = $this->note(
                                    $room->immersion,
                                    $room->enigmas,
                                    $room->search,
                                    $room->enigmas_ench,
                                    $room->enigmas_quant,
                                    $room->enigmas_orig,
                                    $room->immersion_ambi,
                                    $room->immersion_hist,
                                    $room->divertissement,
                                    $room->note_mj
        );
        $company = Company::where('id', $room->company_id)->first();
        $room->views++; //add +1 for viewed room
        $room->save();
        $division = $this->division();
        return view('rooms.show', compact('room','company', 'globalNotes', 'roomLvl', 'division' ));
    }

    /**
     * Show the form for creating a new resource.
     * return company to have name for company_id select
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check() && Auth::user()->lvl == 10){
            $company = Company::all()->sortBy('name');
            $form = $this->getForm();
            return view('rooms.create', compact('form', 'company'));
        } else {
            return redirect()->back()->with("error","vous n'êtes pas Super Admin!!.");/*Your are not Super Admin*/;
        }


    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->lvl == 10) {
            $form = $this->getForm();
            $result = $form->getRawValues();
            if ($result['image'] == null) {
                $form->remove('image'); // to not replace withe null after redirectIfNotValid
            }
            $form->redirectIfNotValid();
            $form->getModel()->save();
            $last = Room::latest()->first(); //We search the last create
            $last->update(['image' => $this->saveImage($request)]); //we change the name
            return redirect('rooms')->with('success', 'La mission a bien étais crée.');/*You have successfully Create*/
        } else {
            return redirect()->back()->with("error","vous n'êtes pas Super Admin!!.");/*Your are not Super Admin*/
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        if(Auth::check() && Auth::user()->lvl > 8){

            $playDate = date('Y-m-d', strtotime($room->playDate));
            $roomCompanyName = Company::where('id', $room->company_id)->first();
            $company = Company::all()->sortBy('name');
            $form = $this->getForm($room);
            if (auth()->user()->lvl == 9) {
                    $form->modify('name', 'text', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('lvl', 'select', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('minplayers', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('maxplayers', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('image', 'file', [ 'attr' => ['disabled' => 'on']]);
                    $form->modify('timeplay', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('success', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('wins', 'select', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('playDate', 'date', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('teams', 'text', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('timePlayMax', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('search', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('enigmas', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('immersion', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('enigmas_ench', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('enigmas_quant', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('enigmas_orig', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('immersion_ambi', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('immersion_hist', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('divertissement', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('note_mj', 'number', [ 'attr' => ['readonly' => 'on']]);
                }
            return view('rooms.edit',compact('form', 'company', 'roomCompanyName', 'playDate', 'room'));
        } else {
           return redirect()->back()->with("error","vous n'êtes pas Super Admin!!.");/*Your are not Super Admin*/
        }
    }


    /**
     *
     * @param Request $request
     * @param Room $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Room $room)
    {
        if(Auth::check() && Auth::user()->lvl > 8){
            $form = $this->getForm($room);
            foreach (config('app.locales') as $local){
                if ($local !== App::getLocale()) {
                    $pitch = 'pitch_'. $local;
                    $form->remove($pitch);
                    $theme = 'theme_'. $local;
                    $form->remove($theme);
                    $resum = 'resum_'. $local;
                    $form->remove($resum);
                    $avis = 'avis_'. $local;
                    $form->remove($avis);
                    $positive = 'positive_'. $local;
                    $form->remove($positive);
                    $negative = 'negative_'. $local;
                    $form->remove($negative);
                }
            }
            //dump($form);
            //dd(App::getLocale());
            $form->remove('image'); // to not replace withe null after redirectIfNotValid
            $form->redirectIfNotValid();
            //dd($form);
            if (null !== ($request->file('image')))
            {
                $old = ($room->image);
                $room->image = $this->saveImage($request); //we change the picture
                if (!preg_match('/default/',$old)) // if the old is not a default image
                {
                    Storage::delete($old); // we delete the old picture
                }
            }
            $room->updated_at = new Datetime('Europe/Paris');
            $room->editor = Auth::user()->name;
            if($request->correction == 'on') // checkbox edit
            {
                $room->correction = 1;
            }else
            {
                $room->correction = 0;
            }
            $room->save();
            return redirect("rooms/$room->id")->with('success','La mission a bien été mise à jour.');/*You have successfully upload*/
        } else {
            return redirect()->back()->with("error","vous n'êtes pas Super Admin!!.");/*Your are not Super Admin*/
        }
    }


    /**
     * @param Room $room
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Room $room)
    {
        if(Auth::check() && Auth::user()->lvl == 10){
            $room->delete();
            if (!preg_match('/default/',$room->image)) // if the image is not a default image
            {
                Storage::delete($room->image); // we delete the image
            }
            return redirect()->route('rooms.index')->with('success','La mission a bien été supprimé.');/*You have successfully Delete*/
        } else {
            return redirect()->back()->with("error","vous n'êtes pas Super Admin!!.");/*Your are not Super Admin*/
        }
    }

    /**
     *
     * @param Room|null $room
     * @return \Kris\LaravelFormBuilder\Form
     */
    private function getForm(?Room $room = null)
    {
        $room = $room ?: new Room();
        return $this->formBuilder->create(RoomForm::class, [
            'model' => $room
        ]);
    }
    private function division(){
        if (config('app.locale') == 'fr'){
            $division = '20';
        }else {
            $division = '100';
        }
        return $division;
    }

    /**
     * GlobalNote    (the average / 20) you find it in traits calculateNote
     * We return the 5 top room with the highest average
     * @return Room[]|\Illuminate\Database\Eloquent\Collection
     */
    private function globalNotes()
    {
        $rooms = Room::all();
        foreach ($rooms as $key =>$room){
            // add new column 'globalNote' for average
            $room->globalNote = $this->note(
                                        $room->immersion, 
                                        $room->enigmas, 
                                        $room->search,
                                        $room->enigmas_ench,
                                        $room->enigmas_quant,
                                        $room->enigmas_orig,
                                        $room->immersion_ambi,
                                        $room->immersion_hist,
                                        $room->divertissement,
                                        $room->note_mj
            );
            $rooms[$key] = $room;
        }
        //$rooms = $rooms->sortByDesc('globalNote')->take(5);
        return $rooms;
    }

}
