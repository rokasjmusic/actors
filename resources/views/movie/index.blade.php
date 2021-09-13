@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Filmu duomenys</div>

               <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Pavadinimas</td>
                        <td>IMDB Score</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>

                    @foreach ($movies as $movie)
                        <tr>
                            <td>{{$movie->title}}</td>
                            <td>{{$movie->imdb_score}}</td>
                            <td><a class="btn btn-success" href="{{route('movie.edit',[$movie])}}">Edit</a>  </td>
                            <td>          
                                <form method="POST" action="{{route('movie.destroy', $movie)}}">
                                @csrf
                                <button class="btn btn-danger" type="submit">DELETE</button>
                                </form>
                            </td> 
                        </tr>
                @endforeach


               </div>
           </div>
       </div>
   </div>
</div>
@endsection

