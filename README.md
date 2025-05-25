# LAMP Judge Scoring Portal

## 💡 Features

- Admin adds judges
- Judges view users and submit scores
- Public scoreboard auto-updates and sorts users

## 🛠 Setup Instructions

1. Clone the repo into your XAMPP or LAMP `htdocs/` directory.
2. Import the `sql/schema.sql` file into MySQL.
3. Update `includes/db.php` with your DB credentials.
4. Open `http://localhost/lamp-judge-portal/public/index.php` to view the scoreboard.
5. Use `admin/add_judge.php` to add a judge.
6. Use `judges/view_users.php` to test judge scoring.

## 🗃 Database Schema

See `sql/schema.sql`.

## 🔒 Security Notes

- No login system (for demo purposes).
- In a real app, use sessions + authentication + CSRF protection.

## 🚀 Future Improvements

- Judge authentication
- Input validation + sanitization
- AJAX-based score submission
