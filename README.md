# oneuploader
virtual database rolodex for retro games

The OneUpLoader is an entry-level project that was an opportunity to utilize basic PHP and SQL to create a tool for use in my free time to keep track of retro video games. 

In this project, I used HTML and CSS to allow a user to write their game title and select the appropriate console.

I then used a Mac-based LAMP stack called MAMP to create a database with MySQL on an Apache server to hold the data.

Using PHP, I wrote a script that connects to the database using a unique user profile that is set up with permissions to add values to the table without granting access to other commands. 

Once this was working, I wrote another short PHP script that calls the database and prints out the contents when a user selects "View Collection" in the navigation bar.
