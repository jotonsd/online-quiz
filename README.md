
## About Online MCQ Quiz System in PHP Laravel

This Online MCQ Quiz System is a web application based on Laravel (PHP) that can help to understand how to create an online quiz system using laravel or PHP. Currently, The initial version has the following features:

- Create MCQ Quiz and Add Expiry Date
- Give Duration of the Quiz
- Add Question and Define Correct Answers
- View Quiz and Results
- Signup as Student
- Participate Any MCQ Quiz and Get Instant Result
- Timer
- If Quiz Time is over, No submission will be taken
- Custom Authentication System (Not using laravel default Auth)

I created this project to help someone in his university project for Web Programming Course a few months ago. I hope it will help other students as well. That's why I have uploaded it.

## Installation
Installing this project is very easy. To do it, you can follow these steps.

- Clone the Github project
- Then go to the project folder and run commands 
- `composer-install`
- `cp .env.example .env`
- Then setup your database connection in `.env` file
- Then run this command `php artisan migrate` and then run `php artisan db:seed`
- Now, You can run your project from local host. However, You also can use this command `php artisan serve` to run the server.
- Hit the url `http://localhost:8000/`
- The default username is `admin` and password is `123456`. Use this credential to login and create quiz.
- Student Accounts are not created automatically. So, You can signup for one to test.


