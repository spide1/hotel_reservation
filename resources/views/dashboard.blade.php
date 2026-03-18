<x-app-layout>

    <div class="admin-hero">
        <div class="admin-hero-inner">
            <div class="admin-hero-text">
                <div class="admin-tag">Admin Panel</div>
                <h1>Hotel <em>Dashboard</em></h1>
                <p>Manage your hotel operations from one place</p>
            </div>
            <div class="admin-hero-meta">
                <div class="admin-stat">
                    <div class="admin-stat-num">{{ \App\Models\Room::count() }}</div>
                    <div class="admin-stat-label">Total Rooms</div>
                </div>
                <div class="admin-stat">
                    <div class="admin-stat-num">{{ \App\Models\Reservation::where('status','pending')->count() }}</div>
                    <div class="admin-stat-label">Pending</div>
                </div>
                <div class="admin-stat">
                    <div class="admin-stat-num">{{ \App\Models\User::count() }}</div>
                    <div class="admin-stat-label">Guests</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="admin-section">
    
        {{-- Quick Stats Row --}}
        <div class="admin-stats-grid">
            <div class="admin-metric">
                <div class="metric-icon" style="background:#edfaf4;color:#16a34a;">🏨</div>
                <div class="metric-body">
                    <div class="metric-num">{{ \App\Models\Room::where('status','available')->count() }}</div>
                    <div class="metric-label">Available Rooms</div>
                </div>
            </div>
            <div class="admin-metric">
                <div class="metric-icon" style="background:#fefce8;color:#ca8a04;">⏳</div>
                <div class="metric-body">
                    <div class="metric-num">{{ \App\Models\Reservation::where('status','pending')->count() }}</div>
                    <div class="metric-label">Pending Approvals</div>
                </div>
            </div>
            <div class="admin-metric">
                <div class="metric-icon" style="background:#eef3ff;color:#3b5bdb;">✓</div>
                <div class="metric-body">
                    <div class="metric-num">{{ \App\Models\Reservation::where('status','approved')->count() }}</div>
                    <div class="metric-label">Approved Bookings</div>
                </div>
            </div>
            <div class="admin-metric">
                <div class="metric-icon" style="background:var(--gold-soft);color:var(--gold);">₹</div>
                <div class="metric-body">
                    <div class="metric-num">₹{{ number_format(\App\Models\Reservation::where('status','approved')->sum('total_price')) }}</div>
                    <div class="metric-label">Total Revenue</div>
                </div>
            </div>
        </div>
    
        {{-- Main Nav Cards --}}
        <div class="admin-cards-grid">
    
            <a href="/admin/rooms" class="admin-card">
                <div class="admin-card-icon" style="background:#eef3ff;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#3b5bdb" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75
                                 6.75h.75m-.75 3.75h.75m-.75 3.75h.75m3-7.5h.75m-.75
                                 3.75h.75m-.75 3.75h.75M6.75 21v-3.375c0-.621.504-1.125
                                 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21"/>
                    </svg>
                </div>
                <div class="admin-card-body">
                    <h3>Manage Rooms</h3>
                    <p>Add, edit, and manage hotel rooms</p>
                </div>
                <div class="admin-card-arrow">→</div>
            </a>
    
            <a href="/admin/room-types" class="admin-card">
                <div class="admin-card-icon" style="background:var(--gold-soft);">
                    <svg viewBox="0 0 24 24" fill="none" stroke="var(--gold)" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237
                                 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095
                                 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16
                                 3.66A2.25 2.25 0 009.568 3z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z"/>
                    </svg>
                </div>
                <div class="admin-card-body">
                    <h3>Room Types</h3>
                    <p>Manage room categories and pricing</p>
                </div>
                <div class="admin-card-arrow">→</div>
            </a>
    
            <a href="/admin/reservations" class="admin-card">
                <div class="admin-card-icon" style="background:#fef2f2;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0
                                 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18
                                 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021
                                 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25
                                 2.25 0 0121 11.25v7.5"/>
                    </svg>
                </div>
                <div class="admin-card-body">
                    <h3>Reservations</h3>
                    <p>Approve or decline room bookings</p>
                </div>
                <div class="admin-card-arrow">→</div>
                @php $pending = \App\Models\Reservation::where('status','pending')->count(); @endphp
                @if($pending > 0)
                <div class="admin-card-badge">{{ $pending }} pending</div>
                @endif
            </a>
    
        </div>
    
    </div>
    
    </x-app-layout>