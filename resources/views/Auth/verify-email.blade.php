@extends("layout.default")
@section("title", "Verify Email")
@section("content")
    <h1>Please verify your email through the mail we've sent to you</h1>

    <p>Didn't get the email?</p>
    <form action="{{ route('verification.send') }}" method="post">
        @csrf

        <button>Send again</button>
    </form>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection
