@extends('dashboard.layout')

@section('konten')
    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card" style="width:170px">
            @if (get_meta_value('_foto'))
                <img class="card-img-top" src="{{asset('foto')."/".get_meta_value('_foto')}}" alt="Card image" style="width:100%">
            @endif
            <div class="card-body">
                <h3 class="card-title">Photo Profile</h3>
            </div>
        </div>
        <br>

        <div class="row justify-content-between mb-3">
            <div class="col-6">
                <div class="mb-2">
                    <h3>Profile</h3>
                </div>
                <div class="mb-3">
                    <label for="_foto" class="form-label">Photo</label>
                    <input type="file" class="form-control form-control-sm" name="_foto" id="_foto">
                </div>

                <div class="mb-3">
                    <label for="_kota" class="form-label">City</label>
                    <input type="text" class="form-control form-control-sm" name="_kota" id="_kota" value="{{get_meta_value('_kota')}}">
                </div>

                <div class="mb-3">
                    <label for="_provinsi" class="form-label">Province</label>
                    <input type="text" class="form-control form-control-sm" name="_provinsi" id="_provinsi" value="{{get_meta_value('_provinsi')}}">
                </div>

                <div class="mb-3">
                    <label for="_nohp" class="form-label">Phone Number</label>
                    <input type="text" class="form-control form-control-sm" name="_nohp" id="_nohp" value="{{get_meta_value('_nohp')}}">
                </div>

                <div class="mb-3">
                    <label for="_email" class="form-label">Email</label>
                    <input type="text" class="form-control form-control-sm" name="_email" id="_email" value="{{get_meta_value('_email')}}">
                </div>

            </div>
            
            <div class="col-6">
                <div class="mb-2">
                    <h3>Social Media Account</h3>
                </div>

                <div class="mb-3">
                    <label for="_facebook" class="form-label">Username Facebook</label>
                    <input type="text" class="form-control form-control-sm" name="_facebook" id="_facebook" value="{{get_meta_value('_facebook')}}">
                </div>

                <div class="mb-3">
                    <label for="_twitter" class="form-label">Username Twitter</label>
                    <input type="text" class="form-control form-control-sm" name="_twitter" id="_twitter" value="{{get_meta_value('_twitter')}}">
                </div>

                <div class="mb-3">
                    <label for="_linkedin" class="form-label">Username Linkedin</label>
                    <input type="text" class="form-control form-control-sm" name="_linkedin" id="_linkedin" value="{{get_meta_value('_linkedin')}}">
                </div>

                <div class="mb-3">
                    <label for="_github" class="form-label">Username Github</label>
                    <input type="text" class="form-control form-control-sm" name="_github" id="_github" value="{{get_meta_value('_github')}}">
                </div>

                <div class="mb-3">
                    <label for="_instagram" class="form-label">Username Instagram</label>
                    <input type="text" class="form-control form-control-sm" name="_instagram" id="_instagram" value="{{get_meta_value('_instagram')}}">
                </div>
            </div>
        </div>

        
        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
        
        
    </form>

    
    
@endsection