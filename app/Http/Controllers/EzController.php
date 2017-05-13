<?php

namespace App\Http\Controllers;

use App\City;
use App\contact;
use App\Http\Requests;
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
        $sql = DB::table('tours')->leftjoin('cities','tours.city_id','=','cities.id')->get();
        return view('ez/home',$data, compact('sql'));
    }
    public function contact(Request $request)
    {
        contact::create($request->all());
        return redirect('/ez');
    }

    public function edit(User $user)
    {
        return view('auth.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect('/ez');
    }

    public function admin()
    {
        return view('ez/admin/admin-panel');
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
        return view('ez/tour',$data,compact('sql','kota'));
    }
    public function showtourdetail(Tour $tour)
    {
        $ez = City::all();
        $data = [
            'city'=>$ez
        ];
        return view('ez/detail', $data,compact('tour'));
    }
    public function tourform(Tour $tour)
    {
        $ez = City::all();
        $data = [
            'city'=>$ez
        ];
        return view('ez/form', $data,compact('tour'));
    }
    public function tourconfirm()
    {
        $ez = City::all();
        $data = [
            'city'=>$ez
        ];
        $sql = DB::table('tours')->get();
        $kotaID = Input::get('kota');
        $kota = City::find($kotaID);
        return view('ez/tour/confirm',$data,compact('sql','kota'));
    }
    public function tourstore(Request $request)
    {
        tourform::create($request->all());
        return redirect('ez/tour/report');
    }

    public function tourreport(Tour $tour)
    {
        $ez = City::all();
        $data = [
            'city'=>$ez
        ];
        return view('ez/report', $data,compact('tour'));
    }

}
