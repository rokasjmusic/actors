@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
           <div class="card-header">Aktoriu sarasas</div>

<div class="card-body">
 <table class="table">
     <tr>
         <!-- <td>Klase</td> -->
         <td>Vardas</td>
         <td>Pavarde</td>
         <td>Show</td>
         <td>Edit</td>
         <td>Delete</td>
     </tr>

     @foreach ($actors as $actor)
         <tr>
             
             <td>{{$actor->name}}</td>
             <td>{{$actor->surname}}</td>
             
             <td><a class="btn btn-info" href="{{route('actor.show',[$actor])}}">Show</a>  </td>
             <td><a class="btn btn-success" href="{{route('actor.edit',[$actor])}}">Edit</a>  </td>
             <td>          
                 <form method="POST" action="{{route('actor.destroy', $actor)}}">
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
