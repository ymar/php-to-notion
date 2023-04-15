## PHP To Notion

This is a simple web page that fetches data from a Notion database and displays it in a Bootstrap card layout. It uses the Notion API to query a specific database and retrieve data in JSON format, and then dynamically generates cards with the fetched data using PHP and Bootstrap.

## How to Use

Replace the apiKey and databaseId variables with your own Notion API key and the ID of the database you want to fetch data from.
Upload the HTML file to a web server or hosting environment that supports PHP.
Access the web page in your web browser to see the fetched data displayed in Bootstrap cards.
Optionally, you can also include jQuery for additional functionality or add your own custom code.

## Dependencies

- Bootstrap 5.0.2 CSS and JS files from CDN (included)
- jQuery 3.6.0 from CDN (included)

## Notes

Make sure to replace the apiKey and databaseId variables with your own values to authenticate and fetch data from your Notion database.
The fetched data is displayed in Bootstrap cards with the "Title", "Artist", and "Media" values from the database. You can customize the card layout and display as needed.
The jQuery script included at the bottom of the page adds a console log message to indicate that the API results were fetched successfully. You can modify or remove this script as needed for your own use case.
Enjoy using the Notion Database Fetcher to retrieve data from your Notion database and display it in a visually appealing card layout!