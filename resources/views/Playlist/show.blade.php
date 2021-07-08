@extends('layouts.app')
@section('content')

    <div class="" id="player-content">
    <a href="/" role="button" class="btn btn-default bg-secondary text-light"><strong>< Back</strong></a>
        <div class="mt-5">
          
          <div class="d-flex align-items-center">
            <h1 class="text-dark">{{$playlist->name}} Songs</h1>
            

            <edit-modal id="{{$playlist->id}}" playlist="{{$playlist}}"></edit-modal>
            
            <form method="POST" action="/playlist/{{$playlist->id}}/delete">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger mx-1">Delete</button>
            </form>
          </div>

          <playlist-song id="{{$playlist->id}}" songs="{{$songs}}"></playlist-song>
          
            
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Artist</th>
                            <th>Duration</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>


                    @foreach($playlist->song as $song)
                    
                        <tr>
                            <td align="center"><i class="fas fa-play"></i></td>
                            <td>{{$song->title}}</td>
                            <td>{{$song->artist}}</td>
                            <td>{{$song->length}}</td>
                            <td>delete</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        

        </div>


    </div>

<div class="slider">
<form>
    <input type="range" class="form-control-range" id="formControlRange">
</form>
<div class="player d-flex justify-content-center align-items-center">
    <i class="fas fa-backward"></i>
    <i class="fas fa-pause-circle"></i>
    <i class="fas fa-forward"></i>
        
</div>
</div>

<div class="drow">
  <div class="col">
    <form method="POST" action="/playlist">
      <button class="btn btn-danger">Delete</button>
    </form>
  </div>
</div>

@endsection