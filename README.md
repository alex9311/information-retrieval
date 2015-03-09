### TUD-Information-Retrieval-Group-02
Alex, Gizem, Hao, Miriam, and Peter

####Setting up Development Environment
Hey so I got the server up and running, now its time for you guys to try it out! Here are the steps explaining how to do that.
#####Connect to Server
######Windows
These instructions have been tested by Peter so hopefully they are accurate
* first follow [this](http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/putty.html) tutorial on how to use putty to connect to the server. The info you need for the tutorial is below:
  * Public ID: i-415b168f
  * Public DNS name: ec2-54-93-120-201.eu-central-1.compute.amazonaws.com
  * Your user name is your first name in lower case letters (peter, gizem, miriam, or hao)
    * **make sure you use your appropriate user name and not root or ec2-user as the tutorial suggests**
  * you will also need a private key (a .pem file), which I will email you
    * please do add a passphrase to your new .ppk file (putty will ask you if you'd like to)
    * **Please delete the .pem file after you complete the "Converting Your Private Key Using PuTTYgen" section of the tutorial**
  * Now you should be logged in to the server through console

######Linux
I haven't gone through this tutorial myself and neither has Peter but it should be much easier to get setup than windows. Email me if you have any questions. Here is the [tutorial](http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/AccessingInstancesLinux.html)
* Public ID: i-415b168f
* Public DNS name: ec2-54-93-120-201.eu-central-1.compute.amazonaws.com
* Your user name is your first name in lower case letters (peter, gizem, miriam, or hao)
  * **make sure you use your appropriate user name and not root or ec2-user as the tutorial suggests**
* you will also need a private key (a .pem file), which I will email you
  * please do make sure you run the chmod 400 command described in the tutorial

#####Navigating the Server
* You each have your own directory in the web server's web root (/var/www/html/hao, /var/www/html/gizem/, etc)
  * this directory is where you have write priveledges 
  * you can navigate to pages in your browser. For example, http://54.93.120.201/peter/peter.html is /var/www/html/peter/peter.html in our server
* I'm not sure how much linux server experience you all have so heres some quick commands
  * cd - moves around directories 
    * "cd /var/www/html/alex" will go to my home directory
    * "cd ../" will go up one level
  * mkdir dir_name - makes a directory with the name given
* If you are super uncomfortable editing files in the console, you can edit them locally and push the changes to git. Then you just have to pull the latest version onto your folder on the server when you want to see them on the site

#####Setting Up Git
I thought it would be a good idea to set up git with our development. You need to do a few things to get this to work though.
* First, connect to the server and get to your directory (cd /var/www/html/your_username)
* run: ssh-keygen -t rsa -C "example@example.com"
  * put your the email you used for git as the argument
  * do not give it an alternate filename
* cat ~/.ssh/id_rsa.pub
* **copy the entire key that is printed to your clipboard**
* sign onto git in your browser
* go to settings (the gear in the top right)
* go to "SSH keys" on the menu on the left
* click "add ssh key"
* paste the long key you copied from your console earlier into the key section and put "IR server" or something as the name
* save the key
* you should now be able to run "git clone git@github.com:alex9311/TUD-Information-Retrieval-Group-02.git project" which will bring the current git repo of our project into your web folder
* In your git project directory (/var/www/html/username/project) run the following commands
  * git config user.email "exmaple@example.com"
  * git config user.name "Your Name"

#####Git Workflow
I think it is best to create a new branch with your work in it. The way to do this is
* pull the latest version of master with
  * git checkout master
  * git pull
* create a new branch and tell github about it
  * git checkout -b "branch_name_describing_what_you_will_do"
  * git push origin "branch_name_describing_what_you_will_do"
    * make sure your branch names match
* do your work
  * git add .
  * git commit -m "commit message describing what you did"
  * git push
* now you can go to the [git repo](https://github.com/alex9311/TUD-Information-Retrieval-Group-02) in your browser
* select your branch from the branch dropdown
* click "create pull request"
* this will create a pull request, which is a request to the team to pull your changes in
  * this will allow another team member to look your changes over and then accept them to the master branch
* once your branch is merged in, you can start over with the workflow for the next set of changes (with a new branch name)

