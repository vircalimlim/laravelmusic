@extends('layouts.app')
@section('content')

    <div class="" id="player-content">

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
          
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Artist</th>
                            <th>Album</th>
                            <th>Duration</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="center"><i class="fas fa-play"></i></td>
                            <td>Some title</td>
                            <td>Some artist</td>
                            <td>Some album</td>
                            <td>3:45</td>
                            <td>delete</td>
                        </tr>
                        <tr>
                            <td align="center"><i class="fas fa-play"></i></td>
                            <td>Some title</td>
                            <td>Some artist</td>
                            <td>Some album</td>
                            <td>3:45</td>
                        </tr>
                        <tr>
                            <td align="center"><i class="fas fa-play"></i></td>
                            <td>Some title</td>
                            <td>Some artist</td>
                            <td>Some album</td>
                            <td>3:21</td>
                        </tr>

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