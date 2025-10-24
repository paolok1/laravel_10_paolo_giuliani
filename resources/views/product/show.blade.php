<x-layout>
  <header class="header">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center text-4xl">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <h1 class="homepage text-center">Dettaglio del libro: {{$product->title}}</h1>
            </div>
        </div>
    </div>
  </header>
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-4">
                <div class="card mb-4" style="width: 12rem;">
                    <img src="{{Storage::url($product->img)}}" class="card-img-top" alt="immagine copertina">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->title}}</h5>
                        <p class="card-text">{{$product->description}}</p>
                        <p class="card-text">{{$product->body}}</p>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <form action="{{route('product.destroy', compact('product'))}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mb-3" type="submit">Elimina il libro</button>
                </form>
            </div>
          </div>
       </div>

</x-layout>