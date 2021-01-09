Based on Yii2 Advanced

Setup:

```
git clone https://spinanicky@bitbucket.org/spinanicky/yii2_challenge.git ./challenge

cd challenge

composer update

init

```

Update the database config in common/config/main-local.php


Apply migrations

```
yii migrate
```

use 
```

./yii serve --docroot="@backend/web"
```

Challenge
-------------------

```
INTRO:

Welcome to your challenge - we believe this is a very straight forward Yii2 application that should take you no longer than two hours. PLEASE ensure you do this in one sitting - we do not want you to be distracted or stopping and starting this challenge so make sure you have enough time to complete it all in one go.

This challenge should not take longer than two hours. If you get to the two hour mark, please stop and submit your code as instructed at the end of the next section. 


To give you an understanding of how we developed this challenge, here is what we are looking for in this challenge and why we structured it this way:
1) First and foremost we want to check your ability to follow instructions clearly. The instructions below give specific requirements (and leave out certain operations) on purpouse. Read carefully
2) We want to ensure that you understand the importance of migrations rather than modifying the database directly.
3) MVC helps us organize our workflow, and tieing it into the advanced template helps show us you understand how the different Yii2 parts come together
4) We want to see whether you understand how the controller works and whether you known about the "special" functions that can be used when calling them (and models)
5) Validating the models is critical to integrity as well as safety - we also spiced it up to test whether you know how to add exotic validation rules 
6) Creating, saving and displaying more than one instance of a model is important and well documented within Yii2. So we test this with the "goods" section. We also want to see how you handle two different models on a single page. 
7) Lastly we test your capbility with simple HTML and CSS. Hint: do not add any static styling - everything should be in a css file.

Feel free to use any plugins that you feel will help you complete the task - just make sure they are in composer. 

Good Luck! 

```


```
CHALLENGE: 

Before you start - make sure the website loads and everything is working.

0) Create a file named "author" in the root directory of the cloned application and put your name and email in the document. Save. 
-- Once you have saved the file, commit the new file to the repo with a message saying "I have added my credentials".

1) In the backend web folder you will find an extract of one of the forms we work with in our application
2) You should have noticed that the migrations created two tables in the database. Create a new migration that adds an integer field to the oadode table called 'lang'. Apply the migration.
3) Build the models for these tables - our website is multilingual so keep that in mind. In the header of the file let us know in a comment if you used any toold to build the model.
4) Now that you have the model build a controller to handle the following    actions
-- index: list all of the applications (oadode model) and allow the user to edit or view any of their own applications
-- index: add a button to create a new application
-- create: create a new record
-- edit: edit an existing record

Add another commit with the message "Models and Controller created"

5) In the create view
-- display a form that allows the user to input all the necessary information 
-- notice that item 8 (description of goods) is saved in a separate model so you will need to handle multi loading and validation 
-- fields 9 and 10 are not multiselect - the user can only select one of them
-- field 10 is a multiselect, but you will notice that the database saves all of them as a string. You will need to handle this appropriately. 
--- Think carefully what the best way to do this is if you are going to use the field in other parts of your program and for validation
6) Validation
-- All fields are required other than Fax number
-- field 8 (description of goods) requires at least 1 input in all three fields
-- The description of goods can only contain letters [a-Z] and the ECL fields can only contain numbers [1-9] and . or ,
-- field 10 at least one is required to be selected. You can not be an officer and a director or a director and an employee 
7) Printing (view)
-- you want the user to be able to print the form once they have completed it. We work with bootstrap 4. 
-- build a view that allows the user to print their complete form - it should look like the form in the picture and fit perfectly on an A4 size paper
-- print one application to PDF and save it in the web folder

Commit your code with the message "Complete". Change the git remoe source and upload the git repository to your own github account. Then share the link with us. Do not send us an email with a zip of the code.

Good Luck! 


```
DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
