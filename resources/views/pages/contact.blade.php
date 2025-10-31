@extends('layouts.app')

@section('content')
<div class="row g-4">
  <div class="col-12 col-lg-7">
    <div class="card shadow-sm">
      <div class="card-body">
        <h1 class="h4 mb-3">Contact Us</h1>
        <p class="text-muted">We typically respond within 24 hours.</p>
        <div class="d-flex flex-column gap-2">
          <div><strong>Name:</strong> Avinash</div>
          <div><strong>Email:</strong> <a href="mailto:bscs2312359@szabist.pk">bscs2312359@szabist.pk</a></div>
          <div><strong>Phone:</strong> <a href="tel:+9231300099884">031300099884</a></div>
          <div><strong>Address:</strong> SZABIST Karachi, Pakistan</div>
          <div><strong>Hours:</strong> Mon–Sat, 9:00am–6:00pm</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-lg-5">
    <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm">
      <iframe src="https://www.google.com/maps?q=SZABIST%20Karachi&output=embed" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</div>
@endsection


