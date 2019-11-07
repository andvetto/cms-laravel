<?php

namespace App\Http\Controllers;

use \App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{
    public function index()
    {
    	$pages = Page::all();

    	return view('pages.admin', compact('pages'));
    }


    public function create()
    {
    	return view('pages.new');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'unique:pages', 'min:3'],
            'slug' => ['required', 'unique:pages'],
            'subtitle' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'text' => 'required'
            ]);

        $image = $request->file('image');
        $name = time().'-'.$request->slug.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images\\');

        $image->move($destinationPath, $name);
        
        $page = new Page();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->subtitle = $request->subtitle;
        $page->image = $name;
        $page->text = $request->text;

        $page->save();
        
        return redirect($page->slug);
    }


    public function show($param)
    {
        
        $page = Page::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();

        $logo = \App\Logo::orderBy('created_at', 'desc')->first();

        $pages = Page::all();
        return view('pages.show', ['pages' => $pages, 'page' => $page, 'logo' => $logo]);
    }   


    public function edit($param)
    {
    	   $pages = Page::all();
           $page = Page::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();


        return view('pages.edit', compact('page'));
    }   


    public function update(Page $page, Request $request)
    {
        
         $this->validate($request, [
            'title' => ['required','min:3','unique:pages,title,' . $page->id],
            'slug' => ['required','unique:pages,slug,' . $page->id],
            'subtitle' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'text' => 'required'
            ]);

        if ($request->has('image')) {
            
            $image_path = public_path('images\\').$page->image;  // Value is not URL but directory file path
                if(File::exists($image_path)) {
                        File::delete($image_path);
                }

            $image = $request->file('image');
               $name = time().'-'.$request->slug.'.'.$image->getClientOriginalExtension();
               $destinationPath = public_path('images\\');

            $image->move($destinationPath, $name);
        
            $page->update([

                'image' => $name,

                ]);
        }

            $page->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'subtitle' => $request->subtitle,
                'text' => $request->text,
                ]);

        

        $page->save();

        return redirect($page->slug);
    }   

    public function destroy(Page $page)
    {
        

        $image_path = public_path('images\\').$page->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
                File::delete($image_path);
        }

        $page->delete();

        return redirect('/admin');
        //return redirect()->back();
    }


    
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }
}
