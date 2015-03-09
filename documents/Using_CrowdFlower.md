<H1>Using CrowdFlower</H1>

####Step 1: Set up job. 
CrowdFlower has a template for Content Moderation we can use. You can add stuff if you want using CSS and Javascript but the basic set up is really easy.

Things to show: image/ idea text/ top 5 of ideas most similar (taken from accepted ideas)

Explanation: 	The image and/or text shows an idea for a mobile app. The idea is to be rejected when: it contains unwanted content/ it is equal to or very similar to an idea from the top 5 list

Examples of unwanted content are: spam/containing explicit language or imagery/in a language other than English

####Step 2: Add data to job
Add source data via a data feed. Supported formats: RSS, Atom, XML, JSON

Database items needed: id/image url/idea text/ (For the idea to be checked as well as the similar ideas)

Convert MySQL database to XML using PHP: http://www.mightywebdeveloper.com/coding/mysql-to-xml-php/

####Step 3: Launch Job.
Wait for the human computers to complete the task.

####Step 4: Convert and sent data provided by Crowdflower to MySQL database.
