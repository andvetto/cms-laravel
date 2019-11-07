<?php

namespace App\Http\Controllers;

use \App\Sfondo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\File;

class SfondoController extends Controller
{
    public function index()
    {
        $sfondo = Sfondo::orderBy('created_at', 'desc')->first();
    	return view('pages.sfondo', compact('sfondo'));
    }


    public function create()
    {
    	return view('pages.sfondo');
    }


    public function store(Request $request)
    {
        $sfondo = Sfondo::orderBy('created_at', 'desc')->first();

        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => ['required', 'unique:pages', 'min:3'],
            'subtitle' => 'required',
            ]);

        if (isset($sfondo->file)){
            $image_path = public_path('images\\').$sfondo->file;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);   
            }
        }

            $image = $request->file('file');
            $name = time().'-sfondo.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images\\');

        $image->move($destinationPath, $name);
        
        $sfondo = new Sfondo();
        $sfondo->file = $name;
        $sfondo->title = $request->title;
        $sfondo->subtitle = $request->subtitle;

        Schema::dropIfExists('sfondos');
        Schema::create('sfondos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('subtitle');
            $table->string('file');
            $table->timestamps();
        });

        $sfondo->save();

        return redirect('/');

    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
