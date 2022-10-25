
@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">All CAPA</h1>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
          {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive ">
      <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
        <table class="table table-striped table-bordered" style="width: 100%;">
          <thead>
            <tr class="text-center col-md-auto">
                <th scope="col">No.</th>
                <th scope="col">Reference</th>
                <th scope="col">Finding</th>
                <th scope="col">Classification</th>
                <th scope="col">Requirement</th>
                <th scope="col">GAP Analysis</th>
                <th scope="col">Root Cause</th>
                <th scope="col">Corrective Action</th>
                <th scope="col">Preventive Action</th>
                <th scope="col">PIC</th>
                <th scope="col">Departement</th>
                <th scope="col">Timeline</th>
                <th scope="col">Status</th>    
                <th scope="col">Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $post->source_capa }}</td>
                    <td>{{ $post->finding }}</td>
                    <td class="text-center">{{ $post->classification->name }}</td>
                    <td class="text-center">{{ $post->requirement }}</td>
                    <td class="text-center">{{ $post->gap_analysis }}</td>
                    <td class="text-center">{{ $post->rootcause->name }}</td>
                    <td>{{ $post->corrective_action }}</td>
                    <td>{{ $post->preventive_action }}</td>
                    <td class="text-center">{{ $post->user->name }}</td>
                    <td class="text-center">{{ $post->departement->name }}</td>
                    <td class="text-center">{{ $post->timeline->format('d M Y') }}</td>
                    <td class="text-center">{{ $post->status->name }}</td>
                    <td class="text-center">
                        <div class="">
                            <!-- <a href="/dashboard/posts/{{$post->slug}}" class="btn btn-warning border-0 btn-sm"><span data-feather="eye"></span>view</a> -->

                            <a href="/dashboard/posts/{{$post->slug}}/edit" class="btn btn-success border-0 btn-sm mb-1 mr-1"><span data-feather="edit"></span>edit</a>
                            
                            <form action="/dashboard/posts/{{$post->slug}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0 btn-sm" onclick="return confirm('Are you sure?')">delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
@endsection