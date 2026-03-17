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

/* SECTION */
.reservations-section { padding: 3rem 1.5rem 5rem; max-width: 1000px; margin: 0 auto; }

/* EMPTY STATE */
.empty-state {
  text-align: center; padding: 5rem 2rem;
  background: var(--white); border: 1px solid var(--border); border-radius: 20px;
}
.empty-state .icon { font-size: 3rem; margin-bottom: 1rem; opacity: 0.4; }
.empty-state h3 {
  font-family: 'Cormorant Garamond', serif; font-size: 1.5rem;
  color: var(--ink); margin-bottom: 0.5rem;
}
.empty-state p { color: var(--muted); font-size: 0.88rem; font-weight: 300; }

/* RESERVATION CARD */
.reservation-card {
  background: var(--white); border: 1px solid var(--border);
  border-radius: 18px; overflow: hidden;
  margin-bottom: 1.2rem; transition: all 0.3s;
  animation: fadeUp 0.4s ease both;
}
.reservation-card:nth-child(1){animation-delay:0.05s}
.reservation-card:nth-child(2){animation-delay:0.1s}
.reservation-card:nth-child(3){animation-delay:0.15s}
@keyframes fadeUp { from{opacity:0;transform:translateY(14px)} to{opacity:1;transform:translateY(0)} }
.reservation-card:hover { box-shadow: 0 12px 40px rgba(26,23,16,0.09); }

.card-main {
  display: grid; grid-template-columns: auto 1fr auto auto;
  align-items: center; gap: 1.5rem; padding: 1.4rem 1.8rem;
}

/* ROOM ICON */
.room-icon {
  width: 52px; height: 52px; border-radius: 14px;
  background: var(--gold-soft); border: 1px solid rgba(201,168,76,0.25);
  display: flex; align-items: center; justify-content: center;
  font-size: 1.4rem; flex-shrink: 0;
}

/* ROOM INFO */
.room-info .room-number {
  font-family: 'Cormorant Garamond', serif; font-size: 1.15rem;
  font-weight: 700; color: var(--ink);
}
.room-info .room-dates {
  font-size: 0.78rem; color: var(--muted); font-weight: 300; margin-top: 3px;
  display: flex; align-items: center; gap: 0.4rem;
}
.room-info .room-dates span { color: var(--ink-soft); font-weight: 400; }

/* PRICE */
.price-col { text-align: right; }
.price-col .amount {
  font-family: 'Cormorant Garamond', serif; font-size: 1.3rem;
  font-weight: 700; color: var(--ink);
}
.price-col .label { font-size: 0.7rem; color: var(--muted); display: block; }

