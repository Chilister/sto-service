<!-- ./Download -->
<x-utils.container class="section app-download" container-class="bring-to-front">
    <div class="shadow-lg bg-contrast p-5 rounded">
        <div class="section-heading text-center">
            <p class="text-primary regular">Start today</p>
            <h2 class="bold">Download the App</h2>
            <p class="lead text-secondary">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur
                debitis delectus, ducimus enim et eveniet facilis harum ipsa magni non odit pariatur placeat.</p>
        </div>

        <nav class="nav flex-column flex-md-row justify-content-center align-items-center mt-5">
            <a href="#"
                class="nav-link py-3 px-4 btn btn-rounded btn-download btn-dark text-contrast me-0 @rtl ms-md-4 @else me-md-4 @endrtl mb-4 mb-md-0">
                <img src="{{ asset("img/svg/apple.svg") }}" class="icon icon-md" alt="...">
                <p class="ms-2">
                    <span class="small bold">Get it on the</span>
                    <span class="d-block bold text-contrast">App Store</span>
                </p>
            </a>

            <a href="#" class="nav-link py-3 px-4 btn btn-rounded btn-download btn-light text-darker">
                <img src="{{ asset("img/svg/google-play.svg") }}" class="icon icon-md" alt="...">
                <p class="ms-2">
                    <span class="small bold">Download on</span>
                    <span class="d-block bold text-darker">Google Play</span>
                </p>
            </a>
        </nav>
    </div>
</x-utils.container>
