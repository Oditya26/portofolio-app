@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{route('education.index')}}" class="btn btn-secondary"><< Back</a></div>
    <form action="{{route('education.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tittle" class="form-label">University Name</label>
            <input
                type="text"
                class="form-control"
                name="tittle"
                id="tittle"
                aria-describedby="helpId"
                placeholder="University Name"
                value="{{Session::get('judul')}}"
            />
        </div>
        <div class="mb-4">
            <label for="tittle" class="form-label">Faculty Name</label>
            <input
                type="text"
                class="form-control"
                name="info1"
                id="info1"
                aria-describedby="helpId"
                placeholder="Faculty Name"
                value="{{Session::get('info1')}}"
            />
        </div>
        <div class="mb-4">
            <label for="tittle" class="form-label">Study Program</label>
            <input
                type="text"
                class="form-control"
                name="info2"
                id="info2"
                aria-describedby="helpId"
                placeholder="Study Program"
                value="{{Session::get('info2')}}"
            />
        </div>
        <div class="mb-4">
            <label for="tittle" class="form-label">GPA</label>
            <input
                type="number"
                class="form-control"
                name="info3"
                id="info3"
                aria-describedby="helpId"
                placeholder="GPA"
                step="0.01"
                value="{{Session::get('info3')}}"
            />
        </div>
        <div class="mb-4">
            <div class="row">
                <div class="col-auto">Date Start</div>
                <div class="col-auto">
                    <input type="date"
                    class="form-control form-control-sm"
                    name="tgl_mulai"
                    placeholder="dd/mm/yyyy"
                    value="{{Session::get('tgl_mulai')}}">
                </div>
                <div class="col-auto">Date End</div>
                <div class="col-auto">
                    <input type="date"
                    class="form-control form-control-sm"
                    name="tgl_akhir"
                    placeholder="dd/mm/yyyy"
                    value="{{Session::get('tgl_akhir')}}">
                </div>
            </div>
        </div>
        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
        
    </form>
    
@endsection