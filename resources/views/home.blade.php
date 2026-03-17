<x-app-layout>

    <style>
    :root {
      --gold: #c9a84c;
      --gold-light: #e8d08a;
      --gold-soft: #fdf8ed;
      --ink: #1a1710;
      --ink-soft: #4a4535;
      --muted: #8a8270;
      --border: #e8e2d0;
      --bg: #faf9f6;
    }
    
    .hero {
      position: relative;
      min-height: 88vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      background: #0e0c08;
    }
    .hero-bg {
      position: absolute; inset: 0;
      background:
        radial-gradient(ellipse 80% 60% at 50% 30%, rgba(201,168,76,0.18) 0%, transparent 70%),
        url('https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=1600&q=80') center/cover no-repeat;
      opacity: 0.55;
    }
    .hero-content {
      position: relative; z-index: 2;
      text-align: center; padding: 2rem 1.5rem;
      animation: fadeUp 1s ease both;
    }
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(24px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .hero-eyebrow {
      display: inline-flex; align-items: center; gap: 0.6rem;
      font-size: 0.7rem; letter-spacing: 0.25em; text-transform: uppercase;
      color: var(--gold-light); font-weight: 500; margin-bottom: 1.5rem;
    }
    .hero-eyebrow::before, .hero-eyebrow::after {
      content: ''; display: block; width: 30px; height: 1px; background: var(--gold);
    }
    .hero h1 {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(2.8rem, 7vw, 5.5rem);
      font-weight: 600; color: white; line-height: 1.1;
      margin-bottom: 1rem;
    }
    .hero h1 em { font-style: italic; color: var(--gold-light); }
    .hero-sub {
      font-size: 1rem; font-weight: 300;
      color: rgba(255,255,255,0.6); letter-spacing: 0.05em; margin-bottom: 3rem;
    }
    
    /* Search Box */
    .search-box {
      background: rgba(255,255,255,0.06);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(201,168,76,0.25);
      border-radius: 16px;
      padding: 1.5rem 2rem;
      display: inline-flex; align-items: center;
      gap: 1rem; flex-wrap: wrap; justify-content: center;
      max-width: 620px; width: 100%;
      box-shadow: 0 8px 40px rgba(0,0,0,0.3);
    }
    .search-field { display: flex; flex-direction: column; gap: 0.3rem; flex: 1; min-width: 200px; }
    .search-field label {
      font-size: 0.65rem; letter-spacing: 0.15em; text-transform: uppercase;
      color: var(--gold-light); font-weight: 500;
    }
    .search-field input {
      background: transparent; border: none;
      border-bottom: 1px solid rgba(201,168,76,0.4);
      color: white; font-size: 0.9rem; padding: 0.4rem 0;
      outline: none; width: 100%; transition: border-color 0.2s;
    }
    .search-field input::placeholder { color: rgba(255,255,255,0.35); }
    .search-field input:focus { border-color: var(--gold); }
    .search-btn {
      background: var(--gold); color: var(--ink);
      border: none; border-radius: 10px;
      padding: 0.75rem 2rem;
      font-size: 0.82rem; font-weight: 500;
      letter-spacing: 0.08em; text-transform: uppercase;
      cursor: pointer; transition: all 0.2s; white-space: nowrap;
    }
    .search-btn:hover { background: var(--gold-light); transform: translateY(-1px); }
    
    /* Stats */
    .stats-strip {
      background: var(--ink);
      padding: 1.2rem 2rem;
      display: flex; align-items: center; justify-content: center;
      gap: 3rem; flex-wrap: wrap;
    }
    .stat { text-align: center; }
    .stat-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.6rem; font-weight: 700; color: var(--gold);
    }
    .stat-label { font-size: 0.65rem; letter-spacing: 0.12em; text-transform: uppercase; color: rgba(255,255,255,0.4); }
    
    /* Rooms Section */
    .rooms-section { padding: 5rem 1.5rem; background: var(--bg); }
    .section-inner { max-width: 1200px; margin: 0 auto; }
    .section-tag { font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--gold); font-weight: 500; margin-bottom: 0.4rem; }
    .section-title { font-family: 'Cormorant Garamond', serif; font-size: clamp(1.8rem,4vw,2.8rem); font-weight: 600; color: var(--ink); margin-bottom: 0.4rem; }
    .section-sub { color: var(--muted); font-size: 0.88rem; font-weight: 300; margin-bottom: 2.5rem; }
    
    .rooms-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.8rem; }
    .room-card {
      background: white; border: 1px solid var(--border);
      border-radius: 16px; overflow: hidden;
      transition: all 0.3s;
    }
    .room-card:hover { transform: translateY(-6px); box-shadow: 0 20px 60px rgba(26,23,16,0.12); }
    .room-img { position: relative; height: 210px; overflow: hidden; }
    .room-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s; }
    .room-card:hover .room-img img { transform: scale(1.05); }
    .room-badge {
      position: absolute; top: 14px; left: 14px;
      background: rgba(26,23,16,0.7); backdrop-filter: blur(8px);
      color: var(--gold-light); font-size: 0.65rem; letter-spacing: 0.1em; text-transform: uppercase;
      padding: 0.3rem 0.7rem; border-radius: 20px;
    }
    .room-body { padding: 1.4rem 1.5rem 1.6rem; }
    .room-name { font-family: 'Cormorant Garamond', serif; font-size: 1.25rem; font-weight: 600; color: var(--ink); margin-bottom: 0.4rem; }
    .room-desc { font-size: 0.82rem; color: var(--muted); line-height: 1.5; margin-bottom: 1rem; font-weight: 300; }
    .room-footer { display: flex; align-items: center; justify-content: space-between; border-top: 1px solid var(--border); padding-top: 1rem; }
    .room-price .amount { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 700; color: var(--ink); }
    .room-price .per { font-size: 0.72rem; color: var(--muted); }
    .btn-view {
      background: var(--ink); color: white;
      border-radius: 8px; padding: 0.5rem 1.1rem;
      font-size: 0.78rem; font-weight: 500;
      letter-spacing: 0.06em; text-transform: uppercase;
      text-decoration: none; transition: all 0.2s; display: inline-block;
    }
    .btn-view:hover { background: var(--gold); color: var(--ink); }
    
    /* Features */
    .features-section { padding: 4rem 1.5rem; background: white; border-top: 1px solid var(--border); }
    .features-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1.5rem; }
    .feature-card { padding: 2rem 1.5rem; border: 1px solid var(--border); border-radius: 14px; text-align: center; transition: box-shadow 0.2s; }
    .feature-card:hover { box-shadow: 0 8px 30px rgba(26,23,16,0.08); }
    .feature-icon { font-size: 2rem; margin-bottom: 0.8rem; }
    .feature-title { font-family: 'Cormorant Garamond', serif; font-size: 1.1rem; font-weight: 600; color: var(--ink); margin-bottom: 0.3rem; }
    .feature-desc { font-size: 0.8rem; color: var(--muted); line-height: 1.6; font-weight: 300; }
    </style>
    
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,400;1,600&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
    
    <!-- HERO -->
    <div class="hero">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <div class="hero-eyebrow">Luxury Hotel & Suites</div>
            <h1>Find Your <em>Perfect</em><br>Hotel Room</h1>
            <p class="hero-sub">Exceptional stays crafted for the discerning traveller</p>
    
            <form action="/search" method="GET">
                <div class="search-box">
                    <div class="search-field">
                        <label>Check-in → Check-out</label>
                        <input type="text" id="date_range" placeholder="Select your dates" required>
                        <input type="hidden" name="check_in" id="check_in">
                        <input type="hidden" name="check_out" id="check_out">
                    </div>
                    <button type="submit" class="search-btn">Search Rooms</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- STATS -->
    <div class="stats-strip">
        <div class="stat"><div class="stat-num">120+</div><div class="stat-label">Luxury Rooms</div></div>
        <div class="stat"><div class="stat-num">4.9★</div><div class="stat-label">Guest Rating</div></div>
        <div class="stat"><div class="stat-num">15k+</div><div class="stat-label">Happy Guests</div></div>
        <div class="stat"><div class="stat-num">24/7</div><div class="stat-label">Concierge</div></div>
    </div>
    
    <!-- FEATURED ROOMS -->
    <div class="rooms-section">
        <div class="section-inner">
            <div class="section-tag">Curated Selection</div>
            <h2 class="section-title">Featured Rooms</h2>
            <p class="section-sub">Hand-picked accommodations for an unforgettable stay</p>
    
            <div class="rooms-grid">
                @foreach($rooms as $room)
                @php
                    $img = $room->image
                        ? asset('storage/' . $room->image)
                        : 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=600&q=80';
                @endphp
                <div class="room-card">
                    <div class="room-img">
                        <img src="{{ $img }}" alt="{{ $room->name }}">
                        <span class="room-badge">✦ Featured</span>
                    </div>
                    <div class="room-body">
                        <div class="room-name">{{ $room->name }}</div>
                        <div class="room-desc">{{ $room->description ?? 'A beautifully appointed room for a refined stay.' }}</div>
                        <div class="room-footer">
                            <div class="room-price">
                                <span class="amount">₹{{ number_format($room->price_per_night) }}</span>
                                <span class="per"> / night</span>
                            </div>
                            <a href="{{ route('rooms.index', $room->id) }}" class="btn-view">View Room</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- WHY CHOOSE US -->
    <div class="features-section">
        <div class="section-inner">
            <div class="section-tag">Why Choose Us</div>
            <h2 class="section-title" style="margin-bottom:2rem">The Grand Experience</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🏨</div>
                    <div class="feature-title">Luxury Rooms</div>
                    <div class="feature-desc">Premium materials and thoughtful design in every room.</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <div class="feature-title">Secure Booking</div>
                    <div class="feature-desc">Bank-level encryption protects every reservation.</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🍽</div>
                    <div class="feature-title">Fine Dining</div>
                    <div class="feature-desc">Award-winning restaurant with curated menus.</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎯</div>
                    <div class="feature-title">Instant Confirm</div>
                    <div class="feature-desc">Bookings confirmed instantly — no waiting.</div>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        flatpickr("#date_range", {
            mode: "range",
            minDate: "today",
            dateFormat: "Y-m-d",
            onClose: function (selectedDates) {
                if (selectedDates.length === 2) {
                    document.getElementById("check_in").value = flatpickr.formatDate(selectedDates[0], "Y-m-d");
                    document.getElementById("check_out").value = flatpickr.formatDate(selectedDates[1], "Y-m-d");
                }
            }
        });
    
        document.querySelector("form[action='/search']").addEventListener("submit", function (e) {
            if (!document.getElementById("check_in").value || !document.getElementById("check_out").value) {
                e.preventDefault();
                alert("Please select check-in and check-out dates.");
            }
        });
    });
    </script>
    @endpush
    
    </x-app-layout>