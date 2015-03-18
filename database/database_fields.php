<?php
$user_fields = array("id INT(6) AUTO_INCREMENT NOT NULL", 
        "name VARCHAR(30)",
	"username VARCHAR(30)",
	"password VARCHAR(30)",
	"PRIMARY KEY (id)");

$seen_fields = array(
	"id INT(6) AUTO_INCREMENT NOT NULL",
       	"id_user INT(6) NOT NULL",
       	"id_idea INT(6) NOT NULL",
	"date VARCHAR(10)",
        "upvoted INT(2)",
        "PRIMARY KEY (id)",
        "FOREIGN KEY (id_user) REFERENCES User(id)",
        "FOREIGN KEY (id_idea) REFERENCES Idea(id)"
);
$submitted_fields = array(
	"id INT(6) AUTO_INCREMENT NOT NULL",
       	"id_user INT(6) NOT NULL",
       	"id_idea INT(6) NOT NULL",
	"date VARCHAR(10)",
        "PRIMARY KEY (id)",
        "FOREIGN KEY (id_user) REFERENCES User(id)",
        "FOREIGN KEY (id_idea) REFERENCES Idea(id)"
); 
$idea_fields = array(
	"id INT(6) AUTO_INCREMENT NOT NULL", 
        "title VARCHAR(100)",
        "text_description VARCHAR(100)",
        "image VARCHAR(200)",
        "upvotes INT(6)",
	"PRIMARY KEY (id)"
);
$screening_results_fields = array(
	"id INT(6) AUTO_INCREMENT NOT NULL", 
       	"id_idea INT(6) NOT NULL",
	"accepted INT(2)",
        "FOREIGN KEY (id_idea) REFERENCES Idea(id)",
	"PRIMARY KEY (id)"
);
