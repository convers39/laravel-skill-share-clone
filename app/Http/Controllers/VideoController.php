<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoFormRequest;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware(function ($request, $next) {
    //         if ($request->user()) {
    //             return $next($request);
    //         }
    //         abort(403);
    //     });
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  VideoFormRequest $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(VideoFormRequest $request, $videoId)
    {
        Video::find($videoId)->update($request->validated());
        return back()->with('success', 'Video has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($videoId)
    {
        try {
            $video = Video::findOrFail($videoId);
            Storage::delete($video->url);
            $video->delete();
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
        return back()->with('success', 'Video has been deleted!');
    }
}
