<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use Yajra\DataTables\Facades\DataTables;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if($request->ajax())
        {
            $hotels = Hotel::query();
            return DataTables::of($hotels)

            ->addColumn('action', function($h){
                $edit = '<a href="'.route('hotels.edit', $h->id).'" class="btn btn-warning" style="margin-right:10px;">Edit</a>' ;
                $delete = '<a href="" class="delete btn btn-danger" data-id="'.$h->id.'">delete</a>' ;
                return '<div class="action">'.$edit.$delete.'</div>';
            })->rawColumns(['action'])->make(true);
        }
        return view('backend.hotel.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel = new Hotel();
        $hotel->name=$request->name;
        $hotel->location=$request->location;
        $imagename = date('YmdHis') . "." .request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imagename);
        $hotel->image = $imagename;
        $hotel->save();

        return redirect('/hotels')->with('create', 'hotel created');



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
    public function edit(Hotel $hotel)
    {
        return view('backend.hotel.edit', compact('hotel'));
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
        
        $hotel = Hotel::findOrFail($id);
        $hotel->name=$request->name;
        $hotel->location=$request->location;
        if($request -> image){
            $imagename = date('YmdHis') . "." .request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imagename);
            $hotel->image = $imagename;
        }
        
        $hotel->update();

        return redirect('/hotels')->with('update', 'hotel updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return 'success';
    }
}
