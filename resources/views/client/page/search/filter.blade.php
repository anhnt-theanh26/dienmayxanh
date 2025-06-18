<div class="">
    <button class="btn border-primary btn-outline-primary" data-bs-target="#filter" data-bs-toggle="modal">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel"
            viewBox="0 0 16 16">
            <path
                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z" />
        </svg>
        Lọc
    </button>
    <div class="modal modal-lg fade text-black" id="filter" aria-hidden="true" aria-labelledby="filterLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                @csrf
                <input type="hidden" class="" name="keyword" value="{{ $keyword ?? '' }}">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="filterLabel">
                        {{ config('setting.site_name') }}
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <h4>Chọn khoảng giá:</h4>
                        <div id="slider"></div>
                        <p class="mt-3">
                            Giá từ:
                            <strong id="minValue"></strong>
                            đến
                            <strong id="maxValue"></strong>
                            <input type="hidden" name="min" class="minHidden" id="min">
                            <input type="hidden" name="max" class="maxHidden" id="max">
                        </p>
                    </div>
                    <div class="pt-2">
                        <h5>Danh mục:</h5>
                        @php
                            $categorysSelects = [];
                            foreach ($results as $item) {
                                if (!in_array($item->category, $categorysSelects)) {
                                    array_push($categorysSelects, $item->category);
                                }
                            }
                        @endphp
                        @foreach ($categorysSelects as $category)
                            <input type="checkbox" class="btn-check category" id="btn-check-{{ $category->id }}"
                                value="{{ $category->id }}" autocomplete="off" name="category[]">
                            <label class="btn" for="btn-check-{{ $category->id }}">{{ $category->name }}</label>
                        @endforeach
                    </div>
                    <div class="pt-2">
                        <h5>Thuộc tính:</h5>
                        @php
                            $groupedAttributes = [];
                            foreach ($results as $items) {
                                foreach ($items->attributeValues as $item) {
                                    $attributeName = $item->attribute->name;
                                    if (!isset($groupedAttributes[$attributeName])) {
                                        $groupedAttributes[$attributeName] = [];
                                    }
                                    $groupedAttributes[$attributeName][] = $item;
                                }
                            }
                            $groupedAttributeFilters = [];
                            $seenValues = [];

                            foreach ($groupedAttributes as $key => $items) {
                                $seenValues[$key] = [];
                                foreach ($items as $item) {
                                    if (!in_array(strtolower($item->value), $seenValues[$key])) {
                                        $groupedAttributeFilters[$key][] = $item;
                                        $seenValues[$key][] = strtolower($item->value);
                                    }
                                }
                            }
                        @endphp
                        @foreach ($groupedAttributeFilters as $key => $items)
                            <h6>{{ $key }}</h6>
                            @foreach ($items as $item)
                                <input type="checkbox" class="btn-check attribute"
                                    id="btn-check-{{ $item->value }}-{{ $item->value }}" autocomplete="off"
                                    name="attribute[{{ $item->attribute_id }}][]" value="{{ $item->value }}">
                                <label class="btn"
                                    for="btn-check-{{ $item->value }}-{{ $item->value }}">{{ $item->value }}</label>
                            @endforeach
                        @endforeach
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" onclick="filter()"
                        data-bs-dismiss="modal">Lọc</button>
                </div>
            </div>
        </div>
    </div>
</div>
