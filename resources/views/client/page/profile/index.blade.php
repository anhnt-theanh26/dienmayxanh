@extends('layout.client')

@section('content')
    <section>
        <div class="container" style="flex-shrink: 0; min-width: 1200px;">
            <div class="row p-3">
                @include('client.page.profile.left')
                @yield('content-profile-bill')
            </div>
        </div>
    </section>
    <script>
        // 1 ảnh
        var image = document.querySelector('#image');
        var img = document.querySelector('#img');
        if(image && img){
            image.addEventListener('change', function(e) {
                e.preventDefault();
                img.src = URL.createObjectURL(this.files[0]);
            })
        }
    </script>
@endsection

@section('js')
@endsection
