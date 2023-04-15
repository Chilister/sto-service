@extends('user_side.layouts.pages')

@section('title', __('Contact Us'))

@section('content')
    <x-frontend.header
        title="Контакти"
        subtitle="Ви можете записатись на техогляд заповнивши форму під даним текстом, або зателефонувавши по одному із запропонованих телефонів"
        container-class="pb-9" />

    <x-utils.divider color="contrast" />

    @include("user_side.contact_us.partials.form")

@endsection

@section('footer')
    @include("frontend.blocks.footers.simple-3cols", [ "class" => "block bg-contrast", "containerClass" => "py-4" ])
@endsection
