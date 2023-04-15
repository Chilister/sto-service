<!-- ./Contact Us -->
<x-utils.container class="mt-n7" container-class="bring-to-front pt-0">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="shadow bg-contrast p-4 rounded">
                @include('user_side.contact_us.partials.contact-form')
            </div>
        </div>

        <div class="col-md-5 @rtl me-md-auto @else ms-md-auto @endrtl">
            <div class="d-flex mt-5">
                <i class="fas fa-map-marker font-l text-primary @rtl ms-3 @else me-3 @endrtl"></i>
                <div class="flex-fill">
                    Місто та Вулиця
                </div>
            </div>

            <div class="d-flex my-4">
                <i class="fas fa-phone font-l text-primary @rtl ms-3 @else me-3 @endrtl"></i>
                <div class="flex-fill">
                    <span class="d-block"><a href="tel:+1-123-456-7890">(123) 456-7890</a></span>
                    <span class="d-block"><a href="tel:+1-987-654-3201">(987) 654-3201</a></span>
                </div>
            </div>
        </div>
    </div>
</x-utils.container>
