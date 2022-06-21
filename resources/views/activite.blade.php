@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Button trigger modal -->
        <div class="row">
            <p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Nouvelle activite
                   </button>  
                 <a type="button" class="btn btn-primary mx-2 bg-danger" href="{{ route("delete")}}">
                    Tout supprimer
                 </a>
            </p>
                
        </div>
        
        <div class="row justify-content-start">
           
            @foreach ($activites as $activite)
            <div class="col-md-3">
                <div class="card p-3 my-2 mx-auto">
                    <h1 class="display-6"> <strong>{{ $activite->name }}</strong></h1>
                    <p>{{ $activite->description }}</p>
                    <p class="text-right">
                        <a class="btn bg-primary">Modifier</a>
                        <a class="btn bg-danger">Supprimer</a>
                        {{-- href= '{{ route("activite/$activite->id")}}' --}}
                    </p>
                </div>
            </div> 
            @endforeach
           
        </div>
    </div>

<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nouvelle Activité</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('activite')}}" method="post">
            @csrf <!-- {{ csrf_field() }} -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nom de l'activité</label>
                <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description de l'activité</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Enregister</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
