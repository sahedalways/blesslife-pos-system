@extends('cms::frontend.layouts.app')
@section('title', 'FAQ')
@php
    $navbar_btn['text'] = 'Try For Free';
    $navbar_btn['link'] = route('business.getRegister');
    $navbar_btn['drop_down_text'] = 'Pages';
    if (
        isset($__site_details['btns']) &&
        isset($__site_details['btns']['navbar']) &&
        !empty($__site_details['btns']['navbar']['text'])
    ) {
        $navbar_btn['text'] = $__site_details['btns']['navbar']['text'] ?? 'Try For Free';
    }
    if (
        isset($__site_details['btns']) &&
        isset($__site_details['btns']['navbar']) &&
        !empty($__site_details['btns']['navbar']['link'])
    ) {
        $navbar_btn['link'] = $__site_details['btns']['navbar']['link'] ?? route('business.getRegister');
    }
    if (
        isset($__site_details['btns']) &&
        isset($__site_details['btns']['navbar']) &&
        !empty($__site_details['btns']['navbar']['drop_down_text'])
    ) {
        $navbar_btn['drop_down_text'] = $__site_details['btns']['navbar']['drop_down_text'] ?? 'Pages';
    }
    $hero_btn['text'] = 'Start your Free Trial';
    $hero_btn['link'] = route('business.getRegister');
    if (
        isset($__site_details['btns']) &&
        isset($__site_details['btns']['hero']) &&
        !empty($__site_details['btns']['hero']['text'])
    ) {
        $hero_btn['text'] = $__site_details['btns']['hero']['text'] ?? 'Start your Free Trial';
    }
    if (
        isset($__site_details['btns']) &&
        isset($__site_details['btns']['hero']) &&
        !empty($__site_details['btns']['hero']['link'])
    ) {
        $hero_btn['link'] = $__site_details['btns']['hero']['link'] ?? route('business.getRegister');
    }
@endphp
@includeIf('cms::frontend.layouts.home_header')
<x-hero heroImage="https://images.unsplash.com/photo-1553877522-43269d4ea984?w=1600&q=80"
        heroSubtitle="FAQ"
        heroTitle="Frequently Asked Questions"
        description="Find answers to the most common questions about our platform." />

@section('content')
    @includeIf('cms::frontend.pages.partials.faq', ['faqs' => $faqs ?? []])
@endsection

@section('javascript')
    <script type="text/javascript">
        new Sticky("[sticky]");
    </script>
@endsection
