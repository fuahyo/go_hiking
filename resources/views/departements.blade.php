@extends('layouts.main')

@section('container')
    <h1 class="mb-5" >Posts Departements</h1>
    <div class="container">
        <div class="row">
            @foreach ($departements as $departement)
                <div class="col-md-4 mb-3">
                    <a href="/posts?departement={{ $departement->slug }}">
                        <div class="card bg-dark text-white">
                            <img src="https://source.unsplash.com/500x500?{{ $departement->name }}" class="card-img" alt="{{ $departement->name }}">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color:rgba(0,0,0,0.5)">{{ $departement->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <a class="btn btn-primary" href="/posts">Back To All post</a>
    </div>
    <!-- @foreach ($categories as $departement)
        <ul>
            <li>
                <h3><a href="/categories/{{ $departement->slug }}">{{ $departement->name }}</a><a href=""></a></h3>
            </li>
        </ul>
    @endforeach -->
    
@endsection

