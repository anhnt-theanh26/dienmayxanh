<div style="width: 600px;">
    <div class="bg-white rounded-top-3 p-3 border">
        <div class="d-grid gap-2">
            @include('client.page.cart.address-delivery')
            @include('client.page.cart.product-list')
        </div>
    </div>
    @include('client.page.cart.delivery-information')
    @include('client.page.cart.voucher')
    @include('client.page.cart.payment')
</div>
