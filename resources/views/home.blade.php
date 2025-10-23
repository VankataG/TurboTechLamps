@extends('layouts.app')

@section('title', 'TurboTechLamps — Industrial Art in Light')

@section('content')
<section class="hero">
  <!-- Left photos column -->
  <div class="side-photos left">
    <img src="{{ asset('images/home/left-1.jpg') }}" alt="Turbo lamp detail">
    <img src="{{ asset('images/home/left-2.jpg') }}" alt="Machined turbine fins">
    <img src="{{ asset('images/home/left-3.jpg') }}" alt="Powder-coated turbo housing">
  </div>

  <!-- Center content -->
  <div class="hero-inner">
    <div class="glow"></div>
    <h1 class="headline reveal">Industrial souls. Modern glow.</h1>
    <p class="subhead reveal delay-1">
      Night lamps crafted from <strong>real turbochargers</strong> — cleaned, restored, and wired with hidden installations.
    </p>
    <div class="cta-row reveal delay-2">
      <a class="btn-primary" href="/lamps">Explore the Catalog</a>
      <a class="btn-ghost" href="#about">How they’re made</a>
    </div>
  </div>

  <!-- Right photos column -->
  <div class="side-photos right">
    <img src="{{ asset('images/home/right-1.jpg') }}" alt="Warm ambient lighting">
    <img src="{{ asset('images/home/right-2.jpg') }}" alt="Gunmetal finish">
    <img src="{{ asset('images/home/right-3.jpg') }}" alt="Desk setup with lamp">
  </div>
</section>

<section id="about" class="about">
  <div class="about-inner">
    <h2 class="reveal">Built to keep the turbo’s character.</h2>
    <p class="reveal delay-1">
      Each piece is disassembled, cleaned, optionally painted, and reassembled with a hidden electrical system.
      The goal: preserve the <em>raw industrial aesthetics</em> while delivering a functional art piece with a calm, cozy light.
    </p>
  </div>
</section>

<section id="contact" class="contact">
  <div class="contact-inner reveal">
    <h3>Questions or custom request?</h3>
    <p>Reach out for finish options, sizing, and availability.</p>
    <a class="btn-primary" href="mailto:hello@turbotechlamps.example">Email Us</a>
  </div>
</section>
@endsection
