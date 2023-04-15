@extends('user_side.layouts.pages')

@section('title', __('Online Payment'))

@section('content')
    @include ("user_side.pricing.partials.heading", ['title' => $category->title, 'description' => $category->description])

    @include ("user_side.pricing.partials.prices")

    @include ("frontend.pages.social.register")
@endsection

@section('footer')
    @include ("frontend.blocks.footers.simple-3cols", [ "class" => "block bg-contrast", "containerClass" => "py-4" ])
@endsection
