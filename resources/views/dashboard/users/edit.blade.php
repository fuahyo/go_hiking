@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit User</h1>
            <!-- <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
            </div> -->
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/users/ {{$user->id}}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-2" >
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control rounded @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{old('name', $user->name)}}">
                    @error('name')
                    <div  class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control rounded @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{old('username', $user->username)}}">
                    @error('username')
                    <div  class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-1">
                    <label for="departement" class="form-label">Departement</label>
                    <select class="form-select" name="departement_id">
                        @foreach ($departements as $departement)
                            @if( old('departement_id', $user->departement_id) == $departement->id)
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
                        @foreach ($roles as $role)
                            @if( old('role_id', $user->role_id) == $role->id)
                            <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                            @else
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-2">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control rounded @error('email') is-invalid @enderror" id="email" placeholder="ename@example.com" required value="{{old('email', $user->email)}}">
                    @error('email')
                    <div  class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control rounded @error('password') is-invalid @enderror" id="password" placeholder="Password" required value="{{old('password', $user->password)}}" >
                    @error('password')
                    <div  class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            
            <button type="submit" class="btn btn-outline-primary">Edit User</button>
            
        </form>    
    </div>

    <script>
        // ambil ID yang udah kita buat yaitu name dan slug
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function(){
            fetch('/dashboard/categories/checkSlug?name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });

    </script>

@endsection