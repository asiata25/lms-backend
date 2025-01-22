<p align="center">
  <img src="https://cdn-1.jagobahasa.com/2024/07/Jago-Bahasa-logo-v2-300x77.png.webp" alt="JagoBahasa Logo" />
</p>

## 📋 About the Project

This repository contains the hard skill assignment for JagoBahasa, showcasing advanced programming concepts, clean architecture, and practical implementation techniques. The app is designed to help users learn programming fundamentals through a structured and interactive workflow.

---

## 🚀 Features

- **Interactive Learning**: Engage with practical programming tasks.
- **Modular Architecture**: Clean and maintainable codebase.
- **Custom Workflow**: Easy-to-follow step-by-step guidance.

---

## 📥 Installation

Follow these steps to set up the project on your local machine:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/asiata25/lms-backend.git
   ```

2. **Navigate to the project directory**:
   ```bash
   cd lms-backend
   ```

3. **Install dependencies**:

   ```bash
   composer install
   ```

4. **Set up the environment variables**:
   - Create a `.env` file in the project root.
   - Copy the contents of `.env.example` into `.env`.
   - Update the database and other configurations as needed.

5. **Prepare the PostgreSQL Database**:
   - Ensure PostgreSQL is installed and running on your system.
   - Create a new database:
     ```bash
     psql -U your_username -c "CREATE DATABASE jagobahasa_db;"
     ```
   - Update the `.env` file with your PostgreSQL credentials:
     ```env
     DB_CONNECTION=pgsql
     DB_HOST=127.0.0.1
     DB_PORT=5432
     DB_DATABASE=jagobahasa_db
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

6. **Run database migrations** (if applicable):
   ```bash
   php artisan migrate
   ```

7. **Start the development server**:
     ```bash
     php artisan serve
     ```

8. **Import Postman API Documentation**:
   - Open Postman.
   - Import the [postman_collection](docs/masterbagasi.postman_collection.json).
   - Use the predefined requests to test the API endpoints.
---

## 📖 How to Use the App

1. **Access the App**:
   Open your browser and navigate to the provided local server address (e.g., `http://localhost:8000`).

2. **Login or Register**:
   Create an account or log in with your credentials.

3. **Explore Features**:
   - Navigate through the app to complete assignments.
   - Use the guided workflows for learning tasks.

4. **Submit Assignments**:
   Save or upload your work directly within the app.

---

## 🔄 App Workflow

Here is the step-by-step workflow of the app:

1. **User Registration and Authentication**:
   - Users can register and log in securely.

2. **Assignment Dashboard**:
   - A personalized dashboard displays all available tasks.

3. **Task Completion**:
   - Follow instructions, code in the built-in editor, and test your work.

4. **Review and Feedback**:
   - Submit your tasks and receive feedback from mentors.

5. **Progress Tracking**:
   - View your learning progress over time.

---

<p align="center">✨ Happy Learning with JagoBahasa! ✨</p>
