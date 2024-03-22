<p align="center"><a href="" ><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
    <h2>Personal Blog</h2>
</p>

## Intro
This is a simple personal blog project built using the Laravel framework. It consists of three main pages: Home, Contacts, and Categories. The project also includes user authentication for secure access.


## Features

- **Add, Update, and Delete Blogs**: Users can add new blogs, update their names and content, and delete them as needed.
- **Categorize Blogs**: Users can categorize Blogs for easy navigation and organization.
- **Commenting System**: Other users can leave comments on your blogs, fostering engagement and interaction.
- **Recent Blogs Sidebar**: Displays a list of recent blogs on the sidebar for quick access and visibility.
- **User Authentication**: Secure authentication system for users to log in, ensuring privacy and access control.



## Project Screenshots

### Home Page
![Home Page](screenshots/home_page.png)

## Setup

To run this project locally, follow these steps:
 1. Clone the Repository:
    git clone https://github.com/lotfy5o/Laravel_Blog

 2. Navigate to the Project Directory:
    cd your_blog_project

 3. Install Dependencies:
    composer install

 4. Setup Environment:
    - Copy .env.example to .env.
    - Configure your database connection details in the .env file.

 5. Generate Application Key:
    php artisan key:generate

 6. Run Migrations and Seed Database:
    php artisan migrate --seed

 7. Serve the Application:
    php artisan serve

## Contributing
While this project serves an educational purpose, Contributions are welcome! If you want to enhance the project, feel free to submit pull requests.

## Known Issues
- The arrows of the carousel in the home page isn't showing.
- I think I have a problem with my javascript code
    I used to submit through an anchor tag using javascript but at the end of the project it stopped working.
