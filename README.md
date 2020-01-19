# Gas Station Review Website for 4WW3

### Description
The website allows users to upload reviews for gas stations in the country of Poland. It is composed of a search page, a sample object page displaying a review for a single gas station, a sample search results page, a registration page for the user to make an account, and a sample review submission page for the user to upload a gas station review. To submit reviews for gas stations, the user is required to make an account that fufils the account creation requirements.

## Note  
currently only front end of site displayed for github pages, full functionality from AWS removed due to end of project  

### Group members:
- Jakub Pawlikowski 400011899
- Anthony Mella 400019353


### Link to the website:  
[Search](http://polandgasreviews.me)  
note: site only accessible via http due to github pages for now  


### Validation:
- **Registration**: The registration page validates that you enter a valid email address, a password containing 10-20 characters with at least one number and one uppercase letter. It also validates that when creating a new account, you enter a name, last name, username, a valid email address, and to create a password with the requirements listed above.
- **Submission**: The submission page validates that the user enters a gas station name, an address, an image of the gas station, a rating, and a review. There is also a button that utilizes the geolocation API to fill in the users coordinates.
- **Login Validation**: When a new review is to be submitted, there is a validation check to see if the user has made an account on the site. If the user did not make an account, there will be a window prompting to do so.

### Site Navigation:
The main page is index.html, by clicking the search button it will bring you to the results_sample.html page witch displays sample results and displays the results on a map using the google maps API. If you zoom in and click the "Petro Poland" marker, it will bring you to the individual_sample.html page which is a sample single item page. On the header there are various other pages on the site all accessible from the header.

### Database Design:
The database design schema contains three tables: gasStations, Reviews, and Users. There are two key relations in the database, the first being gasid which is the primary key for gasStations, which is also a foreign key to reviews. The second is uid, which is the primary key for Users and also a forign key to Reviews.
- gasStations fields: gasid, name, address, description, and rating. 
- Reviews fields: uid, gasid, rating, review, imagelink.
- Users feilds: uid, email, userName, password, firstName, lastName.

### Additional usage notes:  
The database is populated with 2 gas stations : "Polska Petro" and "Orlen Plus", searching for these will return results.  
There are 2 users in the database which can log in, they are chad@mac.ca and dave@mac.ca both with password "Password123"

### Link to repository:  
[4WW3 Repo](https://github.com/JPawlikowski/4WW3_Project)
