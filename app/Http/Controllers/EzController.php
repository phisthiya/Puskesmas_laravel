<?php

namespace App\Http\Controllers;

use App\City;
use App\contact;
use App\Http\Requests;
use App\Marker;
use App\Tour;
use App\tourform;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class EzController extends Controller
{
    public function index()
    {
        $ez = City::all();
        $data = [
            'city'=>$ez
        ];
        $location = DB::table('markers')->get();
        $sql = DB::table('tours')->leftjoin('cities','tours.city_id','=','cities.id')->get();
        return view('ez/home', $data, compact('sql', 'location'));
    }
    public function contact(Request $request)
    {
        contact::create($request->all());
        return redirect('/ez');
    }

    public function location(Marker $location)
    {
        return view('ez/location', compact('location'));
    }
    public function showtour()
    {
        $ez = City::all();
        $data = [
            'city'=>$ez
        ];
        $sql = DB::table('tours')->get();
        $kotaID = Input::get('kota');
        $kota = City::find($kotaID);
        return view('ez/tour/tour', $data, compact('sql', 'kota'));
    }
    public function showtourdetail(Tour $tour)
    {
        $ez = City::all();
        $data = [
            'city'=>$ez
        ];
        return view('ez/tour/detail', $data, compact('tour'));
    }

    public function showTourForm(Tour $tour)
    {
        $ez = City::all();
        $data = [
            'city'=>$ez
        ];
        return view('ez/tour/form', $data, compact('tour'));
    }

    public function showReviewTourForm()
    {
        $ez = City::all();
        $data = [
            'city'=>$ez
        ];
        $sql = DB::table('tours')->get();
        $kotaID = Input::get('kota');
        $kota = City::find($kotaID);
        return view('ez/tour/review', $data, compact('sql', 'kota'));
    }
    public function tourstore(Request $request)
    {
        tourform::create($request->all());
        return redirect('ez/tour/report');
    }
}
