<!-- ./Page header -->
<header class="header online-payment-header section">
    <div id="stripes"><span></span><span></span><span></span><span></span><span></span></div>

    <div class="container overflow-hidden bring-to-front">
        <div class="row">
            <div class="col-md-6 @rtl text-end @endrtl">
                <h1 class="text-contrast bold">
                    {{ $title }}
                </h1>
                <p class="lead text-contrast">
                    {{ $description }}
                </p>

                <nav class="nav mt-5">
                    <a href="#" class="@rtl ms-3 @else me-3 @endrtl btn btn-rounded btn-contrast">
                        <i class="fas fa-tag @rtl ms-3 @else me-3 @endrtl"></i>Записатись
                    </a>

                    <a href="#" class="btn btn-rounded btn-success text-contrast">
                        Контакти
                    </a>
                </nav>
            </div>

            <div class="col-md-6 position-relative">
                <img src="{{ asset('img/custom/car-hero-2.png') }}" class="img-hero img-responsive absolute-md" alt="">
            </div>
        </div>
    </div>
</header>
