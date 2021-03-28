@extends('main')

@section('content')
    <form action="/login" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" />
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password" />
        </div>
        <button type="submit" class="btn btn-default">Login!</button>
    </form>
@endsection