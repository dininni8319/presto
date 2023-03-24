Final Project Presto
• Presentation for the Presto final project in Aulab course
• We wanted a create a web application where users could post items that they wanted to sell, similar to Craig’s List. Users are looking for a platform that is easy to use, accessible across multiple countries, and allows for content analysis.

Clone the project 
Copy the .env.example and creta a new .env file: cp .env.example .env
Into the backend forder run: composer install && php artisan key:generate && npm i

To run the project run command into the backend folder: php artisan serve

if you want to modify the css and javascript files run this comand to build the assets: npm run watch or npm  run dev

Main Functionalities
• Face removal 
• Search Full Text 
• Announcement Approval System
• Multi Language
• Image Resizing
• Application of a watermark 
• Content Analysis 

Tools
• The tools used in this project HTML5, CSS3, Javascript, Dropzone.js, JQuery, BootStrap, Laravel8, MySql, Laravel Spatie, Laravel Scout, Google Cloud Vision.

Project Structure
- In the folder app/Http/Comtrollers you will find the logic about the project.
- In the folder database/migrations you will find all the migrations tables
- In the folder routes/web.php you will find all the routes
- In the folder resources you have the css forlder, js folder, lang (for the translations), the views where you will find all the components and the Web Application Layout.
- In the presto-app-photos you will find a video demo

Backlog
• The users can view all the published advertainment's, even if they are not logged in.
• As soon as they login, they will be redirected to the ad publication page.
• We are going to publish an announcement, the user can also multi drag and drop pictures.
• The announcement has to be first reviewed
• The user has the option to delete the photos he added by mistake
• All this is made possible thanks to a library called Dropzone.
• These published announcements must first be validated by a reviewer.
• The revisor will only have to log in and access his home where he will find the announcements
in question, his work is facilitated by Google Vision API.
• Google Cloud Vision is a powerful AI, which analyzes our photos to check if it contains non-safe-search content.
• All this happens thanks to an ajaxs call, or an asynchronous call to the google server,
which will return an answer with labels.
• This process in programming is defined as an asynchronous call to the Google server, where google will send us a response, this data will then be displayed through a progress bar.
•  The user has the possibility to become a reviewer, through a contact form
•  One of the features of this application is the possibility of obscuring people's faces, adding a watermark, resizing images, full text search and multi-language.
• We have also thought about the user experience from mobile, user can access comfortably even with his mobile device.

Possible questions about the web application. 
• User story 1
- Implementation of registration login functionality with Laravel Fortify
- Implementation of Categories and publishing announcement form.
- In the homepage the user can see the last 6 published announcements.

User story 2
- Dynamic detail page, where the user can see all the detail about a particular Announcement.
- Feature select category implemented in the announcement form
- Implementazion of a carousel(bootstrap carosel), for the images, in the detail page.

• User story 3 : Admin Feature
- Implemented a custom command artisan where we can make a user revisor 
- Implemented a middleware where only the revisor can access to this route. Middleware act as a bridge between a request and a response. It's a type of filtering mechanism. Laravel includes a middleware  that verifies whether the user of the application is  authenticated or not.
- Added a column for the is_revisor foreingkey, in Users table, with Boolean value.
- The logic is handled by the RevisorController .
- Added also an accepted flag to the Announcements table.
- Created the MiddlewareRevisor, that checks whether a user is revisor. 
- The web.php we can find the routes for the revisor.
The RevisorController handles the functions that set the announcements to accepted or to refused  

• User Story 4 :In this story we implemented the multi language functionality.
- Used the flag-icon library  command : must at the end have this flag
- Added icon flag to the navigation.
- Created a post route in web.php.
- Created a Middleware that checks if the request has the local, if not it will set to the default language.
- Registered this middleware in the Kernel.php
- Translated all the content of the html tags in the web application. The translation we can find them in the lang folder, which as other subfolders, with  ui.php file.

• User Story 5 : Dropzone Component
- Dropzone is a JS library that turns an html element into a dropzone. Users can drag and drop a file onto an area of the page, uploading multiple pictures to the server. This component makes an ajax call to the server when a new image is added.
- Created a new table "Announcement_Images" and added a one to many relationship, to the Announcements table 
- On the creation of the announcement used the unique secret that related the pictures to the not jet created announcement, the relation between the two will happen afterword.
- The uniquesecret is important because tell the server how to relate the announcement to the pictures, and identifies the particular announcement to the pictures.
- Imported in app.css and app.js.
- The function defines the csrftoken, uniqueSecret, URL params,
- The functions in the controller for the image upload collect the uniquesecret and moves the images from the temporary storage to the db.

• User Story 6 : Resize of the images.
- We want to make the images proportional. 
- So we used the queue that creates a job for the resizing of the images.
- Included a library called Laravel Spatie Media Library.
- Once the Announcement has been confirmed, the queue will send the images to the resizing.
- Resize Frontend
- Resize Dropzone
- Installed Laravel Spatie
- Created a migration for the queue
- Created the migration for the failed jobs
- Set the .env file DB to sync
- In the job we handled the crop and the saving of the new file in the db.
- The controller recalls the job, after the announcement has been saved, loops throw the images and dispatch to the resize and saves the images with a new file name.

• User Story 7 : We created a system to facilitate the work of the revisor.
- Used to GoogleVisionApi functionalities for the analyses of the content posted if is Safesearch and we asked to label the images.
- Added the migration to the Announcement _images, to store the information coming from GoogleVision.
- In this story we used two Google functionalities, Detect Labels and Detect explicit or content safesearch.
- The last functionality will return a response indicating the content of the image, Spoof, adult, racy, medical,  violence and the relative score.
- Register to the google cloud platform, that will gives us the google credentials.
- At the end we created a job that handles the request to Google Vision Api.
- From the response coming from google we will collect the annotations with value that goes from 1 to 5
- Created an array where we assign the labels and with google value we can get the string

• User Story 8 : Google Face Detection API
- Face Detection is a functionality of Google Vision
- This feature allows you to detect faces within an image 
- The asynchronous response that we get from the Google Vision will been four points that indicates the square where is located the face, it can also indicate a sad face or smile face etc.
- Applied a smile to the face like a label
- The job is an asynchronous task.  

• User Story 9: 
- Implementation of a Search form. 
- Libraries responseble for this feature are: Laravel Scout and driver TnTSearch
- Implementation of a queue(it's like a robot that perform a task), that perform a job
- Implementation Queue table in the DB
- Configuration implemented in file .env and config.php
- Why we used a package? Indexing a model can be a long and complex operation, if there is a lot of text in the model, so indexing a model can take a long time, we must perform these operations with the auto process compared to the main process of laravel server. Laravel has to filter the information, process it for a moment, and respond as quickly as possible.

• User Story 10:
- Applied a watermark to every picture
- Implementation of job that allows to perform this particural task


