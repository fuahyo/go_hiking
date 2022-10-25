@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">My CAPA</h1>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
          {{ session('success') }}
        </div>
    @endif

    <!-- <div class="table-responsive col-lg-6 "> -->
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
                <th scope="col">Timeline</th>
                <th scope="col">Proof</th>
                <th scope="col">Status</th>    
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
                    <td class="text-center">{{ $post->timeline->format('d M Y') }}</td>
                    <td class="text-center">
                      <div class="">
                        <a href="/dashboard/mypost/{{$post->slug}}/edit" class="btn btn-warning border-0 btn-sm mb-1 mr-1"><span data-feather="edit"></span>upload</a>
                      </div>
                    </td>
                    <td class="text-center">{{ $post->status->name }}</td>
                </tr>
            @endforeach
            
          </tbody>
        </table>
      <!-- </div> -->
@endsection