<?php

namespace App\Http\Controllers;

use \App\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\File;

class LogoController extends Controller
{
    public function index()
    {
    	
        $logo = Logo::orderBy('created_at', 'desc')->first();

    	return view('pages.logo', compact('logo'));
    }


    public function create()
    {
    	return view('pages.logo');
    }


    public function store(Request $request)
    {
        $logo = Logo::orderBy('created_at', 'desc')->first();

        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

        if (isset($logo->file)){
            $image_path = public_path('images\\').$logo->file;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);   
            }
        }

        $image = $request->file('file');
        $name = time().'-logo.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images\\');

        $image->move($destinationPath, $name);
        
        $logo = new Logo();
        $logo->file = $name;

        Schema::dropIfExists('logos');
        Schema::create('logos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->timestamps();
        });

        $logo->save();

        return redirect()->back();

    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
