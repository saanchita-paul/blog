<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $post  = Post::where('status',1)->orderBy('id','desc')->paginate(2);
        return view ('post.index',compact('post'))->with('no',1);
    }
    public function add(){
        return view ('post.add');
    }
    public function store(Request $request){

        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:200',
            'body' => 'nullable|string|max:4000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post = new post;
        $post->title =  $request->title;
        $post->slug =  Str::slug($request->title,'-');
        $image = $request->file('image');
        // if($image != '')
        // {
        //     $image_org = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '-' . '.' . $image->getClientOriginalExtension();
           
        //     $image_thumb = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '-' . '300x200' . '.' . $image->getClientOriginalExtension();

        //     $destinationPath= $request->file('image')->storeAs('image/original', $image_org, 'public');
        //    // dd($destinationPath);
        //     $destinationPath_thumb= $request->file('image')->storeAs('image/thumb', $image_thumb, 'public');

        //     $post = Image::make($image)->resize(300,200)->save($destinationPath)
        //     ->resize(300,200)->save($destinationPath_thumb);
           
        // }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image = Image::make($image)->resize(600, 390)->save(public_path('images/blog/' . $filename));
            $image->fit(300, 200)->save(public_path('images/blog/' . $filename . '-thumbs.jpg'));
            $post->image = $filename;
        }
        $post->save();
        return redirect()->route('post.index')->with('success','Post inserted successfully.');
    }

    public function edit($id){
        $post = post::findOrFail($id);
        return view('post.edit',compact('post'));
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:200|unique:posts,title,'.$id,
            'body' => 'nullable|string|max:4000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $post = post::findOrFail($id);
        $post->title =  $request->title;
        $post->slug =  Str::slug($request->title,'-');
        $post->body =  $request->body;
       
        $image_name = $request->hidden_image;
        $square_img = $request->file('square_avatar');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image = Image::make($image)->resize(600, 390)->save(public_path('images/blog/' . $filename));
            $image->fit(300, 200)->save(public_path('images/blog/' . $filename . '-thumbs.jpg'));
            $post->image = $filename;
        }
        else{
            $post->image = $image_name;
        }
        $post->update();
        return redirect()->route('post.index')->with('success','Post updated successfully.');
    }

    public function delete($id){
        $post = post::findOrFail($id);
        $post->delete();
        return redirect()->back()->with('success','Post deleted successfully.');
    }
}
