@extends('layout.admin')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet"
        href="{{ asset('/administrator/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endsection

@section('content')
    <div class="row">
        <!-- View sales -->
        <div class="col-xl-4 mb-4 col-lg-5 col-12">
            <div class="card">
                @php
                    $billsUsers = [];
                    foreach ($billsThisMonth as $bill) {
                        $key = $bill->user_id;
                        if ($bill->status == 'Delivered') {
                            if (!isset($billsUsers[$key])) {
                                $billsUsers[$key] = [];
                            }
                            $billsUsers[$key][] = $bill->total_amount;
                        }
                    }
                    $totalAmount = [];
                    foreach ($billsUsers as $key => $value) {
                        $totalAmount[$key][] = array_sum($value);
                    }
                    $totalFlattan = [];
                    // echo count($totalAmount);
                    $max = [];
                    foreach ($totalAmount as $key => $value) {
                        // echo $key + 1;
                    }
                    // echo $totalAmount[2][0];
                @endphp
                <div class="d-flex align-items-end row">
                    <div class="col-7">
                        <div class="card-body text-nowrap">
                            <h5 class="card-title mb-0">
                                Top Buyer John! 🎉</h5>
                            <p class="mb-2">
                                Top Buyer</p>
                            <h4 class="text-primary mb-1">$48.9k</h4>
                            <a href="javascript:;" class="btn btn-primary">View Sales</a>
                        </div>
                    </div>
                    <div class="col-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('/administrator/assets/img/illustrations/card-advance-sale.png') }}"
                                height="140" alt="view sales" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- View sales -->

        <!-- Statistics -->
        <div class="col-xl-8 mb-4 col-lg-7 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title mb-0">Statistics</h5>
                        <small class="text-muted">{{ Carbon\Carbon::now()->format('m/Y') }}</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                    <i class="ti ti-chart-pie-2 ti-sm"></i>
                                </div>
                                @php
                                    $soldThisMonth = 0;
                                    $profitThisMonth = 0;
                                    $importPriceThisMonth = 0;
                                    foreach ($billsThisMonth as $bill) {
                                        foreach ($bill->billItems as $value) {
                                            $profitThisMonth += $value->profit;
                                            $soldThisMonth += $value->quantity;
                                            $importPriceThisMonth += $value->import_price;
                                        }
                                    }
                                @endphp
                                <div class="card-info">
                                    <h5 class="mb-0">
                                        {{ \App\Http\Controllers\Admin\AdminController::formatCurrencyVN($soldThisMonth) }}
                                    </h5>
                                    <small>Sales</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                    <i class="ti ti-users ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">
                                        {{ \App\Http\Controllers\Admin\AdminController::formatCurrencyVN(count($users)) }}
                                    </h5>
                                    <small>Customers</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                    <i class="ti ti-shopping-cart ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">
                                        {{ \App\Http\Controllers\Admin\AdminController::formatCurrencyVN($products) }}
                                    </h5>
                                    <small>Products</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                    <i class="ti ti-currency-dollar ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">
                                        {{ \App\Http\Controllers\Admin\AdminController::formatCurrencyVN($profitThisMonth) }}
                                    </h5>
                                    <small>Revenue</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics -->

        <div class="col-xl-4 col-12">
            <div class="row">
                <!-- Expenses -->
                @php
                    $soldLastMonth = 0;
                    $profitLastMonth = 0;
                    $importPriceLastMonth = 0;
                    foreach ($billsLastMonth as $bill) {
                        foreach ($bill->billItems as $value) {
                            $profitLastMonth += $value->profit;
                            $importPriceLastMonth += $value->import_price;
                            $soldLastMonth += $value->quantity;
                        }
                    }
                @endphp
                <div class="col-xl-6 mb-4 col-md-3 col-6">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5 class="card-title mb-0">
                                {{ \App\Http\Controllers\Admin\AdminController::formatCurrencyVN($importPriceThisMonth) }}
                            </h5>
                            <small class="text-muted">Expenses</small>
                        </div>
                        <div class="card-body">
                            <div class="mt-md-2 text-center mt-lg-3 mt-3">
                                <div id="expensesChart"></div>
                                <small class="text-muted mt-3">
                                    @if ($importPriceThisMonth > $importPriceLastMonth)
                                        Expenses increased by
                                        {{ \App\Http\Controllers\Admin\AdminController::formatCurrencyVN($importPriceThisMonth - $importPriceLastMonth) }}
                                        from last month
                                        <input type="hidden" name="" id="importPriceDownUp" readonly
                                            value="{{ round(($importPriceLastMonth / $importPriceThisMonth) * 100, 2) }}">
                                    @else
                                        Expenses down
                                        {{ \App\Http\Controllers\Admin\AdminController::formatCurrencyVN($importPriceLastMonth - $importPriceThisMonth) }}
                                        from last month
                                        <input type="hidden" name="" id="importPriceDownUp" readonly
                                            value="{{ round(($importPriceThisMonth / $importPriceLastMonth) * 100, 2) }}">
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Expenses -->

                <!-- Profit last month -->
                <div class="col-xl-6 mb-4 col-md-3 col-6">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5 class="card-title mb-0">Profit</h5>
                            <small class="text-muted">Last Month</small>
                        </div>
                        <div class="card-body">
                            <div id="profitLastMonth">
                                <input type="hidden" id="profitArr" readonly value="{{ $profitLastMonth }}">
                                <input type="hidden" id="profitArr" readonly value="{{ $profitThisMonth }}">
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                                <h4 class="mb-0">
                                    {{ \App\Http\Controllers\Admin\AdminController::formatCurrencyVN($profitLastMonth) }}
                                </h4>
                                @if ($profitThisMonth > $profitLastMonth)
                                    @php
                                        $upProfit = ($profitLastMonth / $profitThisMonth) * 100;
                                    @endphp
                                    <small class="text-success">+{{ number_format($upProfit, 0, '.', '.') ?? '' }}%</small>
                                @else
                                    @php
                                        $downProfit = ($profitThisMonth / $profitLastMonth) * 100;
                                    @endphp
                                    <small
                                        class="text-danger">-{{ number_format($downProfit, 0, '.', '.') ?? '' }}%</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Profit last month -->

                <!-- Generated Leads -->
                <div class="col-xl-12 mb-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <div class="card-title mb-auto">
                                        <h5 class="mb-1 text-nowrap">Total Sold</h5>
                                        <small>Monthly Report</small>
                                    </div>
                                    <div class="chart-statistics">
                                        <h3 class="card-title mb-1">
                                            {{ \App\Http\Controllers\Admin\AdminController::formatCurrencyVN($soldThisMonth) }}
                                            <input type="hidden" id="soldThisMonth" value="{{ $soldThisMonth }}">
                                        </h3>
                                        @if ($soldThisMonth > $soldLastMonth)
                                            @php
                                                $upSold = ($soldLastMonth / $soldThisMonth) * 100;
                                            @endphp
                                            <small class="text-success text-nowrap fw-semibold">
                                                <i class="ti ti-chevron-up me-1"></i>
                                                {{ number_format($upSold, 0, '.', '.') ?? '' }}%
                                            </small>
                                        @else
                                            @php
                                                $downSold = ($soldThisMonth / $soldLastMonth) * 100;
                                            @endphp
                                            <small class="text-danger text-nowrap fw-semibold">
                                                <i class="ti ti-chevron-down me-1"></i>
                                                {{ number_format($downSold, 0, '.', '.') ?? '' }}%
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div id="generatedLeadsChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Generated Leads -->
            </div>
        </div>
        @php
            $soldArrPrd = [];
            foreach ($billsThisMonth as $billThisMonth) {
                foreach ($billThisMonth->billItems as $bill) {
                    if (!isset($soldArrPrd[$bill->product->category->name])) {
                        $soldArrPrd[$bill->product->category->name] = [];
                    }
                    $soldArrPrd[$bill->product->category->name][] = $bill->quantity;
                }
            }
            $arrNameCate = [];
            $arrCateSold = [];
            foreach ($soldArrPrd as $key => $value) {
                if (!in_array($key, $arrNameCate)) {
                    array_push($arrNameCate, $key);
                }
                array_push($arrCateSold, array_sum($value));
            }
        @endphp
        @foreach ($arrNameCate as $item)
            <input type="hidden" name="arrNameCate" id="arrNameCate" value="{{ $item }}" readonly>
        @endforeach
        @foreach ($arrCateSold as $item)
            <input type="hidden" name="arrCateSold" id="arrCateSold" value="{{ $item }}" readonly>
        @endforeach

        <!-- Revenue Report -->
        <div class="col-12 col-xl-8 mb-4 col-lg-7">
            <div class="card">
                <div class="card-header pb-3">
                    <h5 class="m-0 me-2 card-title">Revenue Report</h5>
                </div>
                <div class="card-body">
                    <div class="row row-bordered g-0">
                        <div class="col-md-8">
                            <div id="totalRevenueChart"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center mt-4">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                        id="budgetId" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="budgetId">
                                        <a class="dropdown-item prev-year1" href="javascript:void(0);">
                                            <script>
                                                document.write(new Date().getFullYear() - 1);
                                            </script>
                                        </a>
                                        <a class="dropdown-item prev-year2" href="javascript:void(0);">
                                            <script>
                                                document.write(new Date().getFullYear() - 2);
                                            </script>
                                        </a>
                                        <a class="dropdown-item prev-year3" href="javascript:void(0);">
                                            <script>
                                                document.write(new Date().getFullYear() - 3);
                                            </script>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-center pt-4 mb-0">$25,825</h3>
                            <p class="mb-4 text-center"><span class="fw-semibold">Budget: </span>56,800</p>
                            <div class="px-3">
                                <div id="budgetChart"></div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-primary">Increase Button</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Revenue Report -->
        <!-- Earning Reports -->
        <div class="col-xl-4 col-lg-5 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Earning Reports</h5>
                        <small class="text-muted">Weekly Earnings Overview</small>
                    </div>
                    {{-- <div class="dropdown">
                        <button class="btn p-0" type="button" id="earningReports" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReports">
                            <a class="dropdown-item" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div> --}}
                </div>
                <div class="card-body pb-0">
                    @php
                        $soldThisWeek = 0;
                        $profitThisWeek = 0;
                        $totalIncomeThisWeek = 0;
                        $totalExpensesThisWeek = 0;
                        foreach ($billsThisWeek as $bills) {
                            foreach ($bills as $bill) {
                                $totalIncomeThisWeek += $bill->total_amount;
                                foreach ($bill->billItems as $billItem) {
                                    $profitThisWeek += $billItem->profit;
                                    $totalExpensesThisWeek += $billItem->import_price;
                                    $soldThisWeek += $billItem->quantity;
                                }
                            }
                        }

                        $soldLastWeek = 0;
                        $profitLastWeek = 0;
                        $totalIncomeLastWeek = 0;
                        $totalExpensesLastWeek = 0;
                        foreach ($billsLastWeek as $bills) {
                            foreach ($bills as $bill) {
                                $totalIncomeLastWeek += $bill->total_amount;
                                foreach ($bill->billItems as $billItem) {
                                    $profitLastWeek += $billItem->profit;
                                    $totalExpensesLastWeek += $billItem->import_price;
                                    $soldLastWeek += $billItem->quantity;
                                }
                            }
                        }
                    @endphp
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-3">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="ti ti-chart-pie-2 ti-sm"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Net Profit</h6>
                                    <small class="text-muted">
                                        {{ \App\Http\Controllers\Admin\AdminController::formatCurrencyVN($soldThisWeek) }}
                                        Sales</small>
                                </div>
                                <div class="user-progress">
                                    <small>
                                        {{ \App\Http\Controllers\Admin\AdminController::formatCurrencyVN($profitThisWeek) }}
                                    </small>
                                    @if ($profitThisWeek > $profitLastWeek)
                                        <i class="ti ti-chevron-up text-success ms-3"></i>
                                        <small class="text-muted">
                                            {{ round(($profitLastWeek / $profitThisWeek) * 100, 1) }}
                                            %
                                        </small>
                                    @else
                                        <i class="ti ti-chevron-down text-danger ms-3"></i>
                                        <small class="text-muted">
                                            {{ round(($profitThisWeek / $profitLastWeek) * 100, 1) }}
                                            %
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-3">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-success"><i
                                        class="ti ti-currency-dollar ti-sm"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Total Income</h6>
                                    <small class="text-muted">Sales, Affiliation</small>
                                </div>
                                <div class="user-progress">
                                    <small>
                                        {{ \App\Http\Controllers\Admin\AdminController::formatCurrencyVN($totalIncomeThisWeek) }}
                                    </small>
                                    @if ($totalIncomeThisWeek > $totalIncomeLastWeek)
                                        <i class="ti ti-chevron-up text-success ms-3"></i>
                                        <small class="text-muted">
                                            {{ round(($totalIncomeLastWeek / $totalIncomeThisWeek) * 100, 1) }}
                                            %
                                        </small>
                                    @else
                                        <i class="ti ti-chevron-down text-danger ms-3"></i>
                                        <small class="text-muted">
                                            {{ round(($totalIncomeThisWeek / $totalIncomeLastWeek) * 100, 1) }}
                                            %
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-3">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-secondary"><i
                                        class="ti ti-credit-card ti-sm"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Total Expenses</h6>
                                    <small class="text-muted">ADVT, Marketing</small>
                                </div>
                                <div class="user-progress">
                                    <small>
                                        {{ \App\Http\Controllers\Admin\AdminController::formatCurrencyVN($totalExpensesThisWeek) }}
                                    </small>
                                    @if ($totalExpensesThisWeek > $totalExpensesLastWeek)
                                        <i class="ti ti-chevron-up text-success ms-3"></i>
                                        <small class="text-muted">
                                            {{ round(($totalExpensesLastWeek / $totalExpensesThisWeek) * 100, 1) }}
                                            %
                                        </small>
                                    @else
                                        <i class="ti ti-chevron-down text-danger ms-3"></i>
                                        <small class="text-muted">
                                            {{ round(($totalExpensesThisWeek / $totalExpensesLastWeek) * 100, 1) }}
                                            %
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div id="reportBarChart">
                        @foreach ($daysOfThisWeek as $date => $bills)
                            @if ($bills->isEmpty())
                                <input readonly id="soldWeek" type="hidden" value="0">
                            @else
                                <ul>
                                    @php
                                        $soldWeek = 0;
                                    @endphp
                                    @foreach ($bills as $bill)
                                        @foreach ($bill->billItems as $billItem)
                                            @php
                                                $soldWeek += $billItem->quantity;
                                            @endphp
                                        @endforeach
                                    @endforeach
                                    <input readonly id="soldWeek" type="hidden" value="{{ $soldWeek }}">
                                </ul>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!--/ Earning Reports -->


        <!-- Popular Product -->
        <div class="col-md-6 col-xl-4 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title m-0 me-2">
                        <h5 class="m-0 me-2">Popular Products</h5>
                        <small class="text-muted">
                            Total
                            @php
                                $popularProductSold = 0;
                                foreach ($popularProducts as $popularProduct) {
                                    $popularProductSold += $popularProduct->sold;
                                }
                            @endphp
                            {{ \App\Http\Controllers\Admin\AdminController::formatCurrencyVN($popularProductSold) }}
                            sold
                        </small>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        @foreach ($popularProducts as $popularProduct)
                            <li class="d-flex mb-4 pb-1">
                                <div class="me-3">
                                    <img src="{{ $popularProduct->image }}" alt="User" class="rounded"
                                        width="46" />
                                </div>

                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">
                                            {{ \Illuminate\Support\Str::limit($popularProduct->name, 30) }}
                                        </h6>
                                        <small class="text-muted d-block">Item: #{{ $popularProduct->sku }}</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <p class="mb-0 fw-semibold">
                                            {{ \App\Http\Controllers\Admin\AdminController::formatCurrencyVN($popularProduct->variants->first()->price) }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Popular Product -->

        <!-- Sales by Countries tabs-->
        <div class="col-md-6 col-xl-4 col-xl-4 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between pb-2 mb-1">
                    <div class="card-title mb-1">
                        <h5 class="m-0 me-2">Sales</h5>
                        <small class="text-muted">62 Deliveries in Progress</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="nav-align-top">
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-new" aria-controls="navs-justified-new"
                                    aria-selected="true">
                                    New
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-link-preparing"
                                    aria-controls="navs-justified-link-preparing" aria-selected="false">
                                    Preparing
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-link-shipping"
                                    aria-controls="navs-justified-link-shipping" aria-selected="false">
                                    Shipping
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content pb-0">
                            <div class="tab-pane fade show active" id="navs-justified-new" role="tabpanel">
                                @php
                                    $billNews = $orders->take(2);
                                @endphp
                                @foreach ($billNews as $billnew)
                                    <ul class="timeline timeline-advance timeline-advance mb-2 pb-1">
                                        <li class="timeline-item ps-4 border-left-dashed">
                                            <span class="timeline-indicator timeline-indicator-success">
                                                <i class="ti ti-circle-check"></i>
                                            </span>
                                            <div class="timeline-event ps-0 pb-0">
                                                <div class="timeline-header">
                                                    <small class="text-success text-uppercase fw-semibold">sender</small>
                                                </div>
                                                <h6 class="mb-0">
                                                    {{ \Illuminate\Support\Str::limit(config('app.name'), 30) }}
                                                </h6>
                                                <p class="text-muted mb-0 text-nowrap">
                                                    {{ \Illuminate\Support\Str::limit(config('app.name'), 30) }}
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item ps-4 border-0">
                                            <span class="timeline-indicator timeline-indicator-primary">
                                                <i class="ti ti-map-pin"></i>
                                            </span>
                                            <div class="timeline-event ps-0 pb-0">
                                                <div class="timeline-header">
                                                    <small class="text-primary text-uppercase fw-semibold">Receiver</small>
                                                </div>
                                                <h6 class="mb-0">
                                                    {{ \Illuminate\Support\Str::limit($billnew->recipient_name, 30) }}
                                                </h6>
                                                <p class="text-muted mb-0 text-nowrap">
                                                    {{ \Illuminate\Support\Str::limit($billnew->shipping_address, 30) }}
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                    @if (!$loop->last)
                                        <div class="border-bottom border-bottom-dashed mt-0 mb-4"></div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="tab-pane fade" id="navs-justified-link-preparing" role="tabpanel">
                                @php
                                    $preparing = $billNews->filter(function ($bill) {
                                        if ($bill->status == 'Preparing') {
                                            return $bill;
                                        }
                                    });
                                @endphp
                                @foreach ($preparing as $item)
                                    <ul class="timeline timeline-advance mb-2 pb-1">
                                        <li class="timeline-item ps-4 border-left-dashed">
                                            <span class="timeline-indicator timeline-indicator-success">
                                                <i class="ti ti-circle-check"></i>
                                            </span>
                                            <div class="timeline-event ps-0 pb-0">
                                                <div class="timeline-header">
                                                    <small class="text-success text-uppercase fw-semibold">sender</small>
                                                </div>
                                                <h6 class="mb-0">
                                                    {{ \Illuminate\Support\Str::limit(config('app.name'), 30) }}
                                                </h6>
                                                <p class="text-muted mb-0 text-nowrap">
                                                    {{ \Illuminate\Support\Str::limit(config('app.name'), 30) }}
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item ps-4 border-0 border-left-dashed">
                                            <span class="timeline-indicator timeline-indicator-primary">
                                                <i class="ti ti-map-pin"></i>
                                            </span>
                                            <div class="timeline-event ps-0 pb-0">
                                                <div class="timeline-header">
                                                    <small class="text-primary text-uppercase fw-semibold">Receiver</small>
                                                </div>
                                                <h6 class="mb-0">
                                                    {{ \Illuminate\Support\Str::limit($item->recipient_name, 30) }}
                                                </h6>
                                                <p class="text-muted mb-0 text-nowrap">
                                                    {{ \Illuminate\Support\Str::limit($item->shipping_address, 30) }}
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                    @if (!$loop->last)
                                        <div class="border-bottom border-bottom-dashed mt-0 mb-4"></div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="navs-justified-link-shipping" role="tabpanel">
                                @php
                                    $shipping = $billNews->filter(function ($bill) {
                                        if ($bill->status == 'Shipping') {
                                            return $bill;
                                        }
                                    });
                                @endphp
                                @foreach ($shipping as $item)
                                    <ul class="timeline timeline-advance mb-2 pb-1">
                                        <li class="timeline-item ps-4 border-left-dashed">
                                            <span class="timeline-indicator timeline-indicator-success">
                                                <i class="ti ti-circle-check"></i>
                                            </span>
                                            <div class="timeline-event ps-0 pb-0">
                                                <div class="timeline-header">
                                                    <small class="text-success text-uppercase fw-semibold">sender</small>
                                                </div>
                                                <h6 class="mb-0">
                                                    {{ \Illuminate\Support\Str::limit(config('app.name'), 30) }}
                                                </h6>
                                                <p class="text-muted mb-0 text-nowrap">
                                                    {{ \Illuminate\Support\Str::limit(config('app.name'), 30) }}
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item ps-4 border-0">
                                            <span class="timeline-indicator timeline-indicator-primary">
                                                <i class="ti ti-map-pin"></i>
                                            </span>
                                            <div class="timeline-event ps-0 pb-0">
                                                <div class="timeline-header">
                                                    <small class="text-primary text-uppercase fw-semibold">Receiver</small>
                                                </div>
                                                <h6 class="mb-0">
                                                    {{ \Illuminate\Support\Str::limit($billnew->recipient_name, 30) }}
                                                </h6>
                                                <p class="text-muted mb-0 text-nowrap">
                                                    {{ \Illuminate\Support\Str::limit($billnew->shipping_address, 30) }}
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                    @if (!$loop->last)
                                        <div class="border-bottom border-bottom-dashed mt-0 mb-4"></div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Sales by Countries tabs -->

        <!-- Transactions -->
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title m-0 me-2">
                        <h5 class="m-0 me-2">Transactions</h5>
                        <small class="text-muted">Total 58 Transactions done in this Month</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-3 pb-1 align-items-center">
                            <div class="badge bg-label-primary me-3 rounded p-2">
                                <i class="ti ti-wallet ti-sm"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Wallet</h6>
                                    <small class="text-muted d-block">Starbucks</small>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0 text-danger">-$75</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-3 pb-1 align-items-center">
                            <div class="badge bg-label-success rounded me-3 p-2">
                                <i class="ti ti-browser-check ti-sm"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Bank Transfer</h6>
                                    <small class="text-muted d-block">Add Money</small>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0 text-success">+$480</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-3 pb-1 align-items-center">
                            <div class="badge bg-label-danger rounded me-3 p-2">
                                <i class="ti ti-brand-paypal ti-sm"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Paypal</h6>
                                    <small class="text-muted d-block mb-1">Client Payment</small>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0 text-success">+$268</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-3 pb-1 align-items-center">
                            <div class="badge bg-label-secondary me-3 rounded p-2">
                                <i class="ti ti-credit-card ti-sm"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Master Card</h6>
                                    <small class="text-muted d-block mb-1">Ordered iPhone 13</small>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0 text-danger">-$699</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-3 pb-1 align-items-center">
                            <div class="badge bg-label-info me-3 rounded p-2">
                                <i class="ti ti-currency-dollar ti-sm"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Bank Transactions</h6>
                                    <small class="text-muted d-block mb-1">Refund</small>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0 text-success">+$98</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-3 pb-1 align-items-center">
                            <div class="badge bg-label-danger me-3 rounded p-2">
                                <i class="ti ti-brand-paypal ti-sm"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Paypal</h6>
                                    <small class="text-muted d-block mb-1">Client Payment</small>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0 text-success">+$126</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="badge bg-label-success me-3 rounded p-2">
                                <i class="ti ti-browser-check ti-sm"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Bank Transfer</h6>
                                    <small class="text-muted d-block mb-1">Pay Office Rent</small>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0 text-danger">-$1290</h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Transactions -->

        <!-- Invoice table -->
        <div class="col-lg-8">
            <div class="card h-100">
                <div class="table-responsive card-datatable">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="row ms-2 me-3">
                            <div class="col-12 col-md-6 d-flex align-items-center flex-column flex-md-row pe-3 gap-md-2">
                                <div class="dataTables_filter">
                                    <label>
                                        <input type="search" class="form-control" name="search"
                                            placeholder="Search..."></label>
                                </div>
                                <div class="invoice_status mb-3 mb-md-0"></div>
                            </div>
                        </div>
                        <table class="table border-top dataTable no-footer dtr-column" id="DataTables_Table_0"
                            aria-describedby="DataTables_Table_0_info" style="width: 922px;">
                            <thead>
                                <tr>
                                    <th class="control sorting dtr-hidden" tabindex="0"
                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                        style="width: 39px; display: none;"
                                        aria-label=": activate to sort column ascending"></th>
                                    <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0"
                                        rowspan="1" colspan="1" style="width: 64px;" aria-sort="descending"
                                        aria-label="ID: activate to sort column ascending">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 75px;"
                                        aria-label=": activate to sort column ascending"><i class="ti ti-trending-up"></i>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 120px;"
                                        aria-label="Total: activate to sort column ascending">Total</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 209px;"
                                        aria-label="Issued Date: activate to sort column ascending">Issued Date</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 147px;"
                                        aria-label="Actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>
                                            <span class="fw-bold text-success">
                                                {{ number_format($item->total_amount, 0, '.', '.') ?? '' }}</span>
                                            <span>VNĐ</span>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->order_date)->format('d/m/Y') }}</td>
                                        <td>{{ $item->code }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row mx-2">
                            <div class="px-4">
                                {{ $orders->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Invoice table -->
    </div>
@endsection

@section('js')
    <script src="{{ asset('/administrator/assets/js/dashboards-ecommerce.js') }}"></script>
    <script></script>
@endsection
