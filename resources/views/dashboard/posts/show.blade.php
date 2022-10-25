@extends('dashboard.layouts.main')

@section('container')
        <div class="container">
            <div class="row my-3">
                <div class="col-lg-8">

                    <h2 class="mb-3"> {{ $post->title }} </h2>
                    <a href="/dashboard/posts" class="btn btn-success mb-3"><span data-feather="arrow-left"></span> Back To My Post</a>

                    <!-- <div class="container"> -->
                        <div class="row">
                            <div class="card" style="max-width: 18rem;">
                                <form method="post" action="/dashboard/posts/{{$post->slug}}" class="mb-1" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="card-body">
                                        <h5 class="card-header text-center mb-1 border">Bukti Sebelum</h5>
                                        <input class="mb-1" type="hidden" name="oldImage" value="{{ $post->image }}">               
                                        <input type="hidden" name="oldImage" value="{{ $post->image }}">
                                        @if($post->image)
                                            <img src="{{ asset('storage/'.$post->image) }}"class="img-preview img-fluid mb-2 col-sm-5 d-block">
                                        @else
                                            <img class="img-preview img-fluid mb-2 col-sm-5">   
                                        @endif

                                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                        @error('image')
                                                <div  class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                        @enderror

                                        <div class="mt-2 mb-2">
                                            <label for="prove" class="form-label mt-1">Keterangan:</label>
                                            <input type="text" class="form-control @error('prove') is-invalid @enderror" id="prove" name="prove" required autofocus value="{{old('prove', $post->prove)}}">
                                            @error('prove')
                                                <div  class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> 
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <button type="submit" class="btn btn-primary">Upload Bukti</button>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- <div class="card col-6" style="max-width: 18rem;">
                                <form method="post" action="/dashboard/posts/{{$post->slug}}" class="mb-1" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="card-body">
                                        <h5 class="card-header text-center mb-1 border">Bukti Sebelum</h5>
                                     <input class="mb-1" type="hidden" name="oldImage" value="{{ $post->image }}">
                                        @if($post->image)
                                        <div style="max-height:300px; overflow:hidden">
                                            <img src="{{ asset('storage/'.$post->image) }}"class="card-img-top">
                                        </div>
                                        @else
                                        <img class="card-img-top">   
                                        @endif
                                        <input class="form-control @error('image') is-invalid @enderror mt-1" type="file" id="image" name="image" onchange="previewImage()">
                                        @error('image')
                                                <div  class="invalid-feedback mt-1">
                                                    {{$message}}
                                                </div>
                                        @enderror
                                        <div class="mt-2 mb-2">
                                            <label for="prove" class="form-label mt-1">Keterangan:</label>
                                            <input type="text" class="form-control @error('prove') is-invalid @enderror" id="prove" name="prove" required autofocus value="{{old('prove', $post->prove)}}">
                                            @error('prove')
                                                    <div  class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Upload Bukti</button>
                                    </div>
                                </form>
                            </div> -->
                        </div>
                    <!-- </div> -->
                    

                    <p> By. 
                        <a href="/posts?author={{$post->author->username}}" class="text-decoration-none">{{ $post->author->name }}</a> 
                        in 
                        <a href="/posts?departement={{$post->departement->slug}}" class="text-decoration-none">{{$post->departement->name}} </a>
                    </p>

                    @if($post->image)
                        <div style="max-height:350px; overflow:hidden">
                            <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid mt-3" alt="{   {$post->departement->name}}">
                        </div>
                    @endif

                    <article class="my-3 fs-5">
                        {!! $post->source_capa !!}
                    </article>
                    

                    
                </div>
            </div>
        </div>
        <script>
        // ambil ID yang udah kita buat yaitu title dan slug
        // const title = document.querySelector('#title');
        // const slug = document.querySelector('#slug');

        // title.addEventListener('change', function(){
        //     fetch('/dashboard/posts/checkSlug?title=' + title.value)
        //     .then(response => response.json())
        //     .then(data => slug.value = data.slug)
        // });


        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            //mengambil data gambar
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            //ketika di load, jalankan sebuah fungtion oFREvent
            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>
@endsection