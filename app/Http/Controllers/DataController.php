<?php

namespace App\Http\Controllers;
use App\Models\Rate;
use Illuminate\Http\Request;
use App\Imports\dataRate;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates= DB::table('rates')  ->orderBy('date', 'desc')
                                    ->paginate(20);
        return view('pages.Data-rate',['rates'=>$rates]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function importUploadForm()
    {
        return view('pages.import-form');
    }

    public function importForm(Request $request) 
    {
        Excel::import(new dataRate,$request->file);
        return redirect('/');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "data";
        Rate::create([
            'date' => $request->date,
            'exchange_rate_usd' => $request->rate,
        ]);
        return redirect('/');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dat = Rate::findorfail($id);
        return view('pages.update-rate',compact('dat'));
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
        $dat = Rate::findorfail($id);
        $dat->update($request->all());
        // dd(($request->all()));
        return redirect('/')->with('toast_success','Data Berhasil di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dat = Rate::findorfail($id);
        $dat->delete();
        return back();

    }
}
