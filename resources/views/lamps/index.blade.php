@extends('layouts.app')

@section('title', 'Catalog — TurboTechLamps')

@section('content')
  @vite([
    'resources/css/index.css', 
    'resources/js/index.js',
    'resources/css/lightbox.css',
    'resources/js/lightbox.js'
    ])

  <section class="cat-wrap">
    <div class="cat-header">
      <div class="cat-titles">
        <h1 class="headline reveal">Catalog</h1>
        <p class="subhead reveal delay-1">Hand-crafted lamps made from real turbochargers. Browse the collection.</p>
      </div>

      
    </div>

    <div class="grid">
      @forelse($lamps as $lamp)
        <a class="card reveal tilt js-lightbox"
           href="{{ $lamp->image_path ? asset($lamp->image_path) : asset('images/placeholder.jpg') }}"
           data-title="{{ $lamp->name }}"
           @if(isset($lamp->price)) data-price="€ {{ number_format((float)$lamp->price, 2) }}" @endif
           data-src="{{ $lamp->image_path ? asset($lamp->image_path) : asset('images/placeholder.jpg') }}"
           data-alt="{{ $lamp->name }}">
          <div class="shine"></div>
          <div class="thumb">
            <img
              src="{{ $lamp->image_path ? asset($lamp->image_path) : asset('images/placeholder.jpg') }}"
              alt="{{ $lamp->name }}"
              loading="lazy">
          </div>
          <div class="meta">
            <h3 class="title">{{ $lamp->name }}</h3>
            @isset($lamp->price)
              <div class="price">€ {{ number_format((float)$lamp->price, 2) }}</div>
            @endisset
          </div>
        </a>
      @empty
        <p class="muted empty reveal">No lamps yet. Check back soon.</p>
      @endforelse
    </div>

    @if(method_exists($lamps, 'links'))
      <div class="pager">
        {{ $lamps->links() }}
      </div>
    @endif
  </section>


   <div id="ttl-lightbox" aria-hidden="true">
    <button class="ttl-lb-close" aria-label="Close">&times;</button>
    <div class="ttl-lb-stage">
      <img id="ttl-lb-img" alt="">
      <div class="ttl-lb-caption">
        <span id="ttl-lb-title"></span>
        <span id="ttl-lb-price"></span>
      </div>
    </div>
    <div class="ttl-lb-backdrop"></div>
  </div>
@endsection
