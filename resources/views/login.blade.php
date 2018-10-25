@extends('main')

@section('content')
    <form action="/user/login", method="POST">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" />
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" />
        </div>
        <button type="submit" class="btn btn-default">Login!</button>
    </form>
@endsection