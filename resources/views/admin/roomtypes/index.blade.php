<x-app-layout>

    <div class="admin-hero">
        <div class="admin-hero-inner">
            <div class="admin-hero-text">
                <div class="admin-tag">Admin Panel</div>
                <h1>Room <em>Types</em></h1>
                <p>Manage room categories and pricing</p>
            </div>
            <div class="admin-hero-meta">
                <div class="admin-stat">
                    <div class="admin-stat-num">{{ $types->count() }}</div>
                    <div class="admin-stat-label">Total Types</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="admin-section">
    
        {{-- Add Room Type Form --}}
        <div class="rt-form-card">
            <div class="rt-form-header">
                <div class="rt-form-icon">＋</div>
                <div>
                    <h3>Add New Room Type</h3>
                    <p>Create a new room category with pricing</p>
                </div>
            </div>
    
            <form method="POST" action="{{ url('/admin/room-types') }}"
                  enctype="multipart/form-data" class="rt-form">
                @csrf
    
                <div class="rt-form-fields">
                    <div class="rt-field">
                        <label>Room Type Name</label>
                        <input type="text" name="name"
                               placeholder="e.g. Deluxe Suite" required>
                    </div>
                    <div class="rt-field">
                        <label>Price Per Night (₹)</label>
                        <input type="number" name="price_per_night"
                               placeholder="e.g. 4500" required>
                    </div>
                    <div class="rt-field">
                        <label>Room Image</label>
                        <input type="file" name="image" accept="image/*">
                    </div>
                    <div class="rt-field rt-field-btn">
                        <button type="submit" class="rt-btn-add">
                            Add Room Type
                        </button>
                    </div>
                </div>
    
            </form>
        </div>
    
        {{-- Room Types List --}}
        <div class="rt-table-card">
    
            @forelse($types as $type)
            <div class="rt-row">
    
                {{-- Image --}}
                <div class="rt-img-wrap">
                    @if($type->image)
                        <img src="{{ asset('storage/' . $type->image) }}"
                             alt="{{ $type->name }}">
                    @else
                        <div class="rt-img-placeholder">🏨</div>
                    @endif
                </div>
    
                {{-- Edit Form --}}
                <form method="POST" action="{{ url('/admin/room-types/' . $type->id) }}"
                      enctype="multipart/form-data" class="rt-edit-form">
                    @csrf
                    @method('PUT')
    
                    <div class="rt-edit-fields">
                        <div class="rt-field">
                            <label>Type Name</label>
                            <input type="text" name="name"
                                   value="{{ $type->name }}" required>
                        </div>
                        <div class="rt-field">
                            <label>Price / Night (₹)</label>
                            <input type="number" name="price_per_night"
                                   value="{{ $type->price_per_night }}" required>
                        </div>
                        <div class="rt-field">
                            <label>Update Image</label>
                            <input type="file" name="image" accept="image/*">
                        </div>
                    </div>
    
                    <div class="rt-row-actions">
                        <button type="submit" class="rt-btn rt-btn-update">
                            ✓ Update
                        </button>
                    </div>
    
                </form>
    
                {{-- Delete Form --}}
                <form method="POST" action="{{ url('/admin/room-types/' . $type->id) }}"
                      class="rt-delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rt-btn rt-btn-delete"
                            onclick="return confirm('Delete {{ $type->name }}?')">
                        ✕ Delete
                    </button>
                </form>
    
            </div>
            @empty
    
            <div class="res-empty">
                <div class="res-empty-icon">🏷</div>
                <h3>No Room Types Yet</h3>
                <p>Add your first room type using the form above</p>
            </div>
    
            @endforelse
    
        </div>
    
    </div>
    
    </x-app-layout>