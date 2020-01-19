# Gas Station Review Website for 4WW3

### Description
The website allows users to upload reviews for gas stations in the country of Poland. It is composed of a search page, a sample object page displaying a review for a single gas station, a sample search results page, a registration page for the user to make an account, and a sample review submission page for the user to upload a gas station review.

## Note  
Site currently only setup as front end using github pages, full functionality hosted on AWS taken down due to end of project  

### Group members:
- Jakub Pawlikowski 400011899
- Anthony Mella 400019353


### Links to all pages:  
[Search](http://polandgasreviews.me)  
[Individual sample](https://polandgasreviews.me/individual_sample.html)  
[Registration](http://polandgasreviews.me/registration.html)  
[Search results sample](http://polandgasreviews.me/results_sample.html)  
[Submit a review](http://polandgasreviews.me/submission.html)  
note:  currently site can only be accessed via http on github pages  


### Validation:
- **Registration**: The registration page validates that you enter a valid email address, a password containing 10-20 characters with at least one number and one uppercase letter. It also validates that when creating a new account, you enter a name, last name, username, a valid email address, and to create a password with the requirements listed above.
- **Submission**: The submission page validates that the user enters a gas station name, an address, an image of the gas station, a rating, and a review. There is also a button that utilizes the geolocation API to fill in the users coordinates.

### Site Navigation:
The main page is index.html, by clicking the search button it will bring you to the results_sample.html page witch displays sample results and displays the results on a map using the google maps API. If you zoom in and click the "Petro Poland" marker, it will bring you to the individual_sample.html page which is a sample single item page. On the header there are various other pages on the site all accessible from the header.

### Link to repository:  
[4WW3 Repo](https://github.com/JPawlikowski/4WW3_Project)
