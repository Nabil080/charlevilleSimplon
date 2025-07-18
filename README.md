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

## Screenshots

This section showcases the main pages and features of the platform, including user interfaces, admin tools, and dynamic AJAX-powered views.

---

### Homepage Overview

* Home screen with and without the login modal
  ![image6](https://github.com/user-attachments/assets/0be53ead-d243-428f-86f5-7ffaa66cb720)
  ![image9](https://github.com/user-attachments/assets/bca2f792-1a3e-4b33-b9a8-369e20d46dd8)

* Page displaying ongoing formations and upcoming sessions. Status updates automatically based on dates.
  ![image38](https://github.com/user-attachments/assets/12d85f08-6976-4db2-ba96-8f94d536b48f)
  ![image20](https://github.com/user-attachments/assets/14903b62-c4ea-4bca-8e3d-901fc0ff370a)

---

### Formation Page (Using Built-In Editor)

* Example of a formation detail page written with the integrated content editor.
  ![image69](https://github.com/user-attachments/assets/4d18d4e6-f9cd-42fb-a21f-c8dfcd9b883b)

---

### Company Project Submission Form

* Companies can submit project proposals via a dedicated form.
  ![image68](https://github.com/user-attachments/assets/5043e985-9bea-4b60-b302-d6f553a8d201)

---

### Admin Panel – Project Management

* Admins can accept, decline, or assign projects to formations.
  ![image59](https://github.com/user-attachments/assets/2a14b997-cef7-45e2-850d-6768f1886426)

---

### Trainer Panel – Assigning Projects

* Validated projects can be assigned to students of the trainer's formation.
  ![image57](https://github.com/user-attachments/assets/dfec8d3a-616a-4eeb-84eb-68285b8e4775)

---

### Project Details Page (AJAX Editing)

* Project details can be modified by trainers and assigned students via AJAX.
  ![image43](https://github.com/user-attachments/assets/2737249f-594f-49ba-90e7-dcbd893e75dd)

---

### Projects List with AJAX Filters

Filters and pagination are fully AJAX-driven.

* Filtering projects by level
  ![image42](https://github.com/user-attachments/assets/88e0a6c9-2979-4ab4-b43f-189ab291a018)

* Filtering projects by name
  ![image35](https://github.com/user-attachments/assets/0749abcf-dcce-489f-9069-799f92011a7b)

---

### Class Directory (Current & Past Years)

* View and filter all classes by year.
  ![image36](https://github.com/user-attachments/assets/8437c171-8432-4fb6-98a2-1cb955bab553)

---

### Class Profile (Students, Trainers, Projects)

* Example of a class page listing students and trainers.
  ![image1](https://github.com/user-attachments/assets/292a30ea-ab5d-4d63-8ed1-8238196af76b)

* Class projects shown in a separate tab.
  ![image44](https://github.com/user-attachments/assets/92b70e4d-7581-46e9-82ac-3b033935209a)

---

### Student Profile (Self-Editable)

* Students can customize their profile: description, status, and personal projects.
  ![image5](https://github.com/user-attachments/assets/a457235e-5a18-4051-8391-a2455cf15781)

---

### Admin Panel Overview

* Full CRUD on every section with AJAX, search bars, and pagination.
  ![image41](https://github.com/user-attachments/assets/72abb7ff-83df-47bb-956e-12712eff1799)

* After selecting candidates, the admin can promote them to students, auto-create the class, and send email notifications. <img width="1920" height="902" alt="image3" src="https://github.com/user-attachments/assets/8244720b-75f4-4bbc-b118-4887125c1ff2" />

* Admin can message individuals or groups (class, formation, all trainers, etc.). Example with a class:
  ![image21](https://github.com/user-attachments/assets/e94199fb-a57a-4191-8867-979e9934da2f)

---

### Database Schema / Data Model

* Each database table is mapped to a Model in the MVC structure. <img width="1713" height="838" alt="image15" src="https://github.com/user-attachments/assets/dc2a3ab4-7f72-4bdc-a8ab-9bac228014c7" />
