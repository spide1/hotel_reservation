<x-app-layout>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
    :root {
      --gold: #c9a84c; --gold-light: #e8d08a; --gold-soft: #fdf8ed;
      --ink: #1a1710; --ink-soft: #4a4535; --muted: #8a8270;
      --white: #fff; --bg: #faf9f6; --border: #e8e2d0;
    }
    
    .page-hero {
      background: var(--ink); padding: 3rem 1.5rem 4rem;
      text-align: center; position: relative; overflow: hidden;
    }
    .page-hero::after {
      content: ''; position: absolute; bottom: -2px; left: 0; right: 0;
      height: 40px; background: var(--bg);
      clip-path: ellipse(55% 100% at 50% 100%);
    }
    .page-hero .tag {
      display: inline-flex; align-items: center; gap: 0.5rem;
      font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase;
      color: var(--gold-light); font-weight: 500; margin-bottom: 0.8rem;
    }
    .page-hero .tag::before, .page-hero .tag::after {
      content: ''; width: 20px; height: 1px; background: var(--gold);
    }
    .page-hero h1 {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(2rem,5vw,3.2rem); font-weight: 700; color: white;
    }
    .page-hero h1 em { font-style: italic; color: var(--gold-light); }
    .page-hero p { color: rgba(255,255,255,0.5); font-size: 0.88rem; font-weight: 300; margin-top: 0.4rem; }
    
    .rooms-section { padding: 3rem 1.5rem 5rem; max-width: 1200px; margin: 0 auto; }
    .rooms-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2rem; }
    
    .room-card {
      background: var(--white); border: 1px solid var(--border);
      border-radius: 20px; overflow: hidden; transition: all 0.3s;
      animation: fadeUp 0.5s ease both;
    }
    @keyframes fadeUp { from{opacity:0;transform:translateY(18px)} to{opacity:1;transform:translateY(0)} }
    .room-card:nth-child(1){animation-delay:0.05s}
    .room-card:nth-child(2){animation-delay:0.1s}
    .room-card:nth-child(3){animation-delay:0.15s}
    .room-card:hover { transform: translateY(-5px); box-shadow: 0 20px 60px rgba(26,23,16,0.11); }
    
    .card-img { position: relative; height: 200px; overflow: hidden; background: #2c2518; }
    .card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s; }
    .room-card:hover .card-img img { transform: scale(1.06); }
    
    .status-badge {
      position: absolute; top: 12px; right: 12px;
      padding: 0.3rem 0.8rem; border-radius: 20px;
      font-size: 0.65rem; font-weight: 500; letter-spacing: 0.08em;
      text-transform: uppercase; backdrop-filter: blur(10px);
    }
    .status-available { background: rgba(22,163,74,0.85); color: white; }
    .status-booked    { background: rgba(220,38,38,0.85);  color: white; }
    
    .room-number-tag {
      position: absolute; bottom: 12px; left: 12px;
      background: rgba(26,23,16,0.75); backdrop-filter: blur(8px);
      color: var(--gold-light); font-size: 0.7rem; letter-spacing: 0.12em;
      text-transform: uppercase; padding: 0.3rem 0.75rem; border-radius: 20px;
    }
    
    .card-body { padding: 1.4rem 1.6rem; }
    .card-top { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 1rem; }
    .room-name { font-family: 'Cormorant Garamond', serif; font-size: 1.25rem; font-weight: 700; color: var(--ink); }
    .room-type { font-size: 0.75rem; color: var(--muted); font-weight: 300; margin-top: 2px; }
    .price-block { text-align: right; }
    .price-amount { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 700; color: var(--ink); }
    .price-per { font-size: 0.7rem; color: var(--muted); display: block; }
    
    .card-divider { height: 1px; background: var(--border); margin: 0.8rem 0; }
    
    .dates-summary {
      background: var(--gold-soft); border: 1px solid rgba(201,168,76,0.25);
      border-radius: 10px; padding: 0.7rem 1rem; margin-bottom: 1rem;
      display: flex; justify-content: space-between; align-items: center;
      font-size: 0.8rem;
    }
    .dates-summary .label { color: var(--muted); font-weight: 300; }
    .dates-summary .dates { color: var(--ink); font-weight: 500; font-size: 0.78rem; }
    
    .total-preview {
      background: var(--gold-soft); border: 1px solid rgba(201,168,76,0.25);
      border-radius: 10px; padding: 0.6rem 0.9rem;
      display: flex; justify-content: space-between; align-items: center;
      margin-bottom: 1rem; font-size: 0.8rem; color: var(--ink-soft);
    }
    .total-preview .total-amount {
      font-weight: 600; color: var(--ink);
      font-family: 'Cormorant Garamond', serif; font-size: 1rem;
    }
    
    .btn-book {
      width: 100%; padding: 0.75rem;
      background: var(--ink); color: white; border: none; border-radius: 11px;
      font-family: 'Jost', sans-serif; font-size: 0.82rem; font-weight: 500;
      letter-spacing: 0.1em; text-transform: uppercase;
      cursor: pointer; transition: all 0.2s;
      display: flex; align-items: center; justify-content: center; gap: 0.5rem;
    }
    .btn-book:hover { background: #2d2417; transform: translateY(-1px); box-shadow: 0 6px 20px rgba(26,23,16,0.2); }
    
    /* ── MODAL ── */
    .modal-overlay {
      position: fixed; inset: 0;
      background: rgba(26,23,16,0.65);
      backdrop-filter: blur(6px);
      display: flex; align-items: center; justify-content: center;
      z-index: 9999; padding: 1rem;
    }
    .modal-box {
      background: var(--white); border-radius: 24px;
      max-width: 400px; width: 100%; overflow: hidden;
      box-shadow: 0 40px 100px rgba(26,23,16,0.3);
      animation: fadeUp 0.25s ease both;
    }
    .modal-header {
      background: var(--ink); padding: 2rem 2rem 1.8rem; text-align: center;
    }
    .modal-warning-icon {
      width: 52px; height: 52px; margin: 0 auto 1rem;
      background: rgba(201,168,76,0.15);
      border: 1.5px solid rgba(201,168,76,0.3);
      border-radius: 14px;
      display: flex; align-items: center; justify-content: center;
    }
    .modal-warning-icon svg { width: 26px; height: 26px; color: var(--gold-light); }
    .modal-header h3 {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.5rem; font-weight: 700; color: white; margin-bottom: 0.25rem;
    }
    .modal-subtitle {
      font-size: 0.72rem; color: rgba(255,255,255,0.4);
      letter-spacing: 0.1em; text-transform: uppercase;
    }
    .modal-summary { padding: 1.2rem 1.8rem; border-bottom: 1px solid var(--border); }
    .summary-row { display: flex; align-items: center; gap: 0.9rem; padding: 0.55rem 0; }
    .summary-icon { font-size: 1rem; width: 22px; text-align: center; flex-shrink: 0; }
    .summary-info { display: flex; justify-content: space-between; align-items: center; flex: 1; }
    .summary-label { font-size: 0.75rem; color: var(--muted); font-weight: 300; }
    .summary-value { font-size: 0.85rem; color: var(--ink); font-weight: 500; }
    .summary-divider { height: 1px; background: var(--border); margin-left: 2rem; }
    .modal-actions {
      display: flex; gap: 0.75rem; padding: 1.2rem 1.8rem; background: var(--bg);
    }
    .btn-no {
      flex: 1; padding: 0.7rem; border-radius: 11px;
      border: 1.5px solid var(--border); background: transparent;
      font-family: 'Jost', sans-serif; font-size: 0.82rem;
      color: var(--muted); cursor: pointer; transition: all 0.2s;
    }
    .btn-no:hover { border-color: var(--ink); color: var(--ink); }
    .btn-yes {
      flex: 1; padding: 0.7rem; border-radius: 11px;
      background: var(--ink); border: none; color: white;
      font-family: 'Jost', sans-serif; font-size: 0.82rem;
      font-weight: 500; cursor: pointer; transition: all 0.2s;
      text-decoration: none; text-align: center;
      display: flex; align-items: center; justify-content: center;
    }
    .btn-yes:hover { background: var(--gold); color: var(--ink); transform: translateY(-1px); }
    </style>
    
    {{-- PAGE HERO --}}
    <div class="page-hero">
        <div class="tag">Available Now</div>
        <h1>Browse Our <em>Rooms</em></h1>
        <p>
            @if(!empty($checkin) && !empty($checkout))
                Showing rooms for {{ \Carbon\Carbon::parse($checkin)->format('d M') }}
                → {{ \Carbon\Carbon::parse($checkout)->format('d M Y') }}
            @else
                Select a room and complete your reservation
            @endif
        </p>
    </div>
    
    {{-- ROOMS --}}
    <div class="rooms-section">
        <div class="rooms-grid">
            @foreach($rooms as $room)
            @php
                $img = $room->image
                    ? asset('storage/' . $room->image)
                    : 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=600&q=80';
                $isAvailable = $room->status === 'available';
                $nights = 0;
                $total  = 0;
                if (!empty($checkin) && !empty($checkout)) {
                    $nights = \Carbon\Carbon::parse($checkin)->diffInDays(\Carbon\Carbon::parse($checkout));
                    $total  = $nights * optional($room->type)->price_per_night;
                }
            @endphp
    
            <div class="room-card">
                <div class="card-img">
                    <img src="{{ $img }}" alt="Room {{ $room->room_number }}">
                    <span class="status-badge {{ $isAvailable ? 'status-available' : 'status-booked' }}">
                        {{ $isAvailable ? '● Available' : '✕ Booked' }}
                    </span>
                    <span class="room-number-tag">Room {{ $room->room_number }}</span>
                </div>
    
                <div class="card-body">
                    <div class="card-top">
                        <div>
                            <div class="room-name">{{ optional($room->type)->name }}</div>
                            <div class="room-type">Room {{ $room->room_number }}</div>
                        </div>
                        <div class="price-block">
                            <div class="price-amount">₹{{ number_format(optional($room->type)->price_per_night) }}</div>
                            <span class="price-per">per night</span>
                        </div>
                    </div>
    
                    <div class="card-divider"></div>
    
                    @if(!empty($checkin) && !empty($checkout))
                    <div class="dates-summary">
                        <span class="label">📅 Your Stay</span>
                        <span class="dates">
                            {{ \Carbon\Carbon::parse($checkin)->format('d M') }}
                            → {{ \Carbon\Carbon::parse($checkout)->format('d M') }}
                            · {{ $nights }} night{{ $nights > 1 ? 's' : '' }}
                        </span>
                    </div>
                    <div class="total-preview">
                        <span>Estimated Total</span>
                        <span class="total-amount">₹{{ number_format($total) }}</span>
                    </div>
                    @endif
    
                    <form method="POST" action="/reservation" class="booking-form">
                        @csrf
                        <input type="hidden" name="room_id"   value="{{ $room->id }}">
                        <input type="hidden" name="check_in"  value="{{ $checkin ?? '' }}">
                        <input type="hidden" name="check_out" value="{{ $checkout ?? '' }}">
                        <button type="submit" class="btn-book">🏨 Book Now</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    {{-- ── Date Required Modal ── --}}
    <div id="date-modal" style="display:none" class="modal-overlay">
        <div class="modal-box" onclick="event.stopPropagation()">
    
            <div class="modal-header">
                <div class="modal-warning-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0
                               012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25
                               2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18
                               0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121
                               11.25v7.5"/>
                    </svg>
                </div>
                <h3>No Dates Selected</h3>
                <p class="modal-subtitle">Please select your stay dates first</p>
            </div>
    
            <div class="modal-summary">
                <div class="summary-row">
                    <span class="summary-icon">📅</span>
                    <div class="summary-info">
                        <span class="summary-label">Check-in</span>
                        <span class="summary-value" id="modal-checkin">Not selected</span>
                    </div>
                </div>
                <div class="summary-divider"></div>
                <div class="summary-row">
                    <span class="summary-icon">🔚</span>
                    <div class="summary-info">
                        <span class="summary-label">Check-out</span>
                        <span class="summary-value" id="modal-checkout">Not selected</span>
                    </div>
                </div>
            </div>
    
            <div class="modal-actions">
                <button class="btn-no" onclick="closeDateModal()">Close</button>
                <a href="/" class="btn-yes">Pick Dates</a>
            </div>
    
        </div>
    </div>
    
    {{-- ✅ @push INSIDE x-app-layout --}}
    @push('scripts')
    <script>
    function closeDateModal() {
        document.getElementById('date-modal').style.display = 'none';
    }
    
    // Close on overlay click
    document.getElementById('date-modal').addEventListener('click', function(e) {
        if (e.target === this) closeDateModal();
    });
    
    // Intercept all booking forms
    document.querySelectorAll('.booking-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            const checkin  = form.querySelector('input[name="check_in"]').value;
            const checkout = form.querySelector('input[name="check_out"]').value;
    
            if (!checkin || !checkout) {
                e.preventDefault();
                document.getElementById('modal-checkin').textContent  = checkin  || 'Not selected';
                document.getElementById('modal-checkout').textContent = checkout || 'Not selected';
                document.getElementById('date-modal').style.display   = 'flex';
            }
        });
    });
    </script>
    @endpush
    
    </x-app-layout>