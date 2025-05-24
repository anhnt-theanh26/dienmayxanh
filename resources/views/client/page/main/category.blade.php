<!-- danh mục  -->
@php
    $menucategorymain = null;
    $randomMenuCategoryHotItems = null;
    $randomMenuCategoryNormalItems = null;
    if (!empty($menus) && $menus !== null) {
        $categoryMenu = $menus->skip(1)->first();
        if ($categoryMenu?->menus) {
            $menucategorymain = $categoryMenu?->menus?->first()?->menuitems?->sortBy('location');
        }
    }
    if ($menucategorymain) {
        $menuCategoryHotItems = $menucategorymain?->filter(function ($item) {
            return $item?->category?->is_hot == true;
        });
        $randomMenuCategoryHotItems =
            $menuCategoryHotItems?->count() >= 4 ? $menuCategoryHotItems?->random(4) : $menucategorymain?->take(4);

        $menuCategoryNormalItems = $menucategorymain?->diff($randomMenuCategoryHotItems);
        $randomMenuCategoryNormalItems =
            $menuCategoryNormalItems?->count() >= 11
                ? $menuCategoryNormalItems?->random(11)
                : $menucategorymain?->skip(4)?->take(11);
    }
@endphp
@if ($menucategorymain && $menucategorymain->isNotEmpty())
    <section>
        <div class="py-4">
            <div class="container bg-white rounded-3" style="flex-shrink: 0; min-width: 1200px;">
                <div class="row">
                    <div class="col-3">
                        <div class="row">
                            @if ($randomMenuCategoryHotItems)
                                @foreach ($randomMenuCategoryHotItems as $category_hot)
                                    @if ($category_hot?->category?->is_hot == true)
                                        <div class="col-6 p-3">
                                            <div class="text-center">
                                                <div class="position-relative">
                                                    <img class="rounded-2 object-fit-contain"
                                                        style="width: 50px; height: 50px;"
                                                        src="{{ $category_hot->category->image ? asset($category_hot->category->image) : asset('storage/default.jpg') }}"
                                                        alt="{{ $category_hot->category->name }}">
                                                    <span style="top: 10px; right: 0;"
                                                        class="position-absolute translate-middle badge rounded-pill bg-danger-subtle text-danger">
                                                        HOT
                                                    </span>
                                                </div>
                                                <p class="p-0 m-0 pt-1">{{ $category_hot?->category?->name }}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-9">
                        <div class="row">
                            @if ($randomMenuCategoryNormalItems)
                                @foreach ($randomMenuCategoryNormalItems as $category_normal)
                                    <div class="col-2 p-3">
                                        <div class="text-center">
                                            <img class="rounded-2 object-fit-contain" style="width: 50px; height: 50px;"
                                                src="{{ $category_normal->category->image ? asset($category_normal->category->image) : asset('storage/default.jpg') }}"
                                                alt="{{ $category_normal->category->name ? $category_normal->category->name : 'Khong co anh' }}">

                                            <p class="p-0 m-0 pt-1">{{ $category_normal?->category?->name }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="col-2 p-3">
                                <div class="text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                                    </svg>
                                    <p class="p-0 m-0 pt-1">Tất cả danh mục</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!--hết danh mục  -->
