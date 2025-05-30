<div class="tab-content" id="myTabBillContent">
    <div class="tab-pane fade show active" id="pending-tab-pane" role="tabpanel" aria-labelledby="pending-tab"
        tabindex="0">
        @include('client.page.bill.pending')
    </div>
    <div class="tab-pane fade" id="waiting-payment-tab-pane" role="tabpanel" aria-labelledby="waiting-payment-tab"
        tabindex="0">
        @include('client.page.bill.waiting-payment')
    </div>
    <div class="tab-pane fade" id="confirmed-tab-pane" role="tabpanel" aria-labelledby="confirmed-tab" tabindex="0">
        @include('client.page.bill.confirmed')
    </div>
    <div class="tab-pane fade" id="preparing-tab-pane" role="tabpanel" aria-labelledby="preparing-tab" tabindex="0">
        @include('client.page.bill.preparing')
    </div>
    <div class="tab-pane fade" id="shipping-tab-pane" role="tabpanel" aria-labelledby="shipping-tab" tabindex="0">
        @include('client.page.bill.shipping')
    </div>
    {{-- <div class="tab-pane fade" id="refund-tab-pane" role="tabpanel" aria-labelledby="refund-tab" tabindex="0">
        @include('client.page.bill.refund')
    </div> --}}
    <div class="tab-pane fade" id="delivered-tab-pane" role="tabpanel" aria-labelledby="delivered-tab" tabindex="0">
        @include('client.page.bill.delivered')
    </div>
    <div class="tab-pane fade" id="canceled-tab-pane" role="tabpanel" aria-labelledby="canceled-tab" tabindex="0">
        @include('client.page.bill.canceled')
    </div>
</div>
