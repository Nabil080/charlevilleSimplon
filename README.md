# Simplon Charleville

Group project: a dynamic website for the **Simplon Charleville** school, built with the goal of attracting new applicants and providing relevant content for **three audiences** — visitors, learners, and companies.

> ⚠️ **Note:** This project was not completed due to time constraints and is **not the official website** of Simplon Charleville.

---

## 🧠 Project Overview

We focused on a clear **role-based system** to personalize content and navigation for different user types. The application follows an **MVC architecture**, with dynamic data rendering and multiple user flows.

---

## Usage

This project now uses Docker for easier setup:

```bash
docker compose up --build
```

Then visit: [http://localhost:8000](http://localhost:8000)

---

## 👥 User Roles & Features

### 🌐 Visitors (Public)

- Homepage with:
    - Training overview
    - Alumni testimonials
    - School history timeline

- Training detail pages
- Application form for programs
- List of all promotions
- Promotion pages showing trainers, learners, and projects
- Public learner profiles
- Projects catalog
- Contact form

### 👨‍🎓 Learners

- Redirected to their promotion page upon login
- Can edit their personal profile
- Can edit projects they are part of
- Can submit personal projects

### 🏢 Companies

- Redirected to the project dashboard after login
- Can view all submitted projects and their status (pending, validated, assigned, closed)
- Can submit new project proposals

### 👨‍🏫 Trainers

- Dashboard for managing promotion projects
- Can assign learners to projects
- Can create and edit all projects

### 🔧 Administrators

- Can validate or reject company-submitted projects
- Full CRUD system (users, trainings, promotions, projects, etc.)
- Can send group emails to specific user categories (learners, candidates, trainers, companies, promotions...)

---

## 🛠️ Backend Features

- Full database design and modeling (jMerise)
- Dynamic rendering of content (trainings, projects, users, promotions)
- User registration, application submission, authentication
- Project lifecycle logic: submission → validation → assignment → closure
- AJAX-powered project catalog with pagination, search and filters
- Admin-controlled status system for trainings based on promotion dates
- Internal contact system by category (e.g. send mail to all learners of a promotion)

---

## 🎨 Frontend Features

- Built with **Tailwind CSS**
- Responsive design
- Public and private views depending on user role
- Rich text editing using **CKEditor**
- Forms for registration, contact, and project submission
- Personalized profile pages

---

## 🔧 Tools & Technologies

- **HTML**, **CSS**, **Tailwind CSS**
- **JavaScript**, **CKEditor**
- **PHP (OOP)** — MVC structure
- **MySQL**
- **jMerise** — database modeling
- **Whimsical**, **Mockitt** — design and prototyping
- **Trello** — project planning
- **GitHub** — version control

---

## 🚧 Project Status

> ❌ **Incomplete** – This version was submitted before the final deadline and does not represent the official or complete school website.

---

## 📷 Screenshots
