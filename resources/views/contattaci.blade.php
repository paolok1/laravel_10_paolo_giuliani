<x-layout>
    <h1 class="text-center bg-dark">Contatti</h1>

    <div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-12-col-md-6 justify-content-center">
<form class="bg-dark rounded-2 shadow p-3" method="POST" action="{{route('book-store')}}">
    @csrf
  <div class="mb-3">
    <label for="inputTitle" class="form-label ml-3">Titolo</label>
    <input name="title" type="text" class="form-control" id="inputTitle">
  </div>
  <div class="mb-3">
  <label for="inputAuthor" class="form-label ml-3">Autore</label>
  <input name="author" type="text" class="form-control" id="inputAuthor">
</div>
  <div class="mb-3">
    <label for="inputDescription" class="form-label ml-3">Descrizione</label>
    <textarea name="description" class="form-control" id="inputDescription"></textarea>
  </div>
    <div class="mb-3">
    <label for="inputEmail" class="form-label ml-3">Email</label>
    <input name="mail" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-danger mb-2">Invia</button>
</form>
        </div>
    </div>
</div>
</x-layout>