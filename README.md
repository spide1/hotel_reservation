# 🏨 Hotel Reservation System

A full-stack hotel booking web application built with **Laravel 11**, **Livewire 3**, **Alpine.js**, and **Tailwind CSS**.

---

## ✨ Features

- 🔐 Role-based authentication (Admin / Guest)
- 🛏 Room & Room Type management
- 📅 Date-based room availability search
- 💳 Reservation booking with live price calculation
- ✅ Admin approval / decline workflow
- ❌ Guest cancellation with confirmation modal
- 📊 Admin dashboard with live stats
- 📱 Fully responsive design

---

## 🛠 Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel 11 |
| Frontend | Livewire 3 + Alpine.js |
| Styling | Tailwind CSS |
| Database | MySQL |
| Date Picker | Flatpickr |
| Server | XAMPP (local) |

---

## ⚙️ Installation

### 1. Clone the repository

```bash
git clone https://github.com/your-username/hotel-reservation.git
cd hotel-reservation
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install Node dependencies

```bash
npm install
```

### 4. Environment setup

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure database

Update `.env` with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hotel_reservation
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Run migrations and seeders

```bash
php artisan migrate --seed
```

### 7. Link storage

```bash
php artisan storage:link
```

### 8. Build assets

```bash
npm run dev
```

### 9. Start the server

```bash
php artisan serve
```

Visit: **http://localhost:8000**

---

## 👤 Default Credentials

### Admin
| Field | Value |
|---|---|
| Email | admin@gmail.com |
| Password | password |

### Guest
Register a new account at `/register`

---

## 📁 Project Structure

```
hotel_reservation/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── RoomController.php
│   │   │   │   ├── RoomTypeController.php
│   │   │   │   └── ReservationController.php
│   │   │   ├── AdminController.php
│   │   │   ├── HomeController.php
│   │   │   ├── RoomController.php
│   │   │   └── ReservationController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   ├── Livewire/
│   └── Models/
│       ├── User.php
│       ├── Room.php
│       ├── RoomType.php
│       └── Reservation.php
├── resources/
│   ├── views/
│   │   ├── admin/
│   │   │   ├── dashboard.blade.php
│   │   │   ├── rooms.blade.php
│   │   │   ├── room-types.blade.php
│   │   │   └── reservations.blade.php
│   │   ├── layouts/
│   │   │   ├── app.blade.php
│   │   │   └── guest.blade.php
│   │   ├── livewire/
│   │   │   ├── auth/
│   │   │   │   ├── login.blade.php
│   │   │   │   └── register.blade.php
│   │   │   └── layout/
│   │   │       └── navigation.blade.php
│   │   ├── home.blade.php
│   │   ├── rooms.blade.php
│   │   └── my-bookings.blade.php
│   └── css/
│       └── app.css
├── routes/
│   └── web.php
└── database/
    ├── migrations/
    └── seeders/
```

---

## 🔗 Routes Overview

### Public
| Method | URI | Description |
|---|---|---|
| GET | `/` | Home page with search |
| GET | `/rooms` | All rooms listing |
| GET | `/search` | Search available rooms |

### Guest (Auth Required)
| Method | URI | Description |
|---|---|---|
| GET | `/my-bookings` | View reservations |
| POST | `/reservation` | Create booking |
| PATCH | `/reservation/{id}/cancel` | Cancel booking |

### Admin
| Method | URI | Description |
|---|---|---|
| GET | `/admin/dashboard` | Admin dashboard |
| GET/POST | `/admin/rooms` | Manage rooms |
| GET/POST | `/admin/room-types` | Manage room types |
| GET | `/admin/reservations` | View all reservations |
| POST | `/admin/reservations/{id}/approve` | Approve booking |
| POST | `/admin/reservations/{id}/decline` | Decline booking |

---

## 📸 Screenshots

> Add screenshots of your app here

---

## 📝 License

This project is open-source and available under the [MIT License](LICENSE).

---

## 👨‍💻 Author

**Apurba** — Backend Developer  
Built with ❤️ using Laravel 11
