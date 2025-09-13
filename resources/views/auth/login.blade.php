<x-layout>
    <header class="header">
      <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-md-6 d-flex justify-content-center">
              <h1 class="text-center">Accedi</h1>
          </div>
        </div>
      </div>
    </header>

    <x-display-errors/>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                    <form class="mt-4 p-4 shadow rounded-4 bg-body-secondary" method="POST" action="{{route('login')}}">
                        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
            </div>
        </div>
    </div>
</x-layout>