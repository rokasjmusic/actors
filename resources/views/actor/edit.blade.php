@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Aktoriaus duomenu redagavimas</div>

               <div class="card-body">
                 
                  <form method="POST" action="{{route('actor.update',$actor)}}">
                  <!-- Name: <input type="text" name="name" value="{{$actor->name}}"> -->
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name"  class="form-control" value="{{$actor->name}}">
                    </div>

                  <!-- Surname: <input type="text" name="surname" value="{{$actor->surname}}"> -->
                  <div class="form-group">
                        <label>Surname</label>
                        <input type="text" name="surname"  class="form-control" value="{{$actor->surname}}">
                    </div>


                  @csrf
                  <button class="btn btn-success" type="submit">Update</button>
                  </form>

               </div>
           </div>
       </div>
   </div>
</div>
@endsection
