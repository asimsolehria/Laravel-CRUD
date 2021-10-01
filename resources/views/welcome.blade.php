@extends('layouts.master')

@section('content')
<div style="width: 50%" class="container my-3">
    @if (session()->has('success'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Your task has been saved',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    @endif
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <form action="{{url('/done')}}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input required="" name="task" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add</button>
        </div>
    </form>
    <table class="table table-dark table-striped">
        <thead>
            <td>Task Name</td>
            <td>Task Saved At</td>
            <td>Task Updated At</td>
            <td colspan="2" align="center">Options</td>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{$item->body}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td>
                    <form action="{{url('/display/'.$item->id)}}" method="post">
                        {{method_field('DELETE')}}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline-info btn-sm">Update</button>
                    </form>
                </td>
                <td>
                    <form action="{{url('/del/'.$item->id)}}" method="post">
                        {{method_field('DELETE')}}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if (session()->has('deleted'))
    <script>
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
        })
    </script>
    @endif
</div>
@endsection