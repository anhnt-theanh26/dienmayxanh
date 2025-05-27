<div class="tab-content" id="myTabBillContent">
    <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
        @include('client.page.bill.all')
    </div>
    <div class="tab-pane fade" id="wait-confirmation-tab-pane" role="tabpanel" aria-labelledby="wait-confirmation-tab"
        tabindex="0">
        @include('client.page.bill.wait-confirmation')

    </div>
    <div class="tab-pane fade" id="waiting-payment-tab-pane" role="tabpanel" aria-labelledby="waiting-payment-tab"
        tabindex="0">
        @include('client.page.bill.waiting-payment')

    </div>
    <div class="tab-pane fade" id="waiting-delivery-tab-pane" role="tabpanel" aria-labelledby="waiting-delivery-tab"
        tabindex="0">
        @include('client.page.bill.waiting-delivery')
    </div>
    <div class="tab-pane fade" id="complete-tab-pane" role="tabpanel" aria-labelledby="complete-tab" tabindex="0">
        @include('client.page.bill.complete')
    </div>
    <div class="tab-pane fade" id="canceled-tab-pane" role="tabpanel" aria-labelledby="canceled-tab" tabindex="0">
        @include('client.page.bill.canceled')
    </div>
    <div class="tab-pane fade" id="refund-tab-pane" role="tabpanel" aria-labelledby="refund-tab" tabindex="0">
        @include('client.page.bill.refund')
    </div>
</div>
