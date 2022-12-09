<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Folarium Pegawai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Folarium</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('seluruhpegawai.create') }}"> Create Pegawai</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>S.No</th>
            <th>Pegawai Name</th>
            <th>Pegawai Email</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($seluruhpegawai as $pegawai)
        <tr>
            <td>{{ $pegawai->id }}</td>
            <td>{{ $pegawai->name }}</td>
            <td>{{ $pegawai->email }}</td>
            <td>
                <form action="{{ route('seluruhpegawai.destroy',$pegawai->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('seluruhpegawai.edit',$pegawai->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {!! $seluruhpegawai->links() !!}
</div>
</body>
</html>
