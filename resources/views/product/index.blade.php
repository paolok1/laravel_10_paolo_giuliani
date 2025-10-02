<x-layout>
  <header class="header">
    <div class="container h-auto d-flex justify-content-center align-items-center">
        <div class="row h-auto text-4xl">
            <h1 class="homepage text-center">Libri inseriti</h1>
            <div class="col-12 col-md-6">
            </div>
        </div>
    </div>
  </header>
        <div class="text-center justify-content-centers">
                  <h1>@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif</h1>
        </div>
        <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-12 col-md-4">
                <div class="card mb-4" style="width: 12rem;">
                    <img src="{{Storage::url($product->img)}}" class="card-img-top" alt="immagine copertina">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->title}}</h5>
                        <p class="card-text">{{$product->description}}</p>
                        <p class="card-text">{{$product->body}}</p>
                        <a href="{{route('product.show', compact('product') )}}" class="btn btn-primary">Descrizione</a>
                        <a href="{{route('product.edit', compact('product') )}}" class="btn btn-primary mt-2">Modifica</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-layout>