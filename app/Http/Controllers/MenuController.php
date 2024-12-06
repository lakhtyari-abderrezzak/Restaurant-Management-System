<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MenuController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $menus = Menu::paginate(6);
        return view('menus.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();

        return view('menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $imageName = '/images/menus/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/menus'), $imageName);

            $title = $request->title;
            Menu::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => $request->description,
                'image' => $imageName,
                'price' => $request->price,
                'category_id' => $request->category_id
            ]);
        }


        return redirect()->route('menus.index')->with('success', 'Menu added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {

        return view('menus.show', compact('menu', ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $categories = Category::get();
        return view('menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
        ]);
        if ($request->hasFile('image')) {
            $file_path = public_path($menu->image);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            $file = $request->image;
            $imageName = '/images/menus/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/menus'), $imageName);

            $menu->image = $imageName;
        }
        $title = $request->title;
        $menu->update([
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $request->description,
            'image' => $menu->image,
            'price' => $request->price,
            'category_id' => $request->category_id
        ]);


        return redirect()->route('menus.index')->with('success', 'Update was successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        $file_path = public_path($menu->image);
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        return redirect()->route('menus.index')->with('success', 'Delete was successfull');

    }
}