@extends('client.page.profile.index')
@section('title', 'Tài khoản của tôi')

@section('content-profile-bill')
    <div class="col-9">
        @include('client.page.profile.top')
        @include('client.page.profile.content')
    </div>
@endsection
