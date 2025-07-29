<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<style>
    .star-rating {
        font-size: 1.5rem;
        color: #ffc107;
        cursor: pointer;
    }

    .star-rating .bi-star-fill {
        color: #ffc107;
    }

    .rating-star:hover,
    .rating-star:hover~.rating-star {
        color: #ffc107;
    }
</style>
@php
    $delivered = $bills->filter(function ($bill) {
        if ($bill->status == 'Delivered') {
            return $bill;
        }
    });
@endphp
@if (count($delivered) > 0)
    <div id="show-delivered">
        @foreach ($delivered as $bill)
            <div class="mt-2 border">
                <div class="p-3 pt-4 bg-white">
                    @foreach ($bill->billItems as $billItem)
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex" style="width: 70%;">
                                <a href="{{ isset($billItem->product->slug) ? route('product.show', [$billItem->product->slug, $billItem->product->id]) : '#' }}"
                                    class="text-decoration-none text-black">
                                    <img class="object-fit-contain"
                                        src="{{ $billItem->image ? asset($billItem->image) : asset('./storage/default.jpg') }}"
                                        width="80" alt="{{ $bill->code }}">
                                </a>
                                <a href="{{ isset($billItem->product->slug) ? route('product.show', [$billItem->product->slug, $billItem->product->id]) : '#' }}"
                                    class="text-decoration-none text-black">
                                    <div class="px-2">
                                        <p class="p-0 m-0">
                                            {{ $billItem->name ?? '' }}
                                        </p>
                                        <p class="p-0 m-0 text-secondary" style="font-size: 14px">
                                            {{ $billItem->variant ?? '' }}
                                        </p>
                                        <p class="p-0 m-0">x{{ $billItem->quantity ?? '' }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex align-items-center" style="font-weight: 500">
                                <span class="text-danger px-2">
                                    {{ number_format($billItem->price, 0, '.', '.') ?? '' }} VNĐ
                                </span>
                                @if ($billItem->review_status == false)
                                    <div class="modal fade" id="{{ $billItem->id }}ratingModal" tabindex="-1"
                                        aria-labelledby="{{ $billItem->id }}ratingModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <form method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="{{ $billItem->id }}ratingModalLabel">
                                                            Viết
                                                            đánh giá
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="rating" class="form-label">
                                                                Trải nghiệm của bạn như thế nào?</label>
                                                            <div class="star-rating">
                                                                <i class="bi bi-star rating-star" data-rating="1"></i>
                                                                <i class="bi bi-star rating-star" data-rating="2"></i>
                                                                <i class="bi bi-star rating-star" data-rating="3"></i>
                                                                <i class="bi bi-star rating-star" data-rating="4"></i>
                                                                <i class="bi bi-star rating-star" data-rating="5"></i>
                                                            </div>
                                                            <input type="hidden" class="rating_{{ $billItem->id }}"
                                                                name="rating" value="0">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="review" class="form-label">Đánh giá</label>
                                                            <textarea placeholder="Hãy cho chúng tôi biết về trải nghiệm của bạn (tùy chọn)" class="form-control"
                                                                id="review_{{ $billItem->id }}" rows="3"></textarea>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text"
                                                                for="image_{{ $billItem->id }}">Upload</label>
                                                            <input type="file" class="form-control" name="images[]"
                                                                id="image_{{ $billItem->id }}" multiple>
                                                        </div>
                                                        <div class="preview-image m-0 p-0"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal"
                                                            id="btn-submit-review-{{ $billItem->id }}">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="review({{ $billItem->id }})">Submit
                                                            Review</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="assessmented">
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#{{ $billItem->id }}ratingModal">Đánh giá</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <div class="">
                        @if ($bill->discount > 0)
                            <div class="d-flex align-items-center justify-content-end m-0 p-0">
                                <p class="px-2 m-0 p-0">Giảm giá: </p>
                                <p class="text-decoration-line-through text-danger m-0 p-0"
                                    style="font-size: 20px; font-weight: 500;">
                                    {{ number_format($bill->discount, 0, '.', '.') ?? '' }} VNĐ
                                </p>
                            </div>
                        @endif
                        <div class="d-flex align-items-center justify-content-end m-0 p-0">
                            <p class="px-2 m-0 p-0">Thành tiền: </p>
                            <p class="text-danger px-1 m-0 p-0" style="font-size: 24px; font-weight: 500;">
                                {{ number_format($bill->total_amount, 0, '.', '.') ?? '' }} VNĐ
                            </p>
                        </div>
                        <div class="d-flex align-items-center justify-content-end m-0 p-0">
                            <p class="px-2 m-0 p-0">Code: </p>
                            <p class="text-danger m-0 p-0">
                                {{ $bill->code }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="d-flex align-items-center justify-content-center" style="min-height: 600px">
        <div class="">
            <div class="d-flex align-items-center justify-content-center">
                <img src="https://cdn-icons-png.flaticon.com/512/3142/3142603.png" width="100px" alt="">
            </div>
            <div class="py-2">
                Chưa có đơn hàng
            </div>
        </div>
    </div>
@endif

<script>
    function initializeReviewModals() {
        document.querySelectorAll('.modal').forEach(modal => {
            const ratingInput = modal.querySelector('input[name="rating"]');
            const initialStarsInThisModal = modal.querySelectorAll('.rating-star');

            function updateStarsDisplay(currentRatingValue) {
                const currentStarsNodeList = modal.querySelectorAll('.rating-star');
                currentStarsNodeList.forEach(star => {
                    star.classList.remove('bi-star-fill');
                    star.classList.add('bi-star');
                });
                for (let i = 0; i < currentRatingValue; i++) {
                    if (currentStarsNodeList[i]) {
                        currentStarsNodeList[i].classList.remove('bi-star');
                        currentStarsNodeList[i].classList.add('bi-star-fill');
                    }
                }
            }

            if (initialStarsInThisModal.length > 0 && ratingInput) {
                initialStarsInThisModal.forEach(originalStar => {
                    const newStar = originalStar.cloneNode(true);
                    originalStar.parentNode.replaceChild(newStar, originalStar);

                    newStar.addEventListener('click', function() {
                        const rating = this.getAttribute('data-rating');
                        ratingInput.value = rating;
                        updateStarsDisplay(rating);
                    });
                });
            }

            const imageInput = modal.querySelector('input[name="images[]"]');
            const previewImageContainer = modal.querySelector('.preview-image');

            if (imageInput && previewImageContainer) {
                const newImageInput = imageInput.cloneNode(true);
                imageInput.parentNode.replaceChild(newImageInput, imageInput);

                newImageInput.addEventListener('change', function() {
                    while (previewImageContainer.firstChild) {
                        const img = previewImageContainer.firstChild;
                        if (img.src && img.src.startsWith('blob:')) {
                            URL.revokeObjectURL(img.src);
                        }
                        previewImageContainer.removeChild(img);
                    }
                    if (this.files.length > 0) {
                        Array.from(this.files).forEach(file => {
                            const imgElement = document.createElement('img');
                            const objectURL = URL.createObjectURL(file);
                            imgElement.src = objectURL;
                            imgElement.alt = file.name;
                            imgElement.style.maxWidth = '50px';
                            imgElement.style.margin = '5px';
                            previewImageContainer.appendChild(imgElement);
                        });
                    }
                });
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        initializeReviewModals();
    });

    function review(id) {
        const _token = '{{ csrf_token() }}';
        const ratingValue = document.querySelector(`.rating_${id}`).value;
        // const commentValue = document.querySelector(`#review_${id}`).value;
        const commentValue = document.querySelector(`[id="review_${id}"]`).value;
        const files = document.querySelector(`#image_${id}`).files;

        if (parseInt(ratingValue, 10) <= 0) {
            alertify.warning('Vui lòng chọn sao!');
            return;
        }

        const allOpenReviewModalButtons = document.querySelectorAll('.assessmented button[data-bs-toggle="modal"]');
        allOpenReviewModalButtons.forEach(btn => btn.disabled = true);

        let btnCloseModal = document.querySelector(`#btn-submit-review-${id}`);
        if (btnCloseModal) {
            btnCloseModal.click();
        }
        const formData = new FormData();
        formData.append('_token', _token);
        formData.append('id', id);
        formData.append('rating', ratingValue);
        formData.append('comment', commentValue);

        // if (files.length > 0) {
        //     for (let i = 0; i < files.length; i++) {
        //         formData.append('images[]', files[i]);
        //     }
        // }

        const maxSize = 2 * 1024 * 1024; // 2MB

        if (files.length > 0) {
            for (let i = 0; i < files.length; i++) {
                if (files[i].size > maxSize) {
                    alertify.error(`Ảnh "${files[i].name}" vượt quá 2MB.`);
                    const allOpenReviewModalButtons = document.querySelectorAll(
                        '.assessmented button[data-bs-toggle="modal"]');
                    allOpenReviewModalButtons.forEach(btn => btn.disabled = false);
                    return;
                }
                formData.append('images[]', files[i]);
            }
        }



        $.ajax({
                type: 'POST',
                url: "{{ route('bill.review') }}",
                data: formData,
                contentType: false,
                processData: false,
            })
            .done((response) => {
                if (response && typeof response === 'object' && response.hasOwnProperty('html')) {
                    $('#show-delivered').empty().html(response['html']);
                    initializeReviewModals();
                } else {
                    console.warn("AJAX response did not contain 'html' property or was not an object.");
                    initializeReviewModals();
                }

                if (response && response['status'] === true) {
                    alertify.success(response['message']);
                } else if (response && response['status'] === false) {
                    alertify.error(response['message']);
                } else if (response && response['message']) {
                    alertify.log(response['message']);
                }
            })
            .fail((jqXHR, textStatus, errorThrown) => {
                alertify.error('Đánh giá thất bại!');
                // console.error("Review error:", textStatus, errorThrown);
            })
            .always(() => {
                allOpenReviewModalButtons.forEach(btn => btn.disabled = false);
            });
    }
</script>
