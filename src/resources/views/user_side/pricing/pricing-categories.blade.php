@extends('user_side.layouts.pages')

@section('title', 'Категорії ремонту')

@section('content')
    @include ("user_side.pricing.partials.heading", ['title' => 'Категорії ремонту', 'description' => 'Виберіть, будь ласка, категорію щоб отримати повний список цін'])

    @include ("user_side.pricing.partials.categories")

    @include ("frontend.pages.social.register")
@endsection

@section('footer')
    @include ("frontend.blocks.footers.simple-3cols", [ "class" => "block bg-contrast", "containerClass" => "py-4" ])
@endsection
