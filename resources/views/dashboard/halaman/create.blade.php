@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{route('halaman.index')}}" class="btn btn-secondary"><< Back</a></div>
    <form action="{{route('halaman.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tittle" class="form-label">Tittle</label>
            <input
                type="text"
                class="form-control"
                name="tittle"
                id="tittle"
                aria-describedby="helpId"
                placeholder="Tittle"
                value="{{Session::get('judul')}}"
            />
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control summernote" id="content" rows="5" name="content" value="{{Session::get('isi')}}">
            </textarea>
        </div>
        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
        
    </form>
    
@endsection