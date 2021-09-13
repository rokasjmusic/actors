@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Filmu duomenu redagavimas</div>

               <div class="card-body">
                 
                <form method="POST" action="{{route('movie.update',[$movie])}}">

                    <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title"  class="form-control" value="{{$movie->title}}">
                    </div>

                    <label>IMBD Score</label>
                    <input type="text" name="imdb_score"  class="form-control" value="{{$movie->imdb_score}}">
                    </div>

                    <select class="form-control" name="actor_id">
                        @foreach ($actors as $actor)
                            <option value="{{$actor->id}}" @if($actor->id == $movie->actor_id) selected @endif>
                                {{$actor->name}} {{$actor->surname}}
                            </option>
                        @endforeach
                    </select>
                    @csrf

                    <button class="btn btn-success" type="submit">Update</button>
                </form>

               </div>
           </div>
       </div>
   </div>
</div>
@endsection
