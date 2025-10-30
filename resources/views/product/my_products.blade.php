<x-layout>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>I miei libri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('product.index') }}">Libri</a>
            @auth
                <a class="nav-link" href="{{ route('product.my') }}">I miei libri</a>
            @endauth
        </div>
    </nav>

    <div class="container">
        <h1>I miei libri</h1>

        @if ($products->isEmpty())
            <div class="alert alert-info">Non hai ancora inserito nessun libro.</div>
        @else
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            @if ($product->img)
                                <img src="{{ asset('storage/' . $product->img) }}" class="card-img-top" alt="{{ $product->title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Visualizza</a>
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Modifica</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
</x-layout>
