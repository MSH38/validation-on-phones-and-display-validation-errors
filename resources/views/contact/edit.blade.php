
@extends('layouts.app')

@section('title')
    Edit Contact
@endsection 

@section('content')
<form action="{{route('contacts.update',$phone->id)}}" method="post">
  @method('PUT')
  @csrf
  <div class="container p-5">
    <div class="container p-5">
    <label for="phone" class="form-label">phone</label> 
    <input type="tel" class="form-control" names="phone" id="phone" value="{{$phone->phone}}">
    </div>
    <button type="submit" class="btn btn-danger">Edit</button>
  </div>
</form>
@endsection