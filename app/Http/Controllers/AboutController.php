<?php

namespace App\Http\Controllers;


use App\Extra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $about = Extra::where ('name', 'about_'.config('app.locale'))->first();
        return view('about.index', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = Extra::where ('name', 'about_'.config('app.locale'))->first();
        //dd($about->titel);
        return view('about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check() && Auth::user()->lvl > 8) {
            $about = Extra::find($id);
            $about->text = $request->text;
            $about->titel = $request->titel;
            $about->save();
            return redirect('about')->with('success', 'Le Qui Somme Nous a bien étais mis a jour!.');
        }
    }
}
