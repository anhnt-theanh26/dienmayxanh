@if (!empty($searchs) && $searchs !== null)
    <section>
        <div class="container my-3">
            <div class="bg-white rounded-4 p-3">
                <h4 class="fw-bold">Mọi người cũng tìm kiếm</h4>
                <div class="m-0 p-0">
                    @foreach ($searchs as $search)
                        <span class="bg-dark-subtle rounded-3 px-2" style="margin-right: 10px;">
                            <a class="text-decoration-none text-dark" href="#">{{ $search->search }}</a>
                        </span>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endif
