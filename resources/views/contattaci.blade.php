<x-layout>
    <h1 class="text-center bg-dark">Inserisci qui il prodotto</h1>

    
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-12-col-md-6 justify-content-center">
<form class="bg-dark rounded-2 shadow p-3" method="POST" action="{{route('book-store')}}" 
  enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="inputTitle" class="form-label ml-3">Titolo</label>
    <input name="title" type="text" value="{{old('title')}}" class="form-control" id="inputTitle">
  </div>
  <div class="mb-3">
  <label for="inputAuthor" class="form-label ml-3">Autore</label>
  <input name="author" type="text" value="{{old('author')}}" class="form-control" id="inputAuthor">
</div>
  <div class="mb-3">
    <label for="inputDescription" class="form-label ml-3">Descrizione</label>
    <textarea name="description" cols="30" class="form-control" id="inputDescription">{{old('description')}}</textarea>
  </div>
    <div class="mb-3">
    <label for="img" class="form-label ml-3">inserisci immagine</label>
    <input name="img" type="file" class="form-control" id="img">
  </div>
  <button type="submit" class="btn btn-danger mb-2">Invia</button>
</form>
        </div>
    </div>
</div>
</x-layout>