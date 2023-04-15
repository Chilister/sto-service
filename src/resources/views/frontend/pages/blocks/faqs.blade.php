@extends('frontend.layouts.blocks', [
    "subtitle" => "Help your users to hel discover and answer their questions in an easy way."
])

@section('title', __("FAQ's"))

@php ($attrs = [
    'class' => 'block bg-contrast',
    'containerClass' => 'py-4',
    'faqs' => [[
            "question" => "What does the package include?",
            "answer" => "When you buy Dashcore, you get all you see in the demo but the images. We include SASS files for styling, complete JS files with comments, all HTML variations. Besides we include all mobile PSD mockups."
        ], [
            "question" => "What is the typical response time for a support question?",
            "answer" => "Since you report us a support question we try to make our best to find out what is going on, depending on the case it could take more or les time, however a standard time could be minutes or hours."
        ], [
            "question" => "What do I need to know to customize this template?",
            "answer" => "Our documentation give you all you need to customize your copy. However you will need some basic web design knowledge (HTML, Javascript and CSS)"
        ], [
            "question" => "Can I suggest a new feature?",
            "answer" => "Definitely <span class='bold'>Yes</span>, you can contact us to let us know your needs. If your suggestion represents any value to both we can include it as a part of the theme or you can request a custom build by an extra cost. Please note it could take some time in order for the feature to be implemented."
        ]]
])

@section('main')

    @include ("frontend.blocks.faqs.1", $attrs)
    @include ("frontend.blocks.faqs.2", $attrs)
    @include ("frontend.blocks.faqs.3", $attrs)

@endsection
