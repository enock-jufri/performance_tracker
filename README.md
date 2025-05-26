# 🏆 LAMP-Based Scoring System

## 📋 Overview

This project is a web-based scoring system built using the **LAMP stack** (Linux, Apache, MySQL, PHP). It allows:
- Admins to manage judges
- Judges to assign scores to participants
- The public to view a real-time scoreboard

---

## 📁 Features

### 🔐 Admin Panel
- Admin can add new judges with a username and display name.
- [Login (for demo)](http://13.48.59.117/login.php)
  - Username: `admin1`
  - Password: `password123`

### 🧑‍⚖️ Judge Portal
- Judges can view a list of participants.
- Judges can select a participant and assign scores.
- [Login (for demo)](http://13.48.59.117/login.php)
  - Username: `judge1`
  - Password: `password123`

### 📊 Public Scoreboard
- Displays all participants and their total accumulated points.
- Automatically refreshes every 30 seconds.
- Highlights participants based on rank (1st, 2nd, 3rd, etc.).
- Sorted in descending order of total points.
- [View Scoreboard](http://13.48.59.117/public/index.php)

---

## 🧱 Tech Stack

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP (vanilla)
- **Database**: MySQL
- **Server**: Apache (LAMP on EC2 / XAMPP / LAMP VPS)

---

## ⚙️ Setup Instructions

### 📦 Requirements
- PHP >= 7.4
- MySQL or MariaDB
- Apache2 (mod_php enabled)
- Git (optional)

### 🧪 Local Setup (XAMPP or LAMP)

1. Clone the repository:
```bash
git clone https://github.com/enock-jufri/performance_tracker.git