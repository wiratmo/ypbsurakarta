<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Agenda;
use App\Model\School;
use Auth;

class AgendaController extends Controller
{
    public function dashboard(){
        $data['links'] = School::all();
        return view('dashboard.agenda', $data);
    }

    public function index(){
    	$data['agendas'] = Agenda::all();
    	return view('admin.agenda', $data);
    	return dd($data);
    }

    public function indexContributor(){
        $data['agendas'] = Agenda::where('user_id', Auth::user()->id)->get();
        return view('admin.agenda', $data);
        return dd($data);
    }

    public function create(){
    	return view('admin.agenda_create');
    }
 
    public function store (Request $request){
    	$agenda = new Agenda;
    	$agenda->name = $request->name;
    	$agenda->description = $request->description;
    	$agenda->place = $request->place;
    	$agenda->implementation = $request->implementation;
    	$agenda->save();
    	$request->session()->flash('success', "terimakasih anda telah menambahkan agenda");
    	return redirect('/admin/agenda');
    }

    public function edit ($id){
    	$data['id'] = $id;
    	$data['agenda'] = Agenda::findOrFail($id);
    	return view('admin.agenda_edit', $data);
    	return dd($data);
    }

    public function update(Request $request){
    	$agenda = Agenda::find($request->id);
    	$agenda->name = $request->name;
    	$agenda->description = $request->description;
    	$agenda->place = $request->place;
    	$agenda->implementation = $request->implementation;
    	$agenda->save();
    	$request->session()->flash('success', "terimakasih anda telah memperbarui agenda");
    	return redirect('/admin/agenda');
    }

    public function delete(Request $request){
    	$agenda = Agenda::findOrFail($request->id);
    	$agenda->delete();
    	$request->session()->flash('danger', "terimakasih sudah menghapus agenda");
    	return redirect('/admin/agenda');
    }
}
