<x-app-layout>

    <div class="admin-hero">
        <div class="admin-hero-inner">
            <div class="admin-hero-text">
                <div class="admin-tag">Admin Panel</div>
                <h1>Reservation <em>Management</em></h1>
                <p>Approve or decline guest room bookings</p>
            </div>
            <div class="admin-hero-meta">
                <div class="admin-stat">
                    <div class="admin-stat-num">{{ $reservations->where('status','pending')->count() }}</div>
                    <div class="admin-stat-label">Pending</div>
                </div>
                <div class="admin-stat">
                    <div class="admin-stat-num">{{ $reservations->where('status','approved')->count() }}</div>
                    <div class="admin-stat-label">Approved</div>
                </div>
                <div class="admin-stat">
                    <div class="admin-stat-num">{{ $reservations->count() }}</div>
                    <div class="admin-stat-label">Total</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="admin-section">
    
        {{-- Alerts --}}
        @if(session('success'))
        <div class="res-alert res-alert-success">
            ✓ {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="res-alert res-alert-error">
            ✕ {{ session('error') }}
        </div>
        @endif
    
        {{-- Table Card --}}
        <div class="res-table-card">
    
            @forelse($reservations as $res)
            @php
                $nights = \Carbon\Carbon::parse($res->check_in)
                            ->diffInDays(\Carbon\Carbon::parse($res->check_out));
            @endphp
    
            <div class="res-row">
    
                {{-- Guest Info --}}
                <div class="res-guest">
                    <div class="res-avatar">
                        {{ strtoupper(substr($res->user->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="res-guest-name">{{ $res->user->name }}</div>
                        <div class="res-guest-email">{{ $res->user->email }}</div>
                    </div>
                </div>
    
                {{-- Room --}}
                <div class="res-col">
                    <div class="res-col-label">Room</div>
                    <div class="res-col-value">Room {{ $res->room->room_number }}</div>
                </div>
    
                {{-- Dates --}}
                <div class="res-col">
                    <div class="res-col-label">Check-in</div>
                    <div class="res-col-value">
                        {{ \Carbon\Carbon::parse($res->check_in)->format('d M Y') }}
                    </div>
                </div>
    
                <div class="res-col">
                    <div class="res-col-label">Check-out</div>
                    <div class="res-col-value">
                        {{ \Carbon\Carbon::parse($res->check_out)->format('d M Y') }}
                    </div>
                </div>
    
                {{-- Nights + Price --}}
                <div class="res-col">
                    <div class="res-col-label">Duration</div>
                    <div class="res-col-value">
                        {{ $nights }} night{{ $nights > 1 ? 's' : '' }}
                    </div>
                </div>
    
                <div class="res-col">
                    <div class="res-col-label">Total</div>
                    <div class="res-col-value res-price">
                        ₹{{ number_format($res->total_price) }}
                    </div>
                </div>
    
                {{-- Status --}}
                <div class="res-col">
                    <div class="res-col-label">Status</div>
                    @if($res->status == 'approved')
                        <span class="res-badge res-badge-approved">✓ Approved</span>
                    @elseif($res->status == 'declined')
                        <span class="res-badge res-badge-declined">✕ Declined</span>
                    @elseif($res->status == 'cancelled')
                        <span class="res-badge res-badge-cancelled">● Cancelled</span>
                    @else
                        <span class="res-badge res-badge-pending">⏳ Pending</span>
                    @endif
                </div>
    
                {{-- Actions --}}
                <div class="res-actions">
                    @if($res->status != 'approved')
                    <form method="POST"
                          action="{{ url('/admin/reservations/'.$res->id.'/approve') }}"
                          style="display:inline">
                        @csrf
                        <button type="submit" class="res-btn res-btn-approve">
                            ✓ Approve
                        </button>
                    </form>
                    @endif
    
                    @if($res->status != 'declined')
                    <form method="POST"
                          action="{{ url('/admin/reservations/'.$res->id.'/decline') }}"
                          style="display:inline">
                        @csrf
                        <button type="submit" class="res-btn res-btn-decline">
                            ✕ Decline
                        </button>
                    </form>
                    @endif
                </div>
    
            </div>
    
            @empty
    
            <div class="res-empty">
                <div class="res-empty-icon">📋</div>
                <h3>No Reservations Yet</h3>
                <p>Booking requests will appear here</p>
            </div>
    
            @endforelse
    
        </div>
    
    </div>
    
    </x-app-layout>