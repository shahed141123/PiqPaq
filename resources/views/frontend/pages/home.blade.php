<x-frontend-app-layout :title="'Home'">
    <section class="ps-section--banner">
        <div class="ps-section__overlay">
            <div class="ps-section__loading"></div>
        </div>
        <div class="owl-carousel-banner owl-carousel owl-loaded owl-drag" data-owl-auto="false" data-owl-loop="true"
            data-owl-speed="15000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1"
            data-owl-duration="1000" data-owl-mousedrag="on">
            <div class="owl-stage-outer">
                <div class="owl-stage">
                    @foreach ($sliders as $slider)
                        <div class="owl-item">
                            <div class="ps-banner hero-banner"
                                style="
                            background-image: url('{{ asset('storage/' . $slider->bg_image) }}');
                            background-repeat: no-repeat;
                            background-size: cover;
                            background-position: center center;
                            height: 600px;
                            width: 100%;
                        ">
                                <div class="container container-initial">
                                    <div class="ps-banner__block">
                                        <div class="ps-banner__content">
                                            <h2 class="ps-banner__title text-white">{{ $slider->title }}</h2>
                                            <div class="ps-banner__desc text-white">{{ $slider->subtitle }}</div>
                                            <div class="ps-banner__btn-group">
                                                <div class="ps-banner__btn text-white">{{ $slider->badge }}</div>
                                            </div>
                                            @if (!empty($slider->button_link) || !empty($slider->button_name))
                                                <a class="bg-warning ps-banner__shop" href="{{ $slider->button_link }}">
                                                    {{ $slider->button_name }}
                                                </a>
                                            @endif
                                            {{-- <div class="ps-banner__persen bg-yellow ps-top"><small>only</small>$25</div> --}}
                                        </div>
                                        <div class="ps-banner__thumnail">
                                            {{-- <img class="ps-banner__round"
                                                src="{{ asset('storage/' . $slider->bg_image) }}" alt="alt"> --}}
                                            {{-- <img class="ps-banner__image" src="{{ asset('storage/' . $slider->image) }}"
                                                alt="alt"> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="owl-nav">
                {{-- <button type="button" role="presentation" class="owl-prev">
                    <i class="fa fa-chevron-left text-white"></i>
                </button>
                <button type="button" role="presentation" class="owl-next">
                    <i class="fa fa-chevron-right text-white"></i>
                </button> --}}
            </div>
        </div>
    </section>




    <div class="ps-home ps-home--14">
        <div class="ps-home__content">
            <div class="container">
                <div class="ps-promo ps-promo--home pt-5 mt-5">
                    <div class="row">
                        @if ($home_slider_bottom_first)
                            <div class="col-12 col-md-4">
                                <div class="ps-promo__item"><img class="ps-promo__banner"
                                        src="{{ asset('storage/' . $home_slider_bottom_first->image) }}"
                                        alt="alt" />
                                    <div class="ps-promo__content"><span
                                            class="ps-promo__badge">{{ $home_slider_bottom_first->badge }}</span>
                                        <h4 class="text-dark ps-promo__name">{{ $home_slider_bottom_first->title }}
                                        </h4>
                                        <div class="ps-promo__image">
                                            <img src="{{ asset('frontend/img/icon/icon10.png') }}" alt="" />
                                        </div>
                                        <a class="btn-green ps-promo__btn"
                                            href="{{ $home_slider_bottom_first->button_link }}">{{ $home_slider_bottom_first->button_name }}</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($home_slider_bottom_second)
                            <div class="col-12 col-md-4">
                                <div class="ps-promo__item"><img class="ps-promo__banner"
                                        src="{{ asset('storage/' . $home_slider_bottom_second->image) }}"
                                        alt="alt" />
                                    <div class="ps-promo__content">
                                        <h4 class="text-white ps-promo__name">
                                            {{ $home_slider_bottom_second->title }}ement
                                        </h4>
                                        <div class="ps-promo__sale text-white">
                                            {{ $home_slider_bottom_first->subtitle }}</div><a
                                            class="btn-green ps-promo__btn"
                                            href="{{ $home_slider_bottom_first->button_link }}">{{ $home_slider_bottom_first->button_name }}</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($home_slider_bottom_third)
                            <div class="col-12 col-md-4">
                                <div class="ps-promo__item"><img class="ps-promo__banner"
                                        src="{{ asset('storage/' . $home_slider_bottom_third->image) }}"
                                        alt="alt" />
                                    <div class="ps-promo__content">
                                        <h4 class="text-white ps-promo__name">{{ $home_slider_bottom_third->title }}
                                        </h4>
                                        <div class="ps-promo__meta">
                                            <p class="ps-promo__price text-warning">
                                                {{ $home_slider_bottom_first->subtitle }}</p>
                                        </div><a class="btn-green ps-promo__btn"
                                            href="{{ $home_slider_bottom_first->button_link }}">{{ $home_slider_bottom_first->button_name }}</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            {{-- <section class="ps-product--type">
                <div class="container">
                    <h3 class="ps-section__title" style="font-size: 30px;">Popular categories</h3>
                    <div class="ps-category__content">

                            <a class="ps-category__item" href="{{ route('category.products', $category->slug) }}">


                                <h6 class="ps-category__name"></h6>
                            </a>

                    </div>
                </div>
            </section> --}}
            @if ($categorys->count() > 0)
                <section class="ps-section--categories">
                    <h3 class="ps-section__title" style="font-size: 30px;">Popular categories</h3>
                    <div class="container">
                        <div class="ps-section__content pt-5">
                            <div class="ps-categories__list row my-5">
                                @foreach ($categorys as $category)
                                    <div class="ps-categories__item"><a class="ps-categories__link"
                                            href="{{ route('category.products', $category->slug) }}">
                                            @php
                                                $logoPath = 'storage/' . $category->logo;
                                                $logoSrc = file_exists(public_path($logoPath))
                                                    ? asset($logoPath)
                                                    : asset('frontend/img/no-category.png');
                                            @endphp
                                            <img src="{{ $logoSrc }}" alt="{{ $category->name }}"></a>
                                        </a>
                                        <a class="ps-categories__name"
                                            href="{{ route('category.products', $category->slug) }}">{{ $category->name }}</a>
                                    </div>
                                @endforeach
                            </div>
                            {{-- <div class="text-center"> <a class="ps-categories__show" href="{{ route('allproducts') }}">Show
                                    all</a>
                            </div> --}}
                        </div>
                    </div>
                </section>
            @endif
            @if ($latest_products->count() > 0)
                <section class="ps-section--latest-horizontal mt-5">
                    <section class="container">
                        <h3 class="ps-section__title" style="font-size: 30px;">Latest products</h3>
                        <div class="ps-section__content">
                            <div class="row m-0">
                                @foreach ($latest_products as $latest_product)
                                    <div class="col-12 col-md-4 col-lg-3 dot4 p-0">
                                        <div class="ps-section__product">
                                            <div class="ps-product ps-product--standard">
                                                <div class="ps-product__thumbnail">
                                                    <a class="ps-product__image"
                                                        href="{{ route('product.details', $latest_product->slug) }}">
                                                        <figure>
                                                            @if (!empty($latest_product->thumbnail))
                                                                @php
                                                                    $thumbnailPath =
                                                                        'storage/' . $latest_product->thumbnail;
                                                                    $thumbnailSrc = file_exists(
                                                                        public_path($thumbnailPath),
                                                                    )
                                                                        ? asset($thumbnailPath)
                                                                        : asset('frontend/img/no-product.jpg');
                                                                @endphp
                                                                <img src="{{ $thumbnailSrc }}"
                                                                    alt="{{ $latest_product->meta_title }}"
                                                                    width="210" height="210" />
                                                            @else
                                                                @foreach ($latest_product->multiImages->slice(0, 2) as $image)
                                                                    @php
                                                                        $imagePath = 'storage/' . $image->photo;
                                                                        $imageSrc = file_exists(public_path($imagePath))
                                                                            ? asset($imagePath)
                                                                            : // : asset('frontend/img/no-product.jpg');
                                                                            asset('frontend/img/no-product.jpg');
                                                                    @endphp
                                                                    <img src="{{ $imageSrc }}"
                                                                        alt="{{ $latest_product->meta_title }}"
                                                                        width="210" height="210" />
                                                                @endforeach
                                                            @endif
                                                        </figure>
                                                    </a>
                                                    <div class="ps-product__actions">
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Wishlist">
                                                            <a class="add_to_wishlist"
                                                                href="{{ route('wishlist.store', $latest_product->id) }}"><i
                                                                    class="fa fa-heart-o"></i></a>
                                                        </div>
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Quick view">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#popupQuickview{{ $latest_product->id }}">
                                                                <i class="fa fa-search"></i>
                                                            </a>
                                                        </div>

                                                    </div>
                                                    @if (!empty($latest_product->box_discount_price))
                                                        <div class="ps-product__badge">
                                                            <div class="ps-badge ps-badge--sale">Offer</div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="ps-product__content">
                                                    <h5 class="ps-product__title">
                                                        <a
                                                            href="{{ route('product.details', $latest_product->slug) }}">
                                                            {{ $latest_product->name }}
                                                        </a>
                                                    </h5>
                                                    @if (Auth::check() && Auth::user()->status == 'active')
                                                        @if (!empty($latest_product->box_discount_price))
                                                            <div class="ps-product__meta">
                                                                <span
                                                                    class="ps-product__price sale">£{{ $latest_product->box_discount_price }}</span>
                                                                <span
                                                                    class="ps-product__del">£{{ $latest_product->box_price }}</span>
                                                            </div>
                                                        @else
                                                            <div class="ps-product__meta">
                                                                <span
                                                                    class="ps-product__price sale">£{{ $latest_product->box_price }}</span>
                                                            </div>
                                                        @endif
                                                        <a href="{{ route('cart.store', $latest_product->id) }}"
                                                            class="btn ps-btn--warning my-3 btn-block add_to_cart"
                                                            data-product_id="{{ $latest_product->id }}"
                                                            data-product_qty="1">
                                                            Add To Cart
                                                        </a>
                                                    @else
                                                        <div class="ps-product__meta">
                                                            <a href="{{ route('login') }}"
                                                                class="btn btn-info btn-block">Login
                                                                to view price</a>
                                                        </div>
                                                    @endauth
                                                    <div class="ps-product__actions ps-product__group-mobile">
                                                        <div class="ps-product__quantity">
                                                            <div class="def-number-input number-input safari_only">
                                                                <button class="minus"
                                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                        class="icon-minus"></i>
                                                                </button>
                                                                <input class="quantity" min="0"
                                                                    name="quantity" value="1"
                                                                    type="number" />
                                                                <button class="plus"
                                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                        class="icon-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="ps-product__item cart" data-toggle="tooltip"
                                                            data-placement="left" title="Add to cart"><a
                                                                href="#"><i
                                                                    class="fa fa-shopping-basket"></i></a>
                                                        </div>
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Wishlist"><a
                                                                class="add_to_wishlist"
                                                                href="{{ route('wishlist.store', $latest_product->id) }}"><i
                                                                    class="fa fa-heart-o"></i></a>
                                                        </div>
                                                        {{-- <div class="ps-product__item rotate" data-toggle="tooltip"
                                                            data-placement="left" title="Add to compare"><a
                                                                href="compare.html"><i
                                                                    class="fa fa-align-left"></i></a>
                                                        </div> --}}
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </section>
        @endif

        @if ($categoryone && $categoryoneproducts->count() > 0)
            <div class="container">
                <div class="ps-home--block">
                    <h3 class="ps-section__title text-center pb-5" style="font-size: 30px;">
                        {{ $categoryone->name }}</h3>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="ps-block__product">
                                <div class="row m-0">
                                    @foreach ($categoryoneproducts as $catoneproduct)
                                        <div class="col-6 col-lg-3 p-0">
                                            <div class="ps-product ps-product--standard">
                                                <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                        href="product1.html">
                                                        <figure>
                                                            @if (!empty($catoneproduct->thumbnail))
                                                                @php
                                                                    $thumbnailPath =
                                                                        'storage/' . $catoneproduct->thumbnail;
                                                                    $thumbnailSrc = file_exists(
                                                                        public_path($thumbnailPath),
                                                                    )
                                                                        ? asset($thumbnailPath)
                                                                        : asset('frontend/img/no-product.jpg');
                                                                @endphp
                                                                <img src="{{ $thumbnailSrc }}"
                                                                    alt="{{ $catoneproduct->meta_title }}"
                                                                    width="210" height="210" />
                                                            @else
                                                                @foreach ($catoneproduct->multiImages->slice(0, 2) as $image)
                                                                    @php
                                                                        $imagePath = 'storage/' . $image->photo;
                                                                        $imageSrc = file_exists(public_path($imagePath))
                                                                            ? asset($imagePath)
                                                                            : // : asset('frontend/img/no-product.jpg');
                                                                            asset('frontend/img/no-product.jpg');
                                                                    @endphp
                                                                    <img src="{{ $imageSrc }}"
                                                                        alt="{{ $catoneproduct->meta_title }}"
                                                                        width="210" height="210" />
                                                                @endforeach
                                                            @endif
                                                        </figure>
                                                    </a>
                                                    <div class="ps-product__actions">
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Wishlist">
                                                            <a class="add_to_wishlist"
                                                                href="{{ route('wishlist.store', $catoneproduct->id) }}"><i
                                                                    class="fa fa-heart-o"></i>
                                                            </a>
                                                        </div>
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Quick view">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#popupQuickview{{ $catoneproduct->id }}">
                                                                <i class="fa fa-search"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @if (!empty($catoneproduct->box_discount_price))
                                                        <div class="ps-product__badge">
                                                            <div class="ps-badge ps-badge--sale">Offer</div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="ps-product__content">
                                                    <h5 class="ps-product__title">
                                                        <a
                                                            href="{{ route('product.details', $catoneproduct->slug) }}">
                                                            {{ $catoneproduct->name }}
                                                        </a>
                                                    </h5>
                                                    @if (Auth::check() && Auth::user()->status == 'active')
                                                        @if (!empty($catoneproduct->box_discount_price))
                                                            <div class="ps-product__meta">
                                                                <span
                                                                    class="ps-product__price sale">£{{ $catoneproduct->box_discount_price }}</span>
                                                                <span
                                                                    class="ps-product__del">£{{ $catoneproduct->box_price }}</span>
                                                            </div>
                                                        @else
                                                            <div class="ps-product__meta">
                                                                <span
                                                                    class="ps-product__price sale">£{{ $catoneproduct->box_price }}</span>
                                                            </div>
                                                        @endif
                                                        <a href="{{ route('cart.store', $catoneproduct->id) }}"
                                                            class="btn ps-btn--warning my-3 btn-block add_to_cart"
                                                            data-product_id="{{ $catoneproduct->id }}"
                                                            data-product_qty="1">
                                                            Add To Cart
                                                        </a>
                                                    @else
                                                        <div class="ps-product__meta">
                                                            <a href="{{ route('login') }}"
                                                                class="btn btn-info btn-block">Login
                                                                to view price</a>
                                                        </div>
                                                    @endauth
                                                    <div class="ps-product__actions ps-product__group-mobile">
                                                        <div class="ps-product__quantity">
                                                            <div
                                                                class="def-number-input number-input safari_only">
                                                                <button class="minus"
                                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                        class="icon-minus"></i>
                                                                </button>
                                                                <input class="quantity" min="0"
                                                                    name="quantity" value="1"
                                                                    type="number" />
                                                                <button class="plus"
                                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                        class="icon-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="ps-product__item cart"
                                                            data-toggle="tooltip" data-placement="left"
                                                            title="Add to cart"><a href="#"><i
                                                                    class="fa fa-shopping-basket"></i></a>
                                                        </div>
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Wishlist"><a
                                                                class="add_to_wishlist"
                                                                href="{{ route('wishlist.store', $catoneproduct->id) }}"><i
                                                                    class="fa fa-heart-o"></i></a>
                                                        </div>
                                                        {{-- <div class="ps-product__item rotate" data-toggle="tooltip"
                                                                data-placement="left" title="Add to compare"><a
                                                                    href="compare.html"><i
                                                                        class="fa fa-align-left"></i></a>
                                                            </div> --}}
                                                    </div>
                                            </div>
                                        </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="ps-delivery ps-delivery--info my-5"
        data-background="https://nouthemes.net/html/mymedi/img/promotion/banner-delivery-3.jpg"
        style="background-image: url(&quot;img/promotion/banner-delivery-3.jpg&quot;);">
        <div class="ps-delivery__content">
            <div class="ps-delivery__text"> <i class="icon-shield-check"></i><span> <strong>100% Secure
                        delivery </strong>without contacting the courier</span></div><a
                class="ps-delivery__more" href="#">More</a>
        </div>
    </div>
    <section class="ps-section--latest">
        <div class="container">
            <h3 class="ps-section__title">{{ $categorytwo->name }}</h3>
            <div class="ps-section__carousel mb-0">
                <div class="takeway-slider owl-carousel owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-2228px, 0px, 0px); transition: 1s; width: 4952px;">
                            @foreach ($categorytwoproducts as $cattwoproduct)
                                <div class="owl-item" style="width: 247.6px;">
                                    <div class="ps-section__product">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail">
                                                <a class="ps-product__image"
                                                    href="{{ route('product.details', $cattwoproduct->slug) }}">
                                                    <figure>
                                                        @if (!empty($cattwoproduct->thumbnail))
                                                            @php
                                                                $thumbnailPath = 'storage/' . $cattwoproduct->thumbnail;
                                                                $thumbnailSrc = file_exists(public_path($thumbnailPath))
                                                                    ? asset($thumbnailPath)
                                                                    : asset('frontend/img/no-product.jpg');
                                                            @endphp
                                                            <img src="{{ $thumbnailSrc }}"
                                                                alt="{{ $cattwoproduct->meta_title }}"
                                                                width="210" height="210" />
                                                        @else
                                                            @foreach ($cattwoproduct->multiImages->slice(0, 2) as $image)
                                                                @php
                                                                    $imagePath = 'storage/' . $image->photo;
                                                                    $imageSrc = file_exists(public_path($imagePath))
                                                                        ? asset($imagePath)
                                                                        : asset('frontend/img/no-product.jpg');
                                                                @endphp
                                                                <img src="{{ $imageSrc }}"
                                                                    alt="{{ $cattwoproduct->meta_title }}"
                                                                    width="210" height="210" />
                                                            @endforeach
                                                        @endif
                                                    </figure>
                                                </a>
                                                <div class="ps-product__actions">
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist">
                                                        <a class="add_to_wishlist"
                                                            href="{{ route('wishlist.store', $cattwoproduct->id) }}"><i
                                                                class="fa fa-heart-o"></i>
                                                        </a>
                                                    </div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Quick view">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#popupQuickview{{ $cattwoproduct->id }}">
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                @if (!empty($cattwoproduct->box_discount_price))
                                                    <div class="ps-product__badge">
                                                        <div class="ps-badge ps-badge--sale">Offer</div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-product__title">
                                                    <a
                                                        href="{{ route('product.details', $cattwoproduct->slug) }}">
                                                        {{ $cattwoproduct->name }}
                                                    </a>
                                                </h5>
                                                @if (Auth::check() && Auth::user()->status == 'active')
                                                    @if (!empty($cattwoproduct->box_discount_price))
                                                        <div class="ps-product__meta">
                                                            <span
                                                                class="ps-product__price sale">£{{ $cattwoproduct->box_discount_price }}</span>
                                                            <span
                                                                class="ps-product__del">£{{ $cattwoproduct->box_price }}</span>
                                                        </div>
                                                    @else
                                                        <div class="ps-product__meta">
                                                            <span
                                                                class="ps-product__price sale">£{{ $cattwoproduct->box_price }}</span>
                                                        </div>
                                                    @endif
                                                    <a href="{{ route('cart.store', $cattwoproduct->id) }}"
                                                        class="btn ps-btn--warning my-3 btn-block add_to_cart"
                                                        data-product_id="{{ $cattwoproduct->id }}"
                                                        data-product_qty="1">
                                                        Add To Cart
                                                    </a>
                                                @else
                                                    <div class="ps-product__meta">
                                                        <a href="{{ route('login') }}"
                                                            class="btn btn-info btn-block">Login
                                                            to view price</a>
                                                    </div>
                                                @endauth
                                                <div class="ps-product__actions ps-product__group-mobile">
                                                    <div class="ps-product__quantity">
                                                        <div
                                                            class="def-number-input number-input safari_only">
                                                            <button class="minus"
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                    class="icon-minus"></i>
                                                            </button>
                                                            <input class="quantity" min="0"
                                                                name="quantity" value="1"
                                                                type="number" />
                                                            <button class="plus"
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                    class="icon-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="ps-product__item cart"
                                                        data-toggle="tooltip" data-placement="left"
                                                        title="Add to cart"><a href="#"><i
                                                                class="fa fa-shopping-basket"></i></a>
                                                    </div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist"><a
                                                            class="add_to_wishlist"
                                                            href="{{ route('wishlist.store', $cattwoproduct->id) }}"><i
                                                                class="fa fa-heart-o"></i></a>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if ($categorythree && $categorythreeproducts->count() > 0)
    <div class="container">
        <div class="ps-home--block">
            <h3 class="ps-section__title text-center pb-5" style="font-size: 30px;">
                {{ $categorythree->name }}</h3>
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="ps-block__product">
                        <div class="row m-0">
                            @foreach ($categorythreeproducts as $catthreeproduct)
                                <div class="col-6 col-lg-3 p-0">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure>
                                                    @if (!empty($catthreeproduct->thumbnail))
                                                        @php
                                                            $thumbnailPath = 'storage/' . $catthreeproduct->thumbnail;
                                                            $thumbnailSrc = file_exists(public_path($thumbnailPath))
                                                                ? asset($thumbnailPath)
                                                                : asset('frontend/img/no-product.jpg');
                                                        @endphp
                                                        <img src="{{ $thumbnailSrc }}"
                                                            alt="{{ $catthreeproduct->meta_title }}"
                                                            width="210" height="210" />
                                                    @else
                                                        @foreach ($catthreeproduct->multiImages->slice(0, 2) as $image)
                                                            @php
                                                                $imagePath = 'storage/' . $image->photo;
                                                                $imageSrc = file_exists(public_path($imagePath))
                                                                    ? asset($imagePath)
                                                                    : // : asset('frontend/img/no-product.jpg');
                                                                    asset('frontend/img/no-product.jpg');
                                                            @endphp
                                                            <img src="{{ $imageSrc }}"
                                                                alt="{{ $catthreeproduct->meta_title }}"
                                                                width="210" height="210" />
                                                        @endforeach
                                                    @endif
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist">
                                                    <a class="add_to_wishlist"
                                                        href="{{ route('wishlist.store', $catthreeproduct->id) }}"><i
                                                            class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#popupQuickview{{ $catthreeproduct->id }}">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            @if (!empty($catthreeproduct->box_discount_price))
                                                <div class="ps-product__badge">
                                                    <div class="ps-badge ps-badge--sale">Offer</div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title">
                                                <a
                                                    href="{{ route('product.details', $catthreeproduct->slug) }}">
                                                    {{ $catthreeproduct->name }}
                                                </a>
                                            </h5>
                                            @if (Auth::check() && Auth::user()->status == 'active')
                                                @if (!empty($catthreeproduct->box_discount_price))
                                                    <div class="ps-product__meta">
                                                        <span
                                                            class="ps-product__price sale">£{{ $catthreeproduct->box_discount_price }}</span>
                                                        <span
                                                            class="ps-product__del">£{{ $catthreeproduct->box_price }}</span>
                                                    </div>
                                                @else
                                                    <div class="ps-product__meta">
                                                        <span
                                                            class="ps-product__price sale">£{{ $catthreeproduct->box_price }}</span>
                                                    </div>
                                                @endif
                                                <a href="{{ route('cart.store', $catthreeproduct->id) }}"
                                                    class="btn ps-btn--warning my-3 btn-block add_to_cart"
                                                    data-product_id="{{ $catthreeproduct->id }}"
                                                    data-product_qty="1">
                                                    Add To Cart
                                                </a>
                                            @else
                                                <div class="ps-product__meta">
                                                    <a href="{{ route('login') }}"
                                                        class="btn btn-info btn-block">Login
                                                        to view price</a>
                                                </div>
                                            @endauth
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div
                                                        class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i>
                                                        </button>
                                                        <input class="quantity" min="0"
                                                            name="quantity" value="1"
                                                            type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="ps-product__item cart"
                                                    data-toggle="tooltip" data-placement="left"
                                                    title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a>
                                                </div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a
                                                        class="add_to_wishlist"
                                                        href="{{ route('wishlist.store', $catthreeproduct->id) }}"><i
                                                            class="fa fa-heart-o"></i></a>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
</div>



@if ($deals->count() > 0 || $deal_products->count() > 0)
<div class="container">
@if ($deals->count() > 0)
    <h3 class="ps-section__title text-center" style="font-size: 30px;">This week deals</h3>
    <div class="ps-promo ps-promo--home">
        <!-- First Row: First Three Deals -->
        <div class="row">
            @foreach ($deals->slice(0, 3) as $deal)
                <div class="col-12 col-md-4">
                    <div class="ps-promo__item">
                        <a href="{{ route('product.details', $deal->product->slug) }}">
                            @if ($deal->image)
                                <img class="ps-promo__banner"
                                    src="{{ asset('storage/' . $deal->image) }}" alt="alt" />
                            @endif
                            <div class="ps-promo__content">
                                @if ($deal->badge)
                                    <span
                                        class="ps-promo__badge">{{ $deal->badge ?? round(100 - ($deal->offer_price / $deal->price) * 100) . '%' }}</span>
                                @endif
                                <h4 class="text-white ps-promo__name">
                                    {{ $deal->title }}
                                </h4>
                                @if ($deal->subtitle)
                                    <p>{{ $deal->subtitle }}</p>
                                @endif
                                @if ($deal->offer_price && $deal->price)
                                    <div class="ps-promo__meta">
                                        <p class="ps-promo__price text-warning">
                                            £{{ $deal->offer_price }}
                                        </p>
                                        <p class="ps-promo__del text-white">£{{ $deal->price }}
                                        </p>
                                    </div>
                                @endif
                                @if (!empty($deal->button_link))
                                    <a class="btn-green ps-promo__btn"
                                        href="{{ $deal->button_link }}">{{ $deal->button_name }}</a>
                                @elseif (!empty($deal->product_id))
                                    <a class="btn-green ps-promo__btn"
                                        href="{{ route('product.details', $deal->product->slug) }}">Buy
                                        now</a>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Second Row: Next Four Deals -->
        <div class="row ps-promo--horizontal">
            @foreach ($deals->slice(3, 4) as $deal)
                <div class="col-12 col-md-3">
                    <div class="ps-promo__item">
                        @if ($deal->image)
                            <img class="ps-promo__banner"
                                src="{{ asset('storage/' . $deal->image) }}" alt="alt" />
                        @endif
                        <div class="ps-promo__content">
                            <h4 class="text-dark ps-promo__name">
                                {{ $deal->title }}
                            </h4>
                            @if ($deal->offer_price && $deal->price)
                                <div class="ps-promo__meta">
                                    <p class="ps-promo__price text-warning">
                                        £ {{ number_format($deal->offer_price, 2) }}</p>
                                    <p class="ps-promo__del text-dark">
                                        £ {{ number_format($deal->price, 2) }}</p>
                                </div>
                            @endif
                            @if (!empty($deal->button_link))
                                <a class="btn-green ps-promo__btn"
                                    href="{{ $deal->button_link }}">{{ $deal->button_name }}</a>
                            @elseif (!empty($deal->product_id))
                                <a class="btn-green ps-promo__btn"
                                    href="{{ route('product.details', $deal->product->slug) }}">Buy
                                    now</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

@if ($deal_products->count() > 0)
    <section class="ps-section--deals">
        <div class="ps-section__header">
            <h3 class="ps-section__title" style="font-size: 30px;">Best Deals of the week!</h3>
        </div>
        <div class="ps-section__carousel">
            <div class="dealCarousel owl-carousel">
                @foreach ($deal_products as $deal_product)
                    <div class="ps-section__product">
                        <div class="ps-product ps-product--standard">
                            <div class="ps-product__thumbnail">
                                <a class="ps-product__image"
                                    href="{{ route('product.details', $deal_product->slug) }}">
                                    <figure>
                                        @if (!empty($deal_product->thumbnail))
                                            @php
                                                $thumbnailPath = 'storage/' . $deal_product->thumbnail;
                                                $thumbnailSrc = file_exists(public_path($thumbnailPath))
                                                    ? asset($thumbnailPath)
                                                    : asset('frontend/img/no-product.jpg');
                                            @endphp
                                            <img src="{{ $thumbnailSrc }}"
                                                alt="{{ $deal_product->meta_title }}" width="210"
                                                height="210" />
                                        @else
                                            @foreach ($deal_product->multiImages->slice(0, 2) as $image)
                                                @php
                                                    $imagePath = 'storage/' . $image->photo;
                                                    $imageSrc = file_exists(public_path($imagePath))
                                                        ? asset($imagePath)
                                                        : // : asset('frontend/img/no-product.jpg');
                                                        asset('frontend/img/no-product.jpg');
                                                @endphp
                                                <img src="{{ $imageSrc }}"
                                                    alt="{{ $deal_product->meta_title }}"
                                                    width="210" height="210" />
                                            @endforeach
                                        @endif
                                    </figure>
                                </a>
                                <div class="ps-product__actions">
                                    <div class="ps-product__item" data-toggle="tooltip"
                                        data-placement="left" title="Wishlist">
                                        <a class="add_to_wishlist"
                                            href="{{ route('wishlist.store', $deal_product->id) }}">
                                            <i class="fa fa-heart-o"></i>
                                        </a>
                                    </div>
                                    <div class="ps-product__item" data-toggle="tooltip"
                                        data-placement="left" title="Quick view"><a href="#"
                                            data-toggle="modal"
                                            data-target="#popupQuickview{{ $deal_product->id }}"><i
                                                class="fa fa-search"></i></a></div>

                                </div>
                                @if (!empty($deal_product->box_discount_price))
                                    <div class="ps-product__badge">
                                        <div class="ps-badge ps-badge--sale">Offer</div>
                                    </div>
                                @endif
                            </div>
                            <div class="ps-product__content">
                                <h5 class="ps-product__title">
                                    <a href="{{ route('product.details', $deal_product->slug) }}">
                                        {{ $deal_product->name }}
                                    </a>
                                </h5>
                                @if (Auth::check() && Auth::user()->status == 'active')
                                    @if (!empty($deal_product->box_discount_price))
                                        <div class="ps-product__meta">
                                            <span
                                                class="ps-product__price sale">£{{ $deal_product->box_discount_price }}</span>
                                            <span
                                                class="ps-product__del">£{{ $deal_product->box_price }}</span>
                                        </div>
                                    @else
                                        <div class="ps-product__meta">
                                            <span
                                                class="ps-product__price sale">£{{ $deal_product->box_price }}</span>
                                        </div>
                                    @endif
                                    <a href="{{ route('cart.store', $deal_product->id) }}"
                                        class="btn ps-btn--warning my-3 btn-block add_to_cart"
                                        data-product_id="{{ $deal_product->id }}"
                                        data-product_qty="1">Add To
                                        Cart</a>
                                @else
                                    <div class="ps-product__meta">
                                        <a href="{{ route('login') }}"
                                            class="btn btn-info btn-block">Login
                                            to view price</a>
                                    </div>
                                @endif
                                <div class="ps-product__actions ps-product__group-mobile">

                                    <div class="ps-product__item cart" data-toggle="tooltip"
                                        data-placement="left" title="Add to cart">
                                        <a class="add_to_cart"
                                            href="{{ route('cart.store', $deal_product->id) }}"
                                            data-product_id="{{ $deal_product->id }}"
                                            data-product_qty="1">
                                            <i class="fa fa-shopping-basket"></i>
                                        </a>
                                    </div>
                                    <div class="ps-product__item" data-toggle="tooltip"
                                        data-placement="left" title="Wishlist">
                                        <a class="add_to_wishlist"
                                            href="{{ route('wishlist.store', $deal_product->id) }}">
                                            <i class="fa fa-heart-o"></i>
                                        </a>
                                    </div>
                                    {{-- <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Add to compare"><a
                                                            href="compare.html"><i class="fa fa-align-left"></i></a>
                                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
</div>
@endif
@if ($blog_posts->count() > 0)
<section class="ps-section--blog container my-5">
<div class="py-5">
    <h3 class="ps-section__title" style="font-size: 30px;">From the blog</h3>
</div>
<div class="ps-section__carousel">
    <div class="blog-slider owl-carousel">
        @foreach ($blog_posts as $blog_post)
            <div class="ps-section__item">
                <div class="ps-blog--latset">
                    <div class="ps-blog__thumbnail">
                        <a href="{{ route('blog.details', $blog_post->slug) }}">
                            <img src="{{ $blog_post->image ? asset('storage/' . $blog_post->image) : asset('frontend/img/no-blogs.jpg') }}"
                                alt="Blog Post Image"
                                onerror="this.onerror=null; this.src='{{ asset('frontend/img/no-blogs.jpg') }}';">
                        </a>
                        @if ($blog_post->badge)
                            <div class="ps-blog__badge">
                                <span class="ps-badge__item">{{ $blog_post->badge }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="ps-blog__content">
                        <div class="ps-blog__meta">
                            <span
                                class="ps-blog__date">{{ $blog_post->created_at->format('M d Y') }}</span>
                            <a class="ps-blog__author" href="#">{{ $blog_post->author }}</a>
                        </div>
                        <a class="ps-blog__title" style="font-size: 18px;"
                            href="{{ route('blog.details', $blog_post->slug) }}">
                            {{ $blog_post->title }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="owl-nav">
        <button type="button" role="presentation" class="owl-prev"><i
                class="fa fa-chevron-left"></i></button>
        <button type="button" role="presentation" class="owl-next"><i
                class="fa fa-chevron-right"></i></button>
    </div>
    <div class="owl-dots">
        <button role="button" class="owl-dot"><span></span></button>
    </div>
</div>
</section>
@endif
</div>
</div>
@include('frontend.layouts.HomeQuickViewModal')
@push('scripts')
<script>
    $(document).ready(function() {
        $('.dealCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            navText: [
                '<div class="dealCarousel-prev">←</div>',
                '<div class="dealCarousel-next">→</div>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".blog-slider").owlCarousel({
            loop: true, // Enable continuous loop mode
            margin: 10, // Space between items
            nav: true, // Show next/prev buttons
            items: 3,
            dots: true, // Show dots for navigation
            autoplay: true, // Enable autoplay
            autoplayTimeout: 3000, // Delay for autoplay
            responsive: {
                0: {
                    items: 1, // 1 item at a time for small screens
                },
                600: {
                    items: 2, // 2 items at a time for medium screens
                },
                1000: {
                    items: 3, // 3 items at a time for large screens
                },
            },
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".takeway-slider").owlCarousel({
            loop: true, // Enable continuous loop mode
            margin: 10, // Space between items
            nav: true, // Show next/prev buttons
            items: 4,
            dots: true, // Show dots for navigation
            autoplay: true, // Enable autoplay
            autoplayTimeout: 3000, // Delay for autoplay
            responsive: {
                0: {
                    items: 1, // 1 item at a time for small screens
                },
                600: {
                    items: 2, // 2 items at a time for medium screens
                },
                1000: {
                    items: 4, // 3 items at a time for large screens
                },
            },
        });
    });
</script>
@endpush
</x-frontend-app-layout>
