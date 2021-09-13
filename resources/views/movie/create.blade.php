@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Filmu duomenu ivedimas</div>

               <div class="card-body">
                
                <form method="POST" action="{{route('movie.store')}}">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title"  class="form-control">
                    </div>

                    <div class="form-group">
                        <label>IMBD Score</label>
                        <input type="text" name="imdb_score"  class="form-control">
                    </div>

                    <select class="form-control" name="actor_id">
                        @foreach ($actors as $actor)
                            <option value="{{$actor->id}}">{{$actor->name}} {{$actor->surname}}</option>
                        @endforeach
                    </select>
                    @csrf

                    <button class="btn btn-primary" type="submit">ADD</button>
                </form>

               </div>
           </div>
       </div>
   </div>
</div>
@endsection
