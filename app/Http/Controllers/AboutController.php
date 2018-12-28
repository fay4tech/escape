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
        $text = Extra::find(1);
        return view('about.index', compact('text'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $text = Extra::find($id);
        //dd($text->titel);
        return view('about.edit', compact('text'));
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
            $text = Extra::find($id);
            $text->text = $request->text;
            $text->titel = $request->titel;
            $text->save();
            return redirect('about')->with('success', 'Le Qui Somme Nous a bien étais mis a jour!.');
        }
    }
}
