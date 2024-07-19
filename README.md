
# Face-Recognition-attendance-system

This repository contains a face attendance system project that integrates face recognition for taking attendance. The project includes backend scripts written in PHP and Python, and uses a database for storing attendance data.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Features](#features)
- [License](#license)
- [Contributing](#contributing)

## Installation

To set up the project, follow these steps:

1. Clone the repository:
    ```sh
    git clone https://github.com/yourusername/face-attendence-website.git
    ```

2. Navigate to the project directory:
    ```sh
    cd face-attendence-website
    ```

3. Set up the virtual environment and install dependencies:
    ```sh
    python -m venv venv
    source venv/bin/activate # On Windows use `venv\Scripts\activate`
    pip install -r requirements.txt
    ```

4. Configure the database:
    - Create a database and import the SQL scripts from the `db` directory.
    - Update the database connection details in the PHP files (`authentication.php`, etc.).

5. Run the web server:
    ```sh
    php -S localhost:8000
    ```

6. Ensure that the face recognition script is running:
    ```sh
    python main.py
    ```

## Usage

- Access the web application at `http://localhost:8000`.
- Register students and upload their images for face recognition.
- Use the face recognition feature to mark attendance automatically.

## Project Structure

```plaintext
face-attendence-website
├── Attendance.csv               # CSV file to store attendance data
├── AttendanceProject.py         # Main Python script for attendance project
├── Images_Attendance            # Directory containing student images
├── README.md                    # Project documentation
├── attendance_taken.php         # PHP script for taking attendance
├── attendence.php               # PHP script for attendance management
├── authentication.php           # PHP script for authentication
├── db                           # Database SQL scripts and files
├── face-api.py                  # Python script for face recognition API
├── header.php                   # PHP script for header
├── home.php                     # PHP script for home page
├── icon                         # Directory containing icons
├── index.php                    # Main PHP script for index page
├── main.py                      # Python script for main functionality
├── studentlist.php              # PHP script for student list
├── style.css                    # CSS file for styling
├── temp.mp4                     # Temporary video file
├── upload-profile.php           # PHP script for profile upload
└── videos                       # Directory containing videos
```

## Features

- Face recognition for attendance marking
- Student registration and profile management
- Real-time attendance tracking
- Secure authentication system

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.

## Contributing

Contributions are welcome! Please fork this repository and submit pull requests.
