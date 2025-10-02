# 🔗 Minimal Self-Hosted URL Shortener + Analytics

A lightweight, self-hosted **URL shortener with basic analytics**.  
Perfect for developers, startups, and marketers who want a **Bitly alternative** without third-party dependency.  
Runs on **PHP + MySQL** (or MariaDB) and can be deployed on any cheap VPS/shared hosting.

---

## ✨ Features
- ✅ Shorten any URL into a clean short link  
- ✅ Redirect with tracking  
- ✅ Count total clicks per link  
- ✅ Analytics: IP, referrer, user agent, timestamp  
- ✅ Simple admin dashboard to view all links  
- ✅ Copy-to-clipboard button (JS)  
- ✅ Mobile-friendly (basic CSS included)  

---

## 🚀 Roadmap
- [x] MVP: Shorten & redirect links  
- [x] Click counter  
- [x] Basic analytics (IP, referrer, UA)  
- [x] Admin dashboard 

---

- git clone https://github.com/ChiperSage/Self-Hosted-Minimal-URL-Shortener-Analytics.git
- cd Self-Hosted-Minimal-URL-Shortener-Analytics

- mysql -u root -p shortener < sql/schema.sql

