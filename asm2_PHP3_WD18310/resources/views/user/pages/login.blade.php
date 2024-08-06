@extends('user.layout')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Đăng Nhập</h2>
            @if (session('success'))
                <p class="content-center">{{ session('success') }}</p>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
            </form>
            <div class="text-center mt-3">
                <a href="{{ route('register') }}">Đăng ký tài khoản</a>
            </div>
        </div>
    </div>
</div>
@endsection
