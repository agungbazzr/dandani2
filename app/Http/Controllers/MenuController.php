<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\MenuUtama;

class MenuController extends Controller
{
    public function index(): View
    {
        //get posts
        $menus = MenuUtama::latest()->paginate(5);

        //render view with posts
        return view('menu.index', compact('menus'));
    }

    public function create(): View
    {
        return view('menus.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/menus', $image->hashName());

        //create post
        MenuUtama::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('menus.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
