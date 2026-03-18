<x-app-layout>

    <div class="admin-hero">
        <div class="admin-hero-inner">
            <div class="admin-hero-text">
                <div class="admin-tag">Admin Panel</div>
                <h1>Manage <em>Rooms</em></h1>
                <p>Add, update and manage hotel rooms</p>
            </div>
            <div class="admin-hero-meta">
                <div class="admin-stat">
                    <div class="admin-stat-num">{{ $rooms->count() }}</div>
                    <div class="admin-stat-label">Total Rooms</div>
                </div>
                <div class="admin-stat">
                    <div class="admin-stat-num">{{ $rooms->where('status','available')->count() }}</div>
                    <div class="admin-stat-label">Available</div>
                </div>
                <div class="admin-stat">
                    <div class="admin-stat-num">{{ $rooms->where('status','maintenance')->count() }}</div>
                    <div class="admin-stat-label">Maintenance</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="admin-section">
    
        {{-- Alert --}}
        @if(session('success'))
        <div class="res-alert res-alert-success">
            ✓ {{ session('success') }}
        </div>
        @endif
    
        {{-- Add Room Form --}}
        <div class="rt-form-card">
            <div class="rt-form-header">
                <div class="rt-form-icon">＋</div>
                <div>
                    <h3>Add New Room</h3>
                    <p>Create a new room and assign it a type</p>
                </div>
            </div>
    
            <form method="POST" action="/admin/rooms" class="rt-form">
                @csrf
                <div class="rm-add-fields">
                    <div class="rt-field">
                        <label>Room Number</label>
                        <input type="text" name="room_number"
                               placeholder="e.g. 101" required>
                    </div>
                    <div class="rt-field">
                        <label>Room Type</label>
                        <select name="room_type_id" class="rm-select">
                            @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="rt-field rt-field-btn">
                        <button type="submit" class="rt-btn-add">
                            Add Room
                        </button>
                    </div>
                </div>
            </form>
        </div>
    
        {{-- Rooms List --}}
        <div class="rt-table-card">
    
            @forelse($rooms as $room)
            <div class="rm-row">
    
                {{-- Room Badge --}}
                <div class="rm-room-badge">
                    <div class="rm-room-num">{{ $room->room_number }}</div>
                    <div class="rm-room-label">Room</div>
                </div>
    
                {{-- Edit Form --}}
                <form method="POST" action="/admin/rooms/{{ $room->id }}"
                      class="rm-edit-form">
                    @csrf
                    @method('PUT')
    
                    <div class="rm-edit-fields">
                        <div class="rt-field">
                            <label>Room Number</label>
                            <input type="text" name="room_number"
                                   value="{{ $room->room_number }}" required>
                        </div>
                        <div class="rt-field">
                            <label>Room Type</label>
                            <select name="room_type_id" class="rm-select">
                                @foreach($types as $type)
                                <option value="{{ $type->id }}"
                                    @if($room->room_type_id == $type->id) selected @endif>
                                    {{ $type->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="rt-field">
                            <label>Status</label>
                            <select name="status" class="rm-select">
                                <option value="available"
                                    @if($room->status=='available') selected @endif>
                                    Available
                                </option>
                                <option value="maintenance"
                                    @if($room->status=='maintenance') selected @endif>
                                    Maintenance
                                </option>
                            </select>
                        </div>
                    </div>
    
                    <div class="rm-actions">
                        <button type="submit" class="rt-btn rt-btn-update">
                            ✓ Update
                        </button>
                    </div>
    
                </form>
    
                {{-- Status pill --}}
                <div class="rm-status-wrap">
                    @if($room->status == 'available')
                        <span class="res-badge res-badge-approved">● Available</span>
                    @else
                        <span class="res-badge res-badge-pending">⚙ Maintenance</span>
                    @endif
                </div>
    
                {{-- Delete --}}
                <form method="POST" action="/admin/rooms/{{ $room->id }}"
                      class="rm-delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rt-btn rt-btn-delete"
                            onclick="return confirm('Delete Room {{ $room->room_number }}?')">
                        ✕ Delete
                    </button>
                </form>
    
            </div>
            @empty
    
            <div class="res-empty">
                <div class="res-empty-icon">🛏</div>
                <h3>No Rooms Yet</h3>
                <p>Add your first room using the form above</p>
            </div>
    
            @endforelse
    
        </div>
    
    </div>
    
    </x-app-layout>