@extends('layouts.app')

@section('title', 'Catalog — TurboTechLamps')

@section('content')
  @vite(['resources/css/index.css', 'resources/js/index.js'])

  <section class="cat-wrap">
    <div class="cat-header">
      <div class="cat-titles">
        <h1 class="headline reveal">Catalog</h1>
        <p class="subhead reveal delay-1">Hand-crafted lamps made from real turbochargers. Browse the collection.</p>
      </div>

      
    </div>

    <div class="grid">
      @forelse($lamps as $lamp)
        <a class="card reveal tilt" href="{{ route('lamps.show', $lamp->id ?? $lamp) }}" data-tilt>
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
@endsection
