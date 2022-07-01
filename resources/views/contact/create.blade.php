
@extends('layouts.app')

@section('title')
    Create Contact
@endsection 

@section('content')
  @if ($errors->any())
    @foreach($errors->all() as $error )
      <div class="alert alert-danger">
        <ul>
          <li>
            {{$error}}
    @endforeach
          </li>
        </ul>
      </div>
  @endif
  {!! Form::open(['route' => 'contacts.store']) !!}
    <div class="mb-3">
      <label for="phone" class="form-label">phone</label>
      {!! Form::tel ('phone_num' , null , ['class' => 'form-control']) !!}
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  {!! Form::close() !!}
@endsection