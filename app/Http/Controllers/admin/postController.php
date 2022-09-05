<?php

namespace App\Http\Controllers\admin;

use App\Events\PostProcessed;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;
use App\Jobs\ProcessPodcast;
use App\Models\{Category,Post,Subcategory};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //join three table using eloquent ORM
        $posts = Post::all();
        //join three table using query builder
        // $posts = DB::table('posts')
        // ->leftJoin('categories','posts.category_id','categories.id')
        // ->leftJoin('subcategories','posts.subcategory_id','subcategories.id')
        // ->leftJoin('users','posts.user_id','users.id')
        // ->select('posts.*','categories.category_name','subcategories.subcategory_name','users.name')
        // ->get();
        // return response()->json($posts);
        return view('admin.posts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $subcategory = Subcategory::all();
        return view('admin.addPost',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subcategory_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        $categoryId = DB::table('subcategories')->where('id',$request->subcategory_id)->first()->category_id;
        $slug = Str::of($request->title)->slug('-');
        $data = array();
        $data['category_id'] =  $categoryId;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['user_id'] = Auth::user()->id;
        $data['title'] = $request->title;
        $data['slug'] = $slug;
        $data['post_date'] = $request->post_date;
        $data['description'] = $request->description;
        $data['tags'] = $request->tags;
        $data['status'] = $request->status;
        // event calling postprocessed
        $edata = ['title'  => $request->title,'date'=> date('d F Y',strtotime($request->post_date)) ];
        // event(new PostProcessed($edata));
        dispatch(new ProcessPodcast($edata));
        $photo = $request->image;
        if ($photo) {
           $photoname = $slug.'.'.$photo->getClientOriginalExtension(); // slug.png
           Image::make($photo)->resize(600,400)->save('media/'.$photoname);
           $data['image'] = 'media/'.$photoname;
           DB::table('posts')->insert($data);
           $notification = array('success'=>'Post Added Successfully','alert-type'=>'success');
           return redirect()->back()->with($notification);
        }
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
        $category = Category::all();
        $post = Post::find($id);
       return view('admin.editPost',compact('category','post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'subcategory_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        $categoryId = DB::table('subcategories')->where('id',$request->subcategory_id)->first()->category_id;
        $slug = Str::of($request->title)->slug('-');
        $data = array();
        $data['category_id'] =  $categoryId;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['user_id'] = Auth::user()->id;
        $data['title'] = $request->title;
        $data['slug'] = $slug;
        $data['post_date'] = $request->post_date;
        $data['description'] = $request->description;
        $data['tags'] = $request->tags;
        $data['status'] = $request->status;
        $photo = $request->image;
        if ($photo) {
           $photoname = $slug.'.'.$photo->getClientOriginalExtension(); // slug.png
           Image::make($photo)->resize(600,400)->save('media/'.$photoname);
           // deleting old image 
           File::delete($request->old_image);
           $data['image'] = 'media/'.$photoname;
           DB::table('posts')->where('id',$id)->update($data);
           $notification = array('success'=>'Post Updated Successfully','alert-type'=>'success');
           return redirect()->back()->with($notification);
        }else{
           $data['image'] = $request->old_image;
           DB::table('posts')->where('id',$id)->update($data);
           $notification = array('success'=>'Post Updated Successfully','alert-type'=>'success');
           return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        if(File::exists($post->image)){
            File::delete($post->image);
            $post->delete();
            $notification = array('success'=>'Post Deleted Successfully','alert-type'=>'success');
            return redirect()->back()->with($notification);
        }
        
    }
}
