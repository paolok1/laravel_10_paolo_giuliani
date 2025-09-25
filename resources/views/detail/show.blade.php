<x-layout>
  <header class="header">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center text-4xl">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <h1 class="homepage text-center">Libro con id: {{$detail->id}}</h1>
            </div>
        </div>
    </div>
  </header>
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-4">
                <div class="card mb-4" style="width: 12rem;">
                    <img src="{{Storage::url($detail->img)}}" class="card-img-top" alt="immagine copertina">
                    <div class="card-body">
                        <h5 class="card-title">{{$detail->title}}</h5>
                        <p class="card-text">{{$detail->description}}</p>
                        <p class="card-text">{{$detail->body}}</p>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <form action="{{route('detail.delete', compact('detail'))}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mb-3" type="submit">Elimina il libro</button>
                </form>
            </div>
          </div>
       </div>

</x-layout>