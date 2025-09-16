<x-layout>
  <header class="header">
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="row h-100 text-4xl">
            <div class="col-12 col-md-6">
                <h1 class="homepage text-center">Prodotti inseriti</h1>
            </div>
        </div>
    </div>
  </header>
        <div class="container">
        <div class="row">
            @foreach($books as $book)
            <div class="col-12 col-md-4">
                <div class="card mb-4" style="width: 12rem;">
                    <img src="{{Storage::url($book->img)}}" class="card-img-top" alt="immagine copertina">
                    <div class="card-body">
                        <h5 class="card-title">{{$book->title}}</h5>
                        <p class="card-text">{{$book->author}}</p>
                        <p class="card-text">{{$book->description}}</p>
                        <a href="#" class="btn btn-primary">Vai</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-layout>