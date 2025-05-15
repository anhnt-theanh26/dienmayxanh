@if (session('message'))
    <p>{{ session('message') }}</p>
@endif

<p>Vui lòng xác minh email của bạn bằng cách nhấp vào liên kết trong email.</p>

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit">Gửi lại email xác minh</button>
</form>
