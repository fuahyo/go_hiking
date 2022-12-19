@extends('dashboard.layouts.main')

@section('container')
<div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center mt-2">Form Registrasi</h1>

            
            <form action="/dashboard/users" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-2" >
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control rounded @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{old('name')}}">
                    @error('name')
                    <div  class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control rounded @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{old('username')}}">
                    @error('username')
                    <div  class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-1">
                    <label for="departement" class="form-label">Departement</label>
                    <select class="form-select" name="departement_id">
                        <option value="">Select departement</option>
                        @foreach ($departements as $departement)
                            @if( old('departement_id') == $departement->id)
                            <option value="{{ $departement->id }}" selected>{{ $departement->name }}</option>
                            @else
                            <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-1">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" name="role_id">
                        <option value="">Select role</option>
                        @foreach ($roles as $role)
                            @if( old('role_id') == $role->id)
                            <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                            @else
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-2">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control rounded @error('email') is-invalid @enderror" id="email" placeholder="ename@example.com" required value="{{old('email')}}">
                    @error('email')
                    <div  class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control rounded @error('password') is-invalid @enderror" id="password" placeholder="Password" required >
                    @error('password')
                    <div  class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
        
                <!-- <div class="checkbox mb-1">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
                </div> -->
                <button class="w-100 btn btn-lg btn-outline-primary mt-4" type="submit">Register</button>
                <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> -->
            </form>
            <!-- <small class="d-block text-center mt-3">Udah Daftar? <a href="/dashboard/users"> Silakan Login!</a></small> -->
            </main>       
        </div>
    </div>

    <!-- <div class="col-lg-8">
        <form method="post" action="/dashboard/users" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">User</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{old('name')}}">
                @error('title')
                        <div  class="invalid-feedback">
                            {{$message}}
                        </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control  @error('slug') is-invalid @enderror" id="slug" name="slug" aria-label="Disabled input example" disable readonly required value="{{old('slug')}}">
                @error('slug')
                        <div  class="invalid-feedback">
                            {{$message}}
                        </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Create Category</button>
            
        </form>    
    </div> -->

    <script>
        // ambil ID yang udah kita buat yaitu name dan slug
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function(){
            fetch('/dashboard/users/checkSlug?name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });

    </script>

@endsection