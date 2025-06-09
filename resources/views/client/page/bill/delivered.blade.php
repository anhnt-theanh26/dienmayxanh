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
    @foreach ($delivered as $bill)
        <div class="mt-2 border">
            <div class="p-3 pt-4 bg-white">
                @foreach ($bill->billItems as $billItem)
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex" style="width: 70%;">
                            <a href="{{ isset($billItem->product->slug) ? route('product.show', ['slug' => $billItem->product->slug]) : '#' }}"
                                class="text-decoration-none text-black">
                                <img class="object-fit-contain"
                                    src="{{ $billItem->image ? asset($billItem->image) : asset('./storage/default.jpg') }}"
                                    width="80" alt="">
                            </a>
                            <a href="{{ isset($billItem->product->slug) ? route('product.show', ['slug' => $billItem->product->slug]) : '#' }}"
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
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="{{ $billItem->id }}ratingModalLabel">Viết
                                                    đánh giá
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="rating" class="form-label">Trải nghiệm của bạn như thế
                                                        nào?</label>
                                                    <div class="star-rating">
                                                        <i class="bi bi-star rating-star" data-rating="1"></i>
                                                        <i class="bi bi-star rating-star" data-rating="2"></i>
                                                        <i class="bi bi-star rating-star" data-rating="3"></i>
                                                        <i class="bi bi-star rating-star" data-rating="4"></i>
                                                        <i class="bi bi-star rating-star" data-rating="5"></i>
                                                    </div>
                                                    <input type="hidden" class="rating_{{ $billItem->id }}"
                                                        id="rating" name="rating" value="0">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="review" class="form-label">Đánh giá</label>
                                                    <textarea placeholder="Hãy cho chúng tôi biết về trải nghiệm của bạn (tùy chọn)" class="form-control"
                                                        id="review_{{ $billItem->id }}" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                {{-- <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button> --}}
                                                <button type="button" class="btn btn-primary"
                                                    onclick="review({{ $billItem->id }})"
                                                    id="btn-submit-review-{{ $billItem->id }}">Submit Review</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="assessmented" id="assessmented">
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
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.modal').forEach(modal => {
            const stars = modal.querySelectorAll('.rating-star');
            const ratingInput = modal.querySelector('input[name="rating"]');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.getAttribute('data-rating');
                    ratingInput.value = rating;
                    resetStars();
                    for (let i = 0; i < rating; i++) {
                        stars[i].classList.remove('bi-star');
                        stars[i].classList.add('bi-star-fill');
                    }
                });
            });

            function resetStars() {
                stars.forEach(star => {
                    star.classList.remove('bi-star-fill');
                    star.classList.add('bi-star');
                });
            }
        });
    });
</script>

<script>
    function review(id) {
        const rating = document.querySelector(`.rating_${id}`).value;
        const comment = document.querySelector(`#review_${id}`).value;
        let flag = false;
        if (rating > 0) {
            flag = true;
        }
        if (flag == false) {
            alertify.warning('Vui lòng chọn sao!');
            return;
        }
        if (flag == true) {
            let btnsubmitreview = document.querySelector(`#btn-submit-review-${id}`);
            btnsubmitreview.setAttribute('data-bs-dismiss', 'modal');
            btnsubmitreview.click();
            let url = "{{ route('bill.review', ['id' => ':id']) }}".replace(':id', id);
            $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        rating: rating,
                        comment: comment,
                    }
                })
                .done((response) => {
                    alertify.succes('Đánh giá sản phẩm!');
                    console.log(response);
                })
                .fail((jqXHR, textStatus, errorThrown) => {
                    alertify.error('Đánh giá sản phẩm có lỗi!');
                    console.error("Error adding to cart:", textStatus, errorThrown);
                });
        }
    }
</script>
