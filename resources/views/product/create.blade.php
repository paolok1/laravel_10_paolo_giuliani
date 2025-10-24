<x-layout>
    <h1 class="text-center bg-dark">Crea un libro</h1>
    <div>
      <h1>@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif</h1>
    </div>

    
     <x-display-errors/>
     
    <div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-12-col-md-6 justify-content-center">
<form class="bg-dark rounded-2 shadow p-3" method="POST" action="{{route('product.store')}}" 
  enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="title" class="form-label ml-3">Titolo</label>
    <input name="title" type="text" value="{{old('title')}}" class="form-control" id="title">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label ml-3">Descrizione</label>
    <textarea name="description" cols="30" class="form-control" id="description">{{old('description')}}</textarea>
  </div>
  <div class="mb-3">
  <label for="body" class="form-label ml-3">Autore</label>
  <input name="body" type="text" value="{{old('body')}}" class="form-control" id="body">
</div>
    <div class="mb-3">
    <label for="img" class="form-label ml-3">inserisci immagine</label>
    <input name="img" type="file" class="form-control d-flex me-3" id="img">
  </div>
  <button type="submit" class="btn btn-danger mb-2">Invia</button>
</form>
        </div>
    </div>
</div>
</x-layout>