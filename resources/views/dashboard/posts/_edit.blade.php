@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit CAPA</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/posts/{{$post->slug}}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="source_capa" class="form-label">Referensi (Sumber CAPA)</label>
                <input type="text" class="form-control @error('source_capa') is-invalid @enderror" id="source_capa" name="source_capa" required autofocus value="{{old('source_capa', $post->capa)}}">
                @error('source_capa')
                        <div  class="invalid-feedback">
                            {{$message}}
                        </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{old('title', $post->title)}}">
                @error('title')
                        <div  class="invalid-feedback">
                            {{$message}}
                        </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="finding" class="form-label">Temuan</label>
                <input type="text" class="form-control @error('finding') is-invalid @enderror" id="finding" name="finding" required autofocus value="{{old('finding', $post->finding)}}">
                @error('finding')
                        <div  class="invalid-feedback">
                            {{$message}}
                        </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="classification" class="form-label">Classification</label>
                <select class="form-select" name="classification_id">
                    @foreach ($classifications as $classification)
                        @if( old('classification_id', $post->classification_id) == $classification->id)
                        <option value="{{ $classification->id }}" selected>{{ $classification->name }}</option>
                        @else
                        <option value="{{ $classification->id }}">{{ $classification->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="requirement" class="form-label">Requirement</label>
                <input type="text" class="form-control @error('requirement') is-invalid @enderror" id="requirement" name="requirement" required autofocus value="{{old('requirement', $post->requirement)}}">
                @error('requirement')
                        <div  class="invalid-feedback">
                            {{$message}}
                        </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gap_analysis" class="form-label">GAP Analysis</label>
                <input type="text" class="form-control @error('gap_analysis') is-invalid @enderror" id="gap_analysis" name="gap_analysis" required autofocus value="{{old('gap_analysis', $post->gap_analysis)}}">
                @error('gap_analysis')
                        <div  class="invalid-feedback">
                            {{$message}}
                        </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="rootcause" class="form-label">Rootcause</label>
                <select class="form-select" name="rootcause_id">
                    @foreach ($rootcauses as $rootcause)
                        @if( old('rootcause_id', $post->rootcause_id) == $rootcause->id)
                        <option value="{{ $rootcause->id }}" selected>{{ $rootcause->name }}</option>
                        @else
                        <option value="{{ $rootcause->id }}">{{ $rootcause->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="corrective_action" class="form-label">Corrective Action</label>
                <input type="text" class="form-control @error('corrective_action') is-invalid @enderror" id="corrective_action" name="corrective_action" required autofocus value="{{old('corrective_action', $post->corrective_action)}}">
                @error('corrective_action')
                        <div  class="invalid-feedback">
                            {{$message}}
                        </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="preventive_action" class="form-label">Preventive Action</label>
                <input type="text" class="form-control @error('preventive_action') is-invalid @enderror" id="preventive_action" name="preventive_action" required autofocus value="{{old('preventive_action', $post->preventive_action)}}">
                @error('preventive_action')
                        <div  class="invalid-feedback">
                            {{$message}}
                        </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="timeline" class="form-label">Timeline</label>
                <input type="date" class="form-control @error('timeline') is-invalid @enderror" id="timeline" name="timeline" required autofocus value="{{old('timeline', $post->timeline)}}">
                @error('timeline')
                        <div  class="invalid-feedback">
                            {{$message}}
                        </div>
                @enderror
                @error('timeline')
                        <div  class="invalid-feedback">
                            {{$message}}
                        </div>
                @enderror
            </div>

            

            <!-- upload gambar -->
            <!-- <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
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
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')

                
                        <p  class="text-danger">
                            {{$message}}
                        </p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{old('body', $post->body)}}">
                <trix-editor input="body"></trix-editor>
            </div> -->
            
            <button type="submit" class="btn btn-primary">Update Post</button>

            <div class="mb-3">
                <input type="text" class="form-control  @error('slug') is-invalid @enderror invisible" id="slug" name="slug" aria-label="Disabled input example" disable readonly required value="{{old('slug', $post->slug)}}">
            </div>
            <!-- <div>
                <input type="text" disable readonly required value=" {{old('auth()->user()->id', $post->auth()->user()->id)}}" class="form-control @error('user') is-invalid @enderror invisible" id="user" name="user_id">
            </div>
            <div class="mb-3">
                <input type="text" disable readonly required value=" {{old('auth()->user()->departement_id', $post->auth()->user()->departement_id)}} " class="form-control @error('departement') is-invalid @enderror invisible" id="departement" name="departement_id">
            </div> -->

            
            <!-- <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
        </form>    
    </div>

    <!-- pakai fetch API -->
    <script>
        // ambil ID yang udah kita buat yaitu title dan slug
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function(){
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });

        // disable fungsi upload file kaya di email
        // document.addEventListener('trix-file-accept', function(e) {
        //    e.preventDefault(); 
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