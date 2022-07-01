
@extends('layouts.app')

@section('title')
    Index Contact
@endsection 

@section('content')
<div class="container p-5">
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">phone</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($phones as phone)
            <tr>
                <td>#</td>
                <td>{{$phone->phone}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('contacts.edit', $phone->id )}}"> update</a>
                    <form action="{{route('contacts.destroy',$phone->id)}}" method="post">
                        @method('Delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection