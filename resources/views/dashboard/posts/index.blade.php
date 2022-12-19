
@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 justify-content-center">All CAPA</h1>
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
          {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive ">
      
        <table class="table table-striped table-bordered" style="width: 100%;">
          <thead>
            <tr class="text-center col-md-auto">
                <th scope="col">No.</th>
                <!-- <th scope="col">Reference</th> -->
                <th scope="col">Finding</th>
                <th scope="col">Classification</th>
                <!-- <th scope="col">Requirement</th>
                <th scope="col">GAP Analysis</th>
                <th scope="col">Root Cause</th>
                <th scope="col">Corrective Action</th>
                <th scope="col">Preventive Action</th> -->
                <th scope="col">PIC</th>
                <th scope="col">Departement</th>
                <th scope="col">Timeline</th>
                <th scope="col">Status</th>    
                <th scope="col">Action</th>
                <th scope="col">Justiffikasi (1)</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <!-- <td class="text-center">{{ $post->source_capa }}</td> -->
                    <td>{{ $post->finding }}</td>
                    <td class="text-center">{{ $post->classification->name }}</td>
                    <!-- <td class="text-center">{{ $post->requirement }}</td>
                    <td class="text-center">{{ $post->gap_analysis }}</td>
                    <td class="text-center">{{ $post->rootcause->name }}</td>
                    <td>{{ $post->corrective_action }}</td>
                    <td>{{ $post->preventive_action }}</td> -->
                    <td class="text-center">{{ $post->user->name }}</td>
                    <td class="text-center">{{ $post->departement->name }}</td>
                    <td class="text-center">{{ $post->timeline->format('d M Y') }}</td>
                    <td class="text-center">{{ $post->status->name }}</td>
                    <td class="text-center">
                        <div class="">
                            
                            <a href="/dashboard/posts/{{$post->slug}}/edit" class="btn btn-success border-0 btn-sm mb-1 mr-1">
                              <i class="lnr lnr-pencil  "></i>
                              <span data-feather="edit"></span>
                            </a>
                          
                            <form action="/dashboard/posts/{{$post->slug}}" method="post" class="d-inline">
                              @method('delete')
                              @csrf
                              <button class="btn btn-danger border-0 btn-sm" onclick="return confirm('Are you sure?')"><i class="lnr lnr-trash  "></i></button>
                            </form>
                        </div>
                    </td>

                    <td class="text-center">
                        @if($post->modifikasi1 != null)
                          <div class="mb-1">
                            <!-- <a href="/dashboard/mypost/{{$post->slug}}/edit" class="btn btn-warning border-0 btn-sm mb-1 mr-1"><i class="fa fa-rocket"></i><span data-feather="edit"></span> Justifikasi</a> -->
                            <a href="{{ asset('storage/'.$post->modifikasi1) }}"><button class="btn btn-primary btn-sm" type="button">Modifikasi (1)</button></a>
                          </div>
                        @if($post->modifikasi2 != null)
                          <div>
                            <!-- <a href="/dashboard/mypost/{{$post->slug}}/edit" class="btn btn-warning border-0 btn-sm mb-1 mr-1"><i class="fa fa-rocket"></i><span data-feather="edit"></span> Justifikasi</a> -->
                            <a href="{{ asset('storage/'.$post->modifikasi2) }}"><button class="btn btn-info btn-sm" type="button">Modifikasi (2)</button></a>
                          </div>
                        @endif
                        @else
                          N/A
                        @endif
                      <!-- <a href="{{ asset('storage/'.$post->modifikasi1) }}"><button class="btn btn-dark btn-sm" type="button">Modifikasi (1)</button></a> -->
                    </td>
                </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
@endsection