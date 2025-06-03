@extends('layout.client')

@section('title', $style == 'search' ? 'Tìm kiếm' : 'Danh mục')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/nouislider@15.7.0/dist/nouislider.min.css" rel="stylesheet">

@endsection

@section('content')
    <section>
        <div class="container">
            <input type="hidden" class="keywordHidden" name="keyword" value="{{ $keyword ?? '' }}">
            <input type="hidden" class="styleHidden" name="style" value="{{ $style ?? '' }}">
            @if ($results && $results->isNotEmpty() && count($results) > 0)
                <p class="py-2 m-0 p-0" style="font-size: 14px">
                    <a class="text-secondary text-decoration-none" href="{{ route('index') }}">
                        Trang chủ
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                    </svg>
                    <span class="text-black">
                        @if ($style == 'category')
                            {{ $results->first()->category->name ?? '' }}
                        @else
                            {{ $keyword ?? '' }}
                        @endif
                    </span>
                </p>
                <div class="bg-white rounded-4 p-4">
                    @include('client.page.search.filter')
                    @include('client.page.search.arrange')
                    <div class="show-result-check-radio">
                        @include('client.page.search.show')
                    </div>
                </div>
            @else
                @include('client.page.search.notfound')
            @endif
        </div>
    </section>
@endsection

@section('js')
    <script>
        // arrange
        let btnCheck = document.querySelectorAll('.btn-check-arrange');
        let keyword = document.querySelector('.keywordHidden').value;
        let style = document.querySelector('.styleHidden').value;
        btnCheck.forEach(element => {
            element.addEventListener('change', function() {
                if (element.checked) {
                    $.ajax({
                            url: "{{ route('search.arrange') }}",
                            type: "GET",
                            data: {
                                'type': element.value,
                                'keyword': keyword,
                                'style': style,
                            }
                        })
                        .done((response) => {
                            $('.show-result-check-radio').empty().html(response);
                        })
                        .fail((jqXHR, textStatus, errorThrown) => {
                            alertify.error('Có lỗi xảy ra vui lòng thử lại sau!');
                            console.error("Error filter:", textStatus, errorThrown);
                        });
                }
            })
        });

        // filter
        function filter() {
            let minHidden = document.querySelector('.minHidden').value;
            let maxHidden = document.querySelector('.maxHidden').value;
            let categories = [];
            let attributes = {};
            document.querySelectorAll('.category:checked').forEach(category => {
                categories.push(category.value);
            });
            document.querySelectorAll('.attribute:checked').forEach(attribute => {
                let attrId = attribute.name.match(/\d+/)[0];
                let value = attribute.value;

                if (!attributes[attrId]) {
                    attributes[attrId] = [];
                }
                attributes[attrId].push(value);
            });
            $.ajax({
                    url: "{{ route('search.filter') }}",
                    type: "GET",
                    data: {
                        'keyword': keyword,
                        'min': minHidden,
                        'max': maxHidden,
                        'category': categories,
                        'attribute': attributes,
                        'style': style,
                    }
                })
                .done((response) => {
                    $('.show-result-check-radio').empty().html(response);
                })
                .fail((jqXHR, textStatus, errorThrown) => {
                    alertify.error('Có lỗi xảy ra vui lòng thử lại sau!');
                    console.error("Error filter:", textStatus, errorThrown);
                });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/nouislider@15.7.0/dist/nouislider.min.js"></script>
    <script>
        // range filter price
        let getPrice = {!! json_encode($results->toArray()) !!}.map(item => item.variants.map(i => Number(i.price))).flat();
        if (getPrice.length > 0) {
            var min = Number(Math.min(...getPrice));
            var max = Number(Math.max(...getPrice));
            const slider = document.getElementById('slider');
            noUiSlider.create(slider, {
                start: [min, max],
                connect: true,
                step: 10000,
                range: {
                    min: min,
                    max: max
                },
                format: {
                    to: function(value) {
                        return Math.round(value);
                    },
                    from: function(value) {
                        return Number(value);
                    }
                }
            });

            const minValue = document.getElementById('minValue');
            const maxValue = document.getElementById('maxValue');

            slider.noUiSlider.on('update', function(values) {
                minValue.textContent = Number(values[0]).toLocaleString('vi-VN') + '₫';
                maxValue.textContent = Number(values[1]).toLocaleString('vi-VN') + '₫';
                document.querySelector('#min').value = values[0];
                document.querySelector('#max').value = values[1];
            });
        }
    </script>

@endsection
