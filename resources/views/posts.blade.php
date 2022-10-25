@extends('layouts.main')

@section('container')

    <h1 class="text-center my-3">{{$title}}</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                @if(request('departement'))
                    <input type="hidden" name="departement" value="{{ request('departement') }}">
                @endif
                @if(request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input value="{{ request('search') }}" type="text" class="form-control" placeholder="Search..." name="search">
                    <button class="btn btn-danger" type="submit" >Search</button>
                </div>
            </form>
        </div>
    </div>
    

    <!-- <div class="table-responsive"> -->
        <table class="table table-striped table-bordered" style="width: 100%;">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Referensi</th>
              <th scope="col">Temuan</th>
              <th scope="col">Klasifikasi</th>
              <th scope="col">Persyaratan</th>
              <th scope="col">GAP Analysis</th>
              <th scope="col">Akar Masalah</th>
              <th scope="col">Tindakan Perbaikan</th>
              <th scope="col">Tindakan Pencegahan</th>
              <th scope="col">PIC</th>
              <th scope="col">Departement</th>
              <th scope="col">Timeline</th>
              <!-- <th scope="col">Bukti Perbaikan</th> -->
              <th scope="col">Status</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->source_capa }}</td>
                    <td>{{ $post->finding }}</td>
                    <td>{{ $post->classification->name }}</td>
                    <td>{{ $post->requirement }}</td>
                    <td>{{ $post->gap_analysis }}</td>
                    <td>{{ $post->rootcause->name }}</td>
                    <td>{{ $post->corrective_action }}</td>
                    <td>{{ $post->preventive_action }}</td>
                    <td>{{ $post->author->name }}</td>
                    <td>{{ $post->departement->name }}</td>
                    <td>{{ $post->timeline->format('d M Y') }}</td>
                    <!-- <td>
                        <div class="">
                            <a href="/dashboard/posts/{{$post->slug}}" class="btn btn-warning border-0 btn-sm"><span data-feather="eye"></span>view</a>

                            <a href="/dashboard/posts/{{$post->slug}}/edit" class="btn btn-success border-0 btn-sm"><span data-feather="edit"></span>edit</a>

                            <form action="/dashboard/posts/{{$post->slug}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0 btn-sm" onclick="return confirm('Are you sure?')">delete</button>
                            </form>
                        </div>
                    </td> -->
                    <td>{{ $post->status->name }}</td>
                </tr>
            @endforeach
            
          </tbody>

          
        </table>
      <!-- </div> -->
    
    <!-- ----------------------------------batas------------------------------------ -->

   
    
@endsection

