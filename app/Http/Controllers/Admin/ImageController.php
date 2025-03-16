<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
// use ImagePack as Media;
use Intervention\Image\ImageManager;

class ImageController extends Controller
{
    /**
     * Display a list of all images.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $images = Image::paginate(10);
        if ($request->ajax()) {

            $view = view('admin.image.data', compact('images'))->render();

            return response()->json(['html' => $view]);

        }
        return view('admin.image.index', ['images' => $images]);

    }
     /**
     * Display a list of all images.
     *
     * @return \Illuminate\Http\Response
     */
    public function select(Request $request)
    {
        $images = Image::paginate(9);
        if ($request->ajax()) {

            $view = view('admin.helper.data', compact('images'))->render();

            return response()->json(['html' => $view]);

        }
        // return view('admin.image.index', ['images' => $images]);

    }
    /**
     * Show the form for creating a new image.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.image.add');
    }

    /**
     * Store a newly created image in db.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->file->getClientOriginalName());
        // $this->validate($request, [
        //     'image' => 'required',
        // ]);

        $name = $request->file->getClientOriginalName();

        $file = $request->file->move(public_path('uploads/'), $name);

        $thumbpath = "uploads/thumb/";
        ImageManager::gd()->read($file->getRealPath())->scale(height: 100)->save(public_path($thumbpath . $name));

        $smpath = "uploads/small/";
        ImageManager::gd()->read($file->getRealPath())->scale(height: 200)->save(public_path($smpath . $name));

        $larpath = "uploads/large/";
        ImageManager::gd()->read($file->getRealPath())->scale(height: 470)->save(public_path($larpath . $name));

        Image::create([
            'name' => $name,
        ]);

        return response()->json('You have successfully uploaded.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $image = Image::find($id);
        $name  = $image->name;

        $imagep = 'uploads/' . $name;
        $thumb  = 'uploads/thumb/' . $name;
        $small  = 'uploads/small/' . $name;
        $medium = 'uploads/medium/' . $name;
        $large  = 'uploads/large/' . $name;

        if (File::exists($imagep)) {
            File::delete($imagep);
            File::delete($thumb);
            File::delete($small);
            File::delete($medium);
            File::delete($large);
        }

        $image->delete();

        return redirect()->back();

    }
}
