# Pet-Adaption-Record-System
A simple website that aims to monitor and add list of pets who are in need of adaption.

1. What is my chosen framework?
My project uses the Laravel framework, which is a PHP-based web development framework that follows the Model–View–Controller (MVC) architectural pattern. Throughout this semester, I learned that Laravel provides many built-in tools that make development easier—such as page routing, database migrations for constructing tables, and Eloquent ORM which makes database interaction smooth and organized.
Because of these features, Laravel is a good fit for my Pet Adoption website, especially since it involves CRUD operations.

2. How the MVC Components Are Organized?
First, the Model:
-My main model is Pet.php, which represents the pets table in the database.
-It uses Eloquent ORM and defines fillable fields such as pet_name, species, age, status, and timestamps.
-It handles all database interactions like creating, updating, retrieving, and fetching pet records.

Second, the View:
-My views (or pages) are located inside the resources/views folder.
-I used Blade templates to display and format the data coming from the controller.
-The main pages I created are:
1.add_pet.blade.php
2,display_pets.blade.php
3.edit_pet.blade.php

Third, the Controller:
-My controller is called PetController.php, which manages all CRUD operations and other functionalities of the system.
-Here are the functions used to make the system work:
1.index() – Displays all pets and handles searching using keywords.
2.create() – Shows the form for adding a new pet.
3.store() – Saves the newly added pet to the database.
4.edit() – Displays the edit form for a specific pet.
5.update() – Applies updated information to the selected pet in the database.
6.destroy() – Deletes a selected pet from the database.

3. How a User Interacts With the App?
1.Pet List (Homepage):
The homepage shows a table of all pets stored in the database, along with their details and their status (Available or Adopted).
2.Searching:
Users can search for a pet using the search input field. They can type keywords such as the pet’s name, species, age, or status.
The index() function handles the search by filtering pets based on the keyword entered.
3.Adding a Pet:
When the user clicks the “Add Pet” button, they are redirected to a form. After filling it out and submitting, the store() function saves the new pet to the database, while the model ensures the inputs are valid.
4.Editing a Pet:
The user can click “Edit” on any pet in the list. This opens another form where the user can update its details. The update() function finds the selected pet by its ID and updates the values in the database.
5.Deleting a Pet:
The user may click the “Delete” button to remove a pet from the list. The destroy() function identifies the record by its ID and permanently deletes it from the database.
6.Viewing Status:
Each pet has a status column showing whether it is Available or Adopted, allowing users to easily see which pets are still up for adoption.
