@extends('dashboard.layout')

@section('konten')
    <p class="card-title">Education</p>
    <div class="pd-3"><a href="{{route('education.create')}}" class="btn btn-primary">+ Add Education</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>University Name</th>
                    <th>Faculty Name</th>
                    <th>Program Study</th>
                    <th>GPA</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th class="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$item->judul}}</td>
                    <td>{{$item->info1}}</td>
                    <td>{{$item->info2}}</td>
                    <td>{{$item->info3}}</td>
                    <td>{{$item->tgl_mulai_indo}}</td>
                    <td>{{$item->tgl_akhir_indo}}</td>
                    <td>
                        <a href="{{route('education.edit', $item->id)}}" class="btn btn-sm btn-warning">Edit</a>
                        <form onsubmit="return confirm('Do you sure want to delete data?')" action="{{route('education.destroy',$item->id)}}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit" name="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>   
@endsection
