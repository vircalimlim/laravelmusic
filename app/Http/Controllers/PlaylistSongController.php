<?php

namespace App\Http\Controllers;

use App\Models\PlaylistSong;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistSongController extends Controller
{
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
    public function store(Request $request, Playlist $playlist)
    {

        foreach($request->song_id as $song){
         $data = [
            'song_id' => $song,
            ];
        $playlist->song()->toggle($data);
        
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlaylistSong  $playlistSong
     * @return \Illuminate\Http\Response
     */
    public function show(PlaylistSong $playlistSong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlaylistSong  $playlistSong
     * @return \Illuminate\Http\Response
     */
    public function edit(PlaylistSong $playlistSong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlaylistSong  $playlistSong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlaylistSong $playlistSong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlaylistSong  $playlistSong
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Playlist $id, $song)
    {
        //return $song;
        $id->song()->detach($song);
    }
}