/* STATUS BADGES */
.status-badge {
  display: inline-flex; align-items: center; gap: 0.35rem;
  padding: 0.35rem 0.9rem; border-radius: 20px;
  font-size: 0.7rem; font-weight: 500; letter-spacing: 0.06em; text-transform: uppercase;
}
.badge-approved  { background: #edfaf4; color: #16a34a; border: 1px solid #bbf7d0; }
.badge-declined  { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }
.badge-cancelled { background: #f3f4f6; color: #6b7280; border: 1px solid #e5e7eb; }
.badge-pending   { background: #fefce8; color: #ca8a04; border: 1px solid #fef08a; }

/* ACTION COL */
.action-col { flex-shrink: 0; }

.btn-cancel {
  background: transparent; border: 1.5px solid #fca5a5;
  color: #dc2626; border-radius: 9px;
  padding: 0.45rem 1rem; font-family: 'Jost', sans-serif;
  font-size: 0.78rem; font-weight: 500; cursor: pointer;
  transition: all 0.2s; white-space: nowrap;
}
.btn-cancel:hover { background: #fef2f2; border-color: #dc2626; }

/* CARD FOOTER (nights bar) */
.card-footer {
  padding: 0.7rem 1.8rem;
  background: var(--bg); border-top: 1px solid var(--border);
  display: flex; align-items: center; gap: 0.5rem;
  font-size: 0.75rem; color: var(--muted);
}
.nights-pill {
  background: var(--gold-soft); border: 1px solid rgba(201,168,76,0.25);
  color: var(--ink-soft); border-radius: 20px;
  padding: 0.15rem 0.6rem; font-size: 0.7rem; font-weight: 500;
}

/* ── MODAL ── */
.modal-overlay {
  position: fixed; inset: 0;
  background: rgba(26,23,16,0.65);
  backdrop-filter: blur(6px);
  display: flex; align-items: center; justify-content: center;
  z-index: 9999; padding: 1rem;
}
.modal-box {
  background: var(--white);
  border-radius: 24px;
  max-width: 400px; width: 100%;
  box-shadow: 0 40px 100px rgba(26,23,16,0.3);
  overflow: hidden;
  animation: fadeUp 0.25s ease both;
}
.modal-header {
  background: var(--ink);
  padding: 2rem 2rem 1.8rem;
  text-align: center;
}
.modal-warning-icon {
  width: 52px; height: 52px; margin: 0 auto 1rem;
  background: rgba(201,168,76,0.15);
  border: 1.5px solid rgba(201,168,76,0.3);
  border-radius: 14px;
  display: flex; align-items: center; justify-content: center;
}
.modal-warning-icon svg {
  width: 26px; height: 26px; color: var(--gold-light);
}
.modal-header h3 {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.5rem; font-weight: 700; color: white; margin-bottom: 0.25rem;
}
.modal-subtitle {
  font-size: 0.72rem; color: rgba(255,255,255,0.4);
  letter-spacing: 0.1em; text-transform: uppercase;
}
.modal-summary {
  padding: 1.2rem 1.8rem;
  border-bottom: 1px solid var(--border);
}
.summary-row {
  display: flex; align-items: center; gap: 0.9rem; padding: 0.55rem 0;
}
.summary-icon { font-size: 1rem; width: 22px; text-align: center; flex-shrink: 0; }
.summary-info { display: flex; justify-content: space-between; align-items: center; flex: 1; }
.summary-label { font-size: 0.75rem; color: var(--muted); font-weight: 300; }
.summary-value { font-size: 0.85rem; color: var(--ink); font-weight: 500; }
.summary-divider { height: 1px; background: var(--border); margin-left: 2rem; }
.modal-actions {
  display: flex; gap: 0.75rem;
  padding: 1.2rem 1.8rem;
  background: var(--bg);
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
  background: #dc2626; border: none; color: white;
  font-family: 'Jost', sans-serif; font-size: 0.82rem;
  font-weight: 500; cursor: pointer; transition: all 0.2s; width: 100%;
}
.btn-yes:hover { background: #b91c1c; transform: translateY(-1px); }

@media(max-width: 640px) {
  .card-main { grid-template-columns: auto 1fr; gap: 1rem; }
  .price-col, .action-col { grid-column: 2; }
}
</style>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="tag">Account</div>
    <h1>My <em>Reservations</em></h1>
    <p>Track and manage all your bookings in one place</p>
</div>

<!-- RESERVATIONS -->
<div class="reservations-section">

    @forelse($reservations as $reservation)
    @php
        $nights = \Carbon\Carbon::parse($reservation->check_in)
                    ->diffInDays(\Carbon\Carbon::parse($reservation->check_out));
    @endphp

    <div class="reservation-card" x-data="{ open: false }">

        <div class="card-main">

            {{-- Icon --}}
            <div class="room-icon">🏨</div>

            {{-- Room Info --}}
            <div class="room-info">
                <div class="room-number">
                    Room {{ $reservation->room->room_number }}
                </div>
                <div class="room-dates">
                    📅 <span>{{ \Carbon\Carbon::parse($reservation->check_in)->format('d M Y') }}</span>
                    →
                    <span>{{ \Carbon\Carbon::parse($reservation->check_out)->format('d M Y') }}</span>
                </div>
            </div>

            {{-- Status --}}
            <div>
                @if($reservation->status == 'approved')
                    <span class="status-badge badge-approved">✓ Approved</span>
                @elseif($reservation->status == 'declined')
                    <span class="status-badge badge-declined">✕ Declined</span>
                @elseif($reservation->status == 'cancelled')
                    <span class="status-badge badge-cancelled">● Cancelled</span>
                @else
                    <span class="status-badge badge-pending">⏳ Pending</span>
                @endif
            </div>

            {{-- Price --}}
            <div class="price-col">
                <div class="amount">₹{{ number_format($reservation->total_price) }}</div>
                <span class="label">total</span>
            </div>

            {{-- Cancel Action --}}
            <div class="action-col">
                @if(in_array($reservation->status, ['pending', 'approved']))
                    <button class="btn-cancel" @click="open = true">
                        Cancel
                    </button>
                @endif
            </div>

        </div>

        {{-- Footer bar --}}
        <div class="card-footer">
            <span class="nights-pill">{{ $nights }} night{{ $nights > 1 ? 's' : '' }}</span>
            <span>·</span>
            <span>₹{{ number_format($reservation->total_price / max($nights,1)) }} / night</span>
            <span>·</span>
            <span>Booked {{ $reservation->created_at->diffForHumans() }}</span>
        </div>

        {{-- Cancel Modal --}}
        <div x-show="open" x-transition class="modal-overlay" style="display:none">
            <div class="modal-box" @click.stop>
                <div class="modal-icon">⚠️</div>
                <h3>Cancel Reservation?</h3>
                <p>
                    You are about to cancel your booking for
                    <strong>Room {{ $reservation->room->room_number }}</strong>
                    from
                    <strong>{{ \Carbon\Carbon::parse($reservation->check_in)->format('d M') }}</strong>
                    to
                    <strong>{{ \Carbon\Carbon::parse($reservation->check_out)->format('d M Y') }}</strong>.
                    This action cannot be undone.
                </p>
                <div class="modal-actions">
                    <button class="btn-no" @click="open = false">Keep Booking</button>
                    <form method="POST" action="{{ route('reservation.cancel', $reservation->id) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn-yes">Yes, Cancel</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @empty

    {{-- Empty State --}}
    <div class="empty-state">
        <div class="icon">🛎</div>
        <h3>No Reservations Yet</h3>
        <p>You haven't made any bookings yet.<br>Browse our rooms and plan your perfect stay.</p>
        <a href="/rooms" style="display:inline-block;margin-top:1.5rem;padding:0.7rem 2rem;background:var(--ink);color:white;border-radius:10px;font-size:0.82rem;letter-spacing:0.08em;text-transform:uppercase;text-decoration:none;">Browse Rooms</a>
    </div>

    @endforelse

</div>

</x-app-layout>