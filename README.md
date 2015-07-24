###Information Retrieval Group Project - Sparked
TU Delft, Masters Software Technology, Information Retrieval, 3rd Quarter 2015

####Application Summary
In this assignment, our group built the application "Sparked". The idea of Sparked is to crowdsource ideas for mobile applications. The application would generate the applications most desired by the crowd with the idea that the applications could then be created and sold.

This assignment was meant to showcase the use of the following three topics in practice:

#####Crowdsourcing
Crowdsourcing is the backbone of the Sparked application. We use the crowd to submit new mobile ideas. Users can submit ideas with a title, description, and image. Ideas are submitted through a PHP form and stored in a MySQL database.

Crowdsourcing is also used to find the best ideas in the submissions. Users can browse through ideas and upvote or downvote them as they go.

#####Human Computation
Human computation is the idea of using human beings to complete tasks rather than using software. In our application, we use human computation to check the images associated with the ideas submitted by the crowd. New ideas are not allowed into the "upvotable pool" until they have been checked. The ideas are sent to a Crowdflower job through a cURL request. Once the idea is checked, a response is sent back to the Sparked server to mark the idea as acceptable or unacceptable.


#####Retrieval of Relevant Information
TODO

####Contents of Repo
| Directory | Description |
|-----------|------------|
| [app](app)| This is where the Sparked app lives. It is a simplistic responsive PHP web app. |
| [database](database)| This is where the scripts used to manage the Sparked MySQL database live. Using these scripts, developers can wipe the database or repopulate it with a given CSV file. The database can also be easily exported to CSV format here. |
| [documents](documents) | This directory contains all of the documents created for the purpose of our course. This includes our "project idea document" and our final presentation slideshow. |
| [evaluation-similarity-check](evaluation-similarity-check) | When developing the application, we weren't sure what tool we wanted to use for our similarity checker. This directory contains the work we did and code used to evaluate Dandelion, Lucene, and RapidMiner. |
| [itunes-app-store-crawler](itunes-app-store-crawler) | This directory contains an iTunes web crawler we used and modified for our purposes. We used this application data to test our search functionality. |

