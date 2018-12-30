<?php

namespace App\Http\Controllers;


use App\Extra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $text = Extra::find(4);
        return view('notation.index', compact('text'));
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
        return view('notation.edit', compact('text'));
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
            return redirect('notation')->with('success', 'La notation a bien étais mis a jour!.');
        }
    }
}
