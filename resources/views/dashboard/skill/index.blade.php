@extends('dashboard.layout')

@section('konten')
    <form action="{{route('skill.update')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tittle" class="form-label">Programming Language & Tools</label>
            <input
                type="text"
                class="form-control form-control-sm skill"
                name="_language"
                id="tittle"
                aria-describedby="helpId"
                value="{{get_meta_value('_language')}}"
            />
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Workflow</label>
            <textarea class="form-control summernote" id="content" rows="5" name="_workflow">
                {{get_meta_value('_workflow')}}
            </textarea>
        </div>
        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
        
    </form>
    
@endsection
 
@push('child-scripts')
<script>
    $(document).ready(function() {
        $('.skill').tokenfield({
            autocomplete: {
                source: [{!! $skill !!}],
                delay: 100
            },
            showAutocompleteOnFocus: true
        });
    });
  </script>
@endpush