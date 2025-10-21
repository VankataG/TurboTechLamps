@extends('layouts.app')

@section('title', 'Add New Lamp — TurboTechLamps')

@section('content')
  {{-- Include page-specific assets (in addition to home.css/js from your layout) --}}
  @vite(['resources/css/create.css', 'resources/js/create.js'])

  <section class="create-hero">
    <!-- Left photos column (reuse your real images later) -->
    <div class="side-photos left">
      <img src="{{ asset('images/home/left-1.jpg') }}" alt="Workshop detail" class="reveal">
      <img src="{{ asset('images/home/left-2.jpg') }}" alt="Turbo housing" class="reveal">
      <img src="{{ asset('images/home/left-3.jpg') }}" alt="Finishing process" class="reveal">
    </div>

    <!-- Center form -->
    <div class="create-inner">
      <div class="glow"></div>

      <h1 class="headline reveal">Add a new lamp</h1>
      <p class="subhead reveal delay-1">Keep the details tidy — it’ll look great in the catalog.</p>

      <div class="form-card reveal delay-2">
        @if ($errors->any())
          <div class="form-errors">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('lamps.store') }}" class="ttl-form">
          @csrf

          <div class="field">
            <label for="name">Lamp name</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="e.g., Turbo Night Lamp V3" required>
          </div>

          <div class="field">
            <label for="price">Price (€)</label>
            <input id="price" name="price" type="number" step="0.01" min="0" value="{{ old('price') }}" placeholder="e.g., 179.99" required>
            <small class="muted">Stored as DECIMAL(10,2)</small>
          </div>

          <div class="field">
            <label for="image_path">Image path (under /public/images)</label>
            <input id="image_path" name="image_path" type="text" value="{{ old('image_path') }}" placeholder="images/lamp1.jpg">
            <small class="muted">Example: <code>images/lamp1.jpg</code></small>
          </div>

          <div class="preview">
            <span class="muted">Preview</span>
            <div class="preview-frame">
              <img id="previewImg" src="{{ old('image_path') ? asset(old('image_path')) : asset('images/placeholder.jpg') }}" alt="Preview">
            </div>
          </div>

          <div class="actions">
            <a class="btn-ghost" href="{{ route('lamps.index') }}">Cancel</a>
            <button type="submit" class="btn-primary">Create Lamp</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Right photos column -->
    <div class="side-photos right">
      <img src="{{ asset('images/home/right-1.jpg') }}" alt="Ambient light" class="reveal">
      <img src="{{ asset('images/home/right-2.jpg') }}" alt="Gunmetal finish" class="reveal">
      <img src="{{ asset('images/home/right-3.jpg') }}" alt="Desk setup" class="reveal">
    </div>
  </section>
@endsection
