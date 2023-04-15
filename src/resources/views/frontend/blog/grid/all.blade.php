<x-utils.container>
    <div class="row g-4">
        @foreach ($posts as $post)
            <div class="col-md-6 col-lg-4">
                @include ("frontend.blog.grid._card", [ "post" => $post ])
            </div>
        @endforeach
    </div>

    <nav class="nav justify-content-center mt-5">
        <a class="btn btn-outline-primary btn-rounded me-5" href="javascript:;"><i class="fas fa-angle-left me-3"></i> Previous</a>
        <a class="btn btn-outline-primary btn-rounded" href="javascript:;">Next <i class="fas fa-angle-right ms-3"></i></a>
    </nav>
</x-utils.container>
