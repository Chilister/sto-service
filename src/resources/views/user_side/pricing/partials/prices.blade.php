<section id="features" class="section payment-features bg-light edge @rtl top-right @else top-left @endrtl">
    <div class="container bring-to-front">
        <div class="section-heading mb-5 text-center">
            <h2 class="bold">Прайс Лист</h2>
        </div>

        <div class="row gap-y text-center text-md-start">
            @foreach ($category->prices->sortBy('price') as $price)
                <div class="col-lg-4">
                    <div class="promo-box card shadow bottom-left">
                        <div class="card-body">
                            <p class="text-dark h5">{{ $price->title }}</p>
                            <p class="small text-primary mb-2 counter">{{ $price->price }}₴</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


