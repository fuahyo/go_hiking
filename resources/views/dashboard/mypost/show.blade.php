
@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            
    </div>
             
    <div class="col-lg-8">
        <a href="/dashboard/mypost" class="btn btn-success mb-3"><span data-feather="arrow-left"></span> Back To My CAPA</a>
        <div class="card mb-3">
            <div class="card-header">
            Referensi (Sumber CAPA): 
            </div>
            <div class="card-body">
                {{$post->source_capa}}
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header text-center text-uppercase">
                Title: 
            </div>
            <div class="card-body">
                {{$post->title}}
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header text-center text-uppercase">
                Temuan: 
            </div>
            <div class="card-body">
                {{$post->finding}}
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header text-center text-uppercase">
                Classification: 
            </div>
            <div class="card-body">
                {{$post->classification->name}}
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header text-center text-uppercase">
                Requirement: 
            </div>
            <div class="card-body">
                {{$post->requirement}}
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header text-center text-uppercase">
                GAP Analysist: 
            </div>
            <div class="card-body">
                {{$post->gap_analysis}}
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header text-center text-uppercase">
                Root Cause: 
            </div>
            <div class="card-body">
                {{$post->rootcause->name}}
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header text-center text-uppercase">
                Corrective Action: 
            </div>
            <div class="card-body">
                {{$post->corrective_action}}
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header text-center text-uppercase">
                Preventive Action: 
            </div>
            <div class="card-body">
                {{$post->preventive_action}}
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header text-center text-uppercase">
                Timeline: 
            </div>
            <div class="card-body">
                {{$post->timeline->format('d M Y') }}
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header text-center text-uppercase">
                Departement: 
            </div>
            <div class="card-body">
                {{$post->departement->name}}
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header text-center text-uppercase">
                User: 
            </div>
            <div class="card-body">
                {{$post->user->name}}
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header text-center text-uppercase">
                Keterangan: 
            </div>
            <div class="card-body">
                {{$post->prove}}
            </div>
        </div>
        
        
        
        <form method="post" action="/dashboard/mypost/{{$post->slug}}" class="mb-3" enctype="multipart/form-data">
            @method('put')
            @csrf   
            <div class="card mb-3">
                <div class="card-header text-center text-uppercase">
                    Bukti Closing CAPA: 
                </div>
                <div class="card-body">
                    <input class="mb-1" type="hidden" name="oldImage" value="{{ $post->image }}">
                    <input type="hidden" name="oldImage" value="{{ $post->image }}">
                    @if($post->image)
                        <img src="{{ asset('storage/'.$post->image) }}"class="img-preview img-fluid mb-2 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-2 col-sm-5">   
                    @endif 
                </div>
            </div>      
            
        </form>    
    </div>

    <!-- pakai fetch API -->
    <script>
       
        // ambil ID yang udah kita buat yaitu title dan slug
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function(){
            fetch('/dashboard/mypost/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });

        function changename(){
        document.getElementById('rootcause_id').name = "aku";
        } 

        // disable fungsi upload file kaya di email
        document.addEventListener('trix-file-accept', function(e) {
           e.preventDefault(); 
        });

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