@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Aktoriaus duomenu pridejimas</div>

               <div class="card-body">
                  <form method="POST" action="{{route('actor.store')}}">
                  
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name"  class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" name="surname"  class="form-control">
                    </div>

                  @csrf
                  <button class="btn btn-primary" type="submit">ADD</button>

               </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
