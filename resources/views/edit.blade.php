@extends('layouts.master')

@section('content')
@foreach ($datafor as $item)
<div style="width: 40%" class="container my-3">
    <div class="input-group mb-3">
        <form action="{{url('up/'.$item->id)}}" method="post">
            @csrf
            @method('PUT')
            <input value="{{$item->body}}" name="uptodo" type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Update</button>
        </form>
    </div>
</div>
@endforeach
@endsection