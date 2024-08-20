<x-admin-app-layout :title="'Order Details'">
    <div class="d-flex flex-column flex-column-fluid mt-5">
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Order Details (#{{ $order->order_number }})
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">
                                Dashboard </a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.order-management.index') }}" class="text-muted text-hover-primary">
                                Order List </a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Order Details (#{{ $order->order_number }}) </li>

                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <div id="kt_app_content_container" class="app-container  container-xxl ">

                <div class="d-flex flex-column gap-7 gap-lg-10">

                    <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">

                        <div class="card card-flush py-4 flex-row-fluid">

                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Order Details (#{{ $order->order_number }})</h2>
                                </div>
                            </div>



                            <div class="card-body pt-0">
                                <div class="table-responsive">

                                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                        <tbody class="fw-semibold text-gray-600">
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa-solid fa-calendar fs-2 me-2"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                        Date Created
                                                    </div>
                                                </td>
                                                <td class="fw-bold text-end">{{ $order->created_at->format('d M , Y') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa-solid fa-wallet fs-2 me-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                            <span class="path4"></span>
                                                        </i>
                                                        Payment Method
                                                    </div>
                                                </td>
                                                <td class="fw-bold text-end">
                                                    {{ ucfirst($order->payment_method) }}
                                                    <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/card-logos/visa.svg"
                                                        class="w-50px ms-2">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa-solid fa-truck fs-2 me-2"><span
                                                                class="path1"></span><span class="path2"></span><span
                                                                class="path3"></span><span class="path4"></span><span
                                                                class="path5"></span></i>
                                                        Shipping Method
                                                    </div>
                                                </td>
                                                <td class="fw-bold text-end">
                                                    {{ $order->shippingCharge->title }}({{ $order->shippingCharge->price }})
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>



                        <div class="card card-flush py-4  flex-row-fluid">

                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Customer Details</h2>
                                </div>
                            </div>



                            <div class="card-body pt-0">
                                <div class="table-responsive">

                                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                        <tbody class="fw-semibold text-gray-600">
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa-solid fa-profile-circle fs-2 me-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                        Customer
                                                    </div>
                                                </td>

                                                <td class="fw-bold text-end">
                                                    <div class="d-flex align-items-center justify-content-end">

                                                        {{-- <div
                                                            class="symbol symbol-circle symbol-25px overflow-hidden me-3">
                                                            <a
                                                                href="https://preview.keenthemes.com/metronic8/demo1/apps/ecommerce/customers/details.html">
                                                                <div class="symbol-label">
                                                                    <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-23.jpg"
                                                                        alt="Dan Wilson" class="w-100">
                                                                </div>
                                                            </a>
                                                        </div> --}}



                                                        <a href="#" class="text-gray-600 text-hover-primary">
                                                            {{ $order->user->first_name }}
                                                            {{ $order->user->last_name }}
                                                        </a>

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa-solid fa-sms fs-2 me-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        Email
                                                    </div>
                                                </td>
                                                <td class="fw-bold text-end">
                                                    <a href="mailto:{{ $order->user->email }}"
                                                        class="text-gray-600 text-hover-primary">
                                                        {{ $order->user->email }} </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa-solid fa-phone fs-2 me-2"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                        Phone
                                                    </div>
                                                </td>
                                                <td class="fw-bold text-end">{{ $order->user->phone }} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="card card-flush py-4  flex-row-fluid">

                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Documents</h2>
                                </div>
                            </div>



                            <div class="card-body pt-0">
                                <div class="table-responsive">

                                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                        <tbody class="fw-semibold text-gray-600">
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa-solid fa-devices fs-2 me-2"><span
                                                                class="path1"></span><span class="path2"></span><span
                                                                class="path3"></span><span
                                                                class="path4"></span><span class="path5"></span></i>
                                                        Invoice


                                                        <span class="ms-1" data-bs-toggle="tooltip"
                                                            aria-label="View the invoice generated by this order."
                                                            data-bs-original-title="View the invoice generated by this order."
                                                            data-kt-initialized="1">
                                                            <i class="fa-solid fa-information-5 text-gray-500 fs-6"><span
                                                                    class="path1"></span><span
                                                                    class="path2"></span><span
                                                                    class="path3"></span></i></span>
                                                    </div>
                                                </td>
                                                <td class="fw-bold text-end"><a
                                                        href="https://preview.keenthemes.com/metronic8/demo1/apps/invoices/view/invoice-3.html"
                                                        class="text-gray-600 text-hover-primary">#{{ $order->order_number }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa-solid fa-truck fs-2 me-2"><span
                                                                class="path1"></span><span
                                                                class="path2"></span><span
                                                                class="path3"></span><span class="path4"></span>
                                                            <span class="path5"></span>
                                                        </i>
                                                        Shipping Address


                                                        <span class="ms-1" data-bs-toggle="tooltip"
                                                            aria-label="View the shipping manifest generated by this order."
                                                            data-bs-original-title="View the shipping manifest generated by this order."
                                                            data-kt-initialized="1">
                                                            <i
                                                                class="fa-solid fa-information-5 text-gray-500 fs-6"></i>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="fw-bold text-end"><a href="#"
                                                        class="text-gray-600 text-hover-primary">{{ $order->shipping_address }}</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                            <div class="card card-flush py-4 flex-row-fluid position-relative">
                                <div
                                    class="position-absolute top-0 end-0 bottom-0 opacity-10 d-flex align-items-center me-5">
                                    <i class="ki-solid ki-two-credit-cart" style="font-size: 14em">
                                    </i>
                                </div>
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Billing Address</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    {{ $order->billing_address }}
                                </div>
                            </div>
                            <div class="card card-flush py-4 flex-row-fluid position-relative">

                                <div
                                    class="position-absolute top-0 end-0 bottom-0 opacity-10 d-flex align-items-center me-5">
                                    <i class="ki-solid ki-delivery" style="font-size: 13em">
                                    </i>
                                </div>
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Shipping Address</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    {{ $order->shipping_address }}
                                </div>
                            </div>
                        </div>
                        <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Order #{{ $order->order_number }}</h2>
                                </div>
                                <div class="card-title">
                                    <a href="javascript:void(0)" class="btn btn-sm fw-bold btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#printInovice"> <i
                                            class="fa-solid fa-print"></i> Print Or Download </a>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                        <thead>
                                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="min-w-175px ps-5">Product</th>
                                                <th class="min-w-175px ps-5">Product Description</th>
                                                <th class="min-w-100px text-end">SKU</th>
                                                <th class="min-w-70px text-end">Qty</th>
                                                <th class="min-w-100px text-end">Unit Price</th>
                                                <th class="min-w-100px text-end pe-5">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">

                                            @foreach ($order->orderItems as $item)
                                                <tr>
                                                    <td>
                                                        <span>
                                                            <img width="50px" height="50px"
                                                                style="border-radius: 5px;"
                                                                src="{{ asset('storage/' . optional($item->product)->thumbnail) }}"
                                                                alt="">
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span>{{ Str::limit(optional($item->product)->name, 30) }}</span>
                                                    </td>

                                                    <td class="text-right">
                                                        <span>{{ optional($item->product)->sku_code }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span>{{ optional($item)->quantity }}</span>
                                                    </td>
                                                    <td>
                                                        <span><span
                                                                class="text-info">(£)</span>{{ optional($item)->price }}</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span><span
                                                                class="text-info">(£)</span>{{ optional($item)->quantity * optional($item)->price }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="4" class="text-end">
                                                    Subtotal
                                                </td>
                                                <td class="text-end">
                                                    $264.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-end">
                                                    VAT (0%)
                                                </td>
                                                <td class="text-end">
                                                    $0.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-end">
                                                    Shipping Rate
                                                </td>
                                                <td class="text-end">
                                                    $5.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="fs-3 text-gray-900 text-end">
                                                    Grand Total
                                                </td>
                                                <td class="text-gray-900 fs-3 fw-bolder text-end">
                                                    $269.00
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Print Invoice Modal  --}}
    <!-- Modal -->
    {{-- @include('admin.pages.orderManagement.partial.invoice') --}}
    {{-- Print Invoice Modal End --}}
    {{-- view order Modal  --}}
    <!-- Modal -->
    <div class="modal fade" id="vieworderInovice" tabindex="-1" aria-labelledby="vieworderInoviceLabel"
        aria-hidden="true">
        <div class="modal-dialog        ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Worder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Print Invoice Modal End --}}
</x-admin-app-layout>