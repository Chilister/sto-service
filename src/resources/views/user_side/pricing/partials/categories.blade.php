<section id="features" class="section payment-features bg-light edge @rtl top-right @else top-left @endrtl">
    <div class="container bring-to-front">
        <div class="section-heading mb-5 text-center">
            <h5 class="text-primary bold small">виберіть категорію</h5>
            <h2 class="bold">Категорії ремонту</h2>
        </div>

        <div class="row gap-y text-center text-md-start">
            @foreach ($categories as $category)
                <div class="col-lg-6">
                    <a href="{{ route('pricing.category', $category->slug) }}">
                        <div
                            class="rounded bg-contrast shadow-box image-background off-left-background lift-hover p-4 ps-6 ps-md-9"
                            style="background-image: url({{ asset("img/lcards/time.svg") }})">
                            <h4>{{ $category->title }}</h4>
                            <p class="text-secondary mb-0">
                                {{ $category->description ?? 'test test test test test test test test test test test' }}
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>


