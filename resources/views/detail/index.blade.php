<x-layout>
  <header class="header">
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="row h-100 text-4xl">
            <div class="col-12 col-md-6">
                <h1 class="homepage text-center">Libri inseriti</h1>
            </div>
        </div>
    </div>
  </header>
        <div class="container">
        <div class="row">
            @foreach($details as $detail)
            <div class="col-12 col-md-4">
                <div class="card mb-4" style="width: 12rem;">
                    <img src="{{Storage::url($detail->img)}}" class="card-img-top" alt="immagine copertina">
                    <div class="card-body">
                        <h5 class="card-title">{{$detail->title}}</h5>
                        <p class="card-text">{{$detail->description}}</p>
                        <p class="card-text">{{$detail->body}}</p>
                        <a href="{{route('detail.show', compact('detail') )}}" class="btn btn-primary">Descrizione</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-layout>