<?php

namespace App\Http\Controllers;

use App\Drive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;

class DriveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
       $drives = Drive::where("userid","=",auth()->user()->id)->get();
    //    $drives = drives_num->paginate(3);
       return view('drives.index')->with('drives',$drives);
    }

    
    public function create()
    {
       return view('drives.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required|min:5|max:100',
            'file'=>'required|mimes:png,jpg,pdf|file|max:10000'
        ]);

        $drives = new Drive();
        $drives->title = $request->title;
        $drives->description = $request->description;
        $drives->userid =  auth()->user()->id ;

        $file_data = $request->file('file');
        $file_name = $file_data->getClientOriginalName();
        $file_data->move(public_path(). '/upload/', $file_name);


        $drives->file =  $file_name;
        $drives->save();
        return redirect('drives')->with('done', "added sucsessfuly");

    }

    
    public function show($id)
    {
        $drives = Drive::find($id);
        return view('drives.show')->with("drives",$drives);
    }

    
    public function edit($id)
    {
        $drives = Drive::find($id);
        return view('drives.edit')->with("drives",$drives);
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required|min:5|max:100',
            'file'=>'required|mimes:png,jpg,pdf|file|max:10000'
        ]);

        $drives = Drive::find($id);
        $drives->title = $request->title;
        $drives->description = $request->description;

        $file_data = $request->file('file');
        $file_name = $file_data->getClientOriginalName();
        $file_data->move(public_path(). '/upload/', $file_name);


        $drives->file =  $file_name;
        $drives->save();
        return redirect('drives')->with('done', "updaed sucsessfuly");

    }

   
    public function destroy($id)
    {
        $drives = Drive::find($id);
        $drives->delete();
        return redirect('drives')->with('done', "deleted sucsessfuly");
    }
    
    public function download($id){
        // $drives = Drive::where('id','=',$id)->firstOrFail();
        $drives = Drive::find($id);

        $drive_path = public_path('upload/' . $drives->file);
        return response()->download($drive_path);
    }
}
