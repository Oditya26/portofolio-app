@extends('dashboard.layout')

@section('konten')
    <p class="card-title">Pages</p>
    <div class="pd-3"><a href="{{route('halaman.create')}}" class="btn btn-primary">+ Add Page</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Tittle</th>
                    <th class="col-3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$item->judul}}</td>
                    <td>
                        <a href="{{route('halaman.edit', $item->id)}}" class="btn btn-sm btn-warning">Edit</a>
                        <form onsubmit="return confirm('Do you sure want to delete data?')" action="{{route('halaman.destroy',$item->id)}}" class="d-inline" method="POST">
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
