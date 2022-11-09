<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{

    public function index()
    {
        $userList = User::all();
        return view('gallery.index', ['userList' => $userList]);
    }

    public function create($id)
    {
        $user = User::findOrFail($id);
        return view('gallery.create', ['user' => $user, 'id' => $id]);
    }

    public function store(Request $request, $id)
    {
        $userInput = $this->validate($request, [
            'picture' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $path = "images/";

        $imgName = time() . '.' . $request->picture->extension();

        $userInput['picture'] = $imgName;
        $userInput['user_id'] = $id;

        if ($request->picture->move(public_path($path), $imgName)) {
            if (Gallery::create($userInput)) {
                return redirect('/api/users/images')->with('success', 'Record added successfully');
            }
        }
    }

    public function show(Gallery $gallery)
    {
        //
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $file = public_path("images/" . $gallery->picture);
        if (File::exists($file)) {
            File::delete($file);
        }

        if ($gallery->delete()) {
            return redirect('/api/users/images')->with('success', 'Record deleted successfully');
        }
    }
}
