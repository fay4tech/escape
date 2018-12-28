<?php
/**
 * Copyright  Faycal.(c) 2018.
 */

namespace App\Http\Controllers;

use App\Company;
use App\Forms\CompanyForm;
use Illuminate\Support\Facades\Auth;
use App\Room;
use App\Traits;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

/**
 * Class CompanyController
 * @package App\Http\Controllers
 */
class CompanyController extends Controller
{
    use Traits\StoreImageTrait;

    /**
     * @var FormBuilder
     */
    private $formBuilder;


    /**
     * CompanyController constructor.
     * @param FormBuilder $formBuilder
     */
    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $companies = Company::where('id', '!=', '0')->orderBy('id', 'desc')->get();
        return view('companies.index', ['companies' => $companies ]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create()
    {
        if (Auth::check() && Auth::user()->lvl > 8){
            $form = $this->getForm();
            return view('companies.create', compact('form'));
        }else {
            return redirect()->route('companies.index')->with("error","Your are not Super Admin!!.");
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->lvl > 8) {
            $form = $this->getForm();
            $result = $form->getRawValues();
            if ($result['image'] == null) {
                $form->remove('image');
            }
            $form->redirectIfNotValid();
            $form->getModel()->save();
            $last = Company::latest()->first(); //We search the last create
            //dump($last->image);
            $last->update(['image' => $this->saveImage($request)]); //we change the name
            $path = $this->saveImage($request);
            $last->image = $path;
            $last->save();
            //dd($last->image);
            return redirect()->route('companies.index')->with('success', 'You have successfully Create.');
        }else {
                return redirect()->route('companies.index')->with("error","Your are not Super Admin!!.");
            }
    }

    /**
     * @param Company $company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Company $company)
    {
        $rooms = Room::where('company_id', $company->id)->get();
        $count = $rooms->count();
        return view('companies.show',compact('company', 'rooms', 'count'));
    }

    /**
     * @param Company $company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Company $company)
    {
        if (Auth::check() && Auth::user()->lvl >= 8) {
            if (Auth()->user()->company_id == $company->id || Auth()->user()->lvl > 8 ){
                $room = Room::where('company_id', $company->id)->get();
                $form = $this->getForm($company);
                // control if user are not Super Admin lvl, the Avis is changed to readonly
                if (auth()->user()->lvl == 8) {
                    $form->modify('avis', 'textarea', ['label' => 'Avis:', 'attr' => ['readonly' => 'on']]);
                }
                if (auth()->user()->lvl == 9) {
                    $form->modify('name', 'text', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('email', 'email', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('adress', 'text', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('city', 'text', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('region', 'text', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('zip', 'text', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('country', 'text', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('open', 'time', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('close', 'time', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('pricemin', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('pricemax', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('url', 'text', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('roomNb', 'number', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('tel', 'text', [ 'attr' => ['readonly' => 'on']]);
                    $form->modify('image', 'file', [ 'attr' => ['disabled' => 'on']]);
                }
                return view('companies.edit', compact('form', 'company', 'companyRoomName', 'room'));
            }else {
                return redirect()->route('companies.index')->with("error","Your are not Super Admin!!.");
            }

        }else {
            return redirect()->route('companies.index')->with("error","Your are not Super Admin!!.");
        }
    }


    /**
     * @param Request $request
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Company $company)
    {
        if (Auth::check() && Auth::user()->lvl >= 8) {
            $form = $this->getForm($company);
            $form->remove('image'); // to not replace withe null after redirectIfNotValid
            $form->redirectIfNotValid();
            if (null !== ($request->file('image')))
            {
                //dd($request, $company);
                $old = ($company->image);     //save path of the old image
                //dd($request, $old);
                $company->image = $this->saveImage($request); //we change the name if we have new image
                //dd($request, $old, $company->image);
                if (!preg_match('/default/',$old)) { // if the old is not a default image
                    Storage::delete($old); // we delete the old picture
                }
            }
            //$company->updated_at = new Datetime('Europe/Paris');
            $company->save();
            //dd($request, $old, $company->image);
            return redirect()->route('companies.index')->with('success', 'You have successfully Update.');
        }else {
            return redirect()->route('companies.index')->with("error","Your are not Super Admin!!.");
        }
    }

    /**
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Company $company)
    {
        if(Auth::check() && Auth::user()->lvl > 8){
            if($company->id == 0){
                return redirect()->back()->with("error","You can not delete this company 'N/A'!!.");
            }else{
                $company->delete();
                if (!preg_match('/default/',$company->image)) { // if the image is not a default image
                    Storage::delete($company->image); // we delete the image
                }
                return redirect()->route('companies.index')->with('success','You have successfully Delete.');
            }
            
        } else {
            return redirect()->back()->with("error","Your are not Super Admin!!.");
        }
    }


    /**
     * @param Company|null $company
     * @return \Kris\LaravelFormBuilder\Form
     */
    private function getForm(?Company $company = null)
    {
        $company = $company ?: new Company();
        return $this->formBuilder->create(CompanyForm::class, [
            'model' => $company
        ]);
    }
}
