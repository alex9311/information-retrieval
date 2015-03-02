<H1>Project Idea document</h1>

<p>Peter van Buul</p>
<p>Hao Dinh</p>
<p>Miriam Doorn</p>
<p>Gizem Koçkesen</p>
<p>Alex Simes</p>

####Pitch/Introduction
Imagine this, you walk around and you have a great idea! Well, great! But you do not have the resources or expertise to grow this idea to its full potential. We have the solution for you: The Idea Tree. The idea tree is a web application which offers a ground for you to plant your seed and let others water and nurture it and grow it into a beautiful project. Just like an actual tree, you will be able to implement, kill, branch, grow and truncate your ideas. Think about it as a Github for ideas. 

Different because it only focuses on ideas. No direct help like standard Q&A. Important is to enable an idea to grow. Finding out how it grows. How to enable a crowd for an idea. 

####Relevance to Course
In order for any project to be relevant to the course, the three main components of the course should be applicable within the project: crowdsourcing, information retrieval, and human computation. For Sparked, all three elements can be found. First crowdsourcing will be discussed, then human computation, and last information retrieval.

#####Crowdsourcing
Crowdsourcing is using the crowd to execute tasks for a platform. Sparked uses crowdsourcing in three different ways. The first way that the crowd is used is during generation of ideas. All ideas that have been submitted to Spark have been created by the crowd. The second way that the crowd is utilized is during the voting phase. In order to find the best ideas, the crowd can vote for ideas. Thus, the crowd decides which idea is the best. Lastly, advertisement and sharing is done by the crowd. Individuals can share their idea with the crowd and the crowd can then spread the idea. By directly linking to Sparked, any idea that is shared is advertisement for Sparked.

#####Information Retrieval
Retrieving and comparing texts is part of information retrieval. Within Sparked, this is used to check the similarity between new ideas and existing ideas. The results of the similarity check are also verified by humans so the check does not have to be very fast, however it does need to be very precise. The more precise the IR checking system is, the less faulty checks the humans have to look over. Possible problems with this is that while ideas are being processed, new ideas are also submitted. This would mean new ideas should also be checked against ideas that are not yet accepted or rejected.

#####Human Computation
For human computation to be present in our project, we need to use humans to do a task that cannot be automated by a computer. Within sparked, this is done in two ways during the sanitation check. First, the images and text are checked to see if they do not contain malicious content. Second, human computation is used to check the results of the similarity check. While both these tasks can be done automatically to some degree, in order to guarantee the quality of content that has been accepted by the system these are checked using human computation as well.

During the setup phase of Sparked, human computation is used to generate an inital pool of idea's. These are used as an initial pool of ideas for voting.

####Innovative and Challenging Nature of Project
#####Innovativeness
These days there are a lot of platforms that help people make their idea a reality. You can use crowdfunding to raise funds on sites such as Kickstarter and Indiegogo. And you can hire freelancers to develop your idea on platforms like oDesk, Elance etc. However running a Kickstarter campaign and coordinating a project is still very labour intensive. Do you have the time, skills, drive to work on your idea? Is your idea even any good? Will it resonate with people? Sparked is the first ever platform where submitting your idea is all the effort needed to potentially make you idea a money-making reality. Anyone can join. By leveraging the power of the crowd we aim to facilitate the creation of apps that have a proven market.

#####Challenges
There are several challenges in realizing our project. One of them is participation. For our project to be successful we rely very much on the crowd participating in submitting ideas and voting for ideas. The incentive for a user to submit an idea will be the possibility to see the idea produced and sold, making money by receiving a percentage of the revenue the product generates. People get excited when they get an idea and want to share it, and get a response. Submitting an idea to our platform will give users the opportunity to see how their idea resonates with the crowd. Voting for ideas can be fun as well as the user comes across a wide variety of ideas; unique, silly, useful or the exact opposite. We want our platform to have a sense of fun, dreams and endless possibilities. 

There are several techniques we will implement to make participation in each step of the process as simple as possible. The users can login to our platform using a FaceBook login. FaceBook is used ubiquitously. Through FaceBook the user can easily share his idea with his friends, which will help in leading more people to our platform. We use responsive webdesign so that the platform is easily accessible from any device: pc, smartphone etc. For the voting process we use a Tinder-like design, with users swiping left to upvote and right to not upvote. This design is easy to use and recognizable to a lot of people. The user who submitted an idea can see how well his idea is doing in the rankings, which could motivate the user to invite more people to vote on his idea. Another way to engage our userbase could be to send weekly updates via email giving a personalized update on number of new ideas the user hasn't voted on yet and the ranking(s) of the idea(s) submitted by the user.

Another challenge for our project is implementation. The project is made up of different components that have to work together seamlessly. We need to implement Facebook connectivity, a CrowdFlower pipeline, Database access using mySQL and compatibility with Lucene, all while having our responsive website for the platform built using PHP and CSS as a homebase. Most of this will be invisible to the user, but integral to the functioning of the platform. We want to compare ideas for similarity using text analysis, to avoid multiple instances of the same idea. This can be difficult, because subtle differences in text can give widely different semantic meanings. There are techniques to compare semantic similarity as well as syntactic similarity. We will need to test which method works best for what we need.

####Requirements and Specifications
#####Use Case
* first phase
  * "crowd" can submit ideas for mobile apps, a picture and short text block
  * The picture goes through a sanitation check, this is the human computation aspect
  * text goes through IR system to find similar ideas (humans check IR results)
    * if an idea is listed as similar by IR, human gets notification that the idea may be rejected later
  * When idea gets out of screening state, user is notified either way
  * After the idea is out of the screening state, users can share the idea
  * Once the idea is past screening, it goes into the public pool
  *  "crowd" upvote or downvote ideas that are in the public pool in a "tinder-like" application style
  * This can be worked in a different type of application, use as "in between screen" which people see between pages
* ideas move to second phase after enough upvotes (to be determined)
* second phase
  * ideas are clearly defined by in-house experts
  * investors and mobile app companies are paired up to create the idea
  * low risk, low profit margin business model
  * users who submitted orignal idea gets percentage

#####Other Specifications
* Users can log in with facebook
* There is a 140 character limit on idea text block
* The application is in english only, ideas included
* Responsive design to allow for mobile devices
* Database tracks users own ideas and which ideas the user has been shown
* Rank all ideas by likes

#####Original Requirements/Specifications content (from first draft):
Scope reduced to mobile apps for project but possible to expand. Input limited to image + text. User can check the status of his idea or send it to friends so that they can vote. As someone votes, they immediately see the next idea, hopefully keeping them engaged to vote on more ideas. Platform language = English (possible to expand in future).

User Profile should include: Ideas submitted (with status(number of votes, percentage)). Ideas they liked. Hidden: the ideas they voted down, so they don't have the same ideas popping up.

####UML Design
KISS - Design principle (Keep it simple, Stupid!). Each step in the process should be as easy as possible for the user.

####Evaluation and Success Metrics

####Execution Plan
Project execution plan (PEP) is a document that is prepared at the start of a project, in order to provide details about the project itself, its team members, their responsibilities and interconnection or integration of administrative and management procedures.
#####Task list
######Week 3
- [ ] finalized idea (group)
- [ ] practice/prepare pitch (Peter/Hao)
- [ ] finalizing elaborating idea document (group)
  - [ ] Relevance to course (Peter)
  - [ ] Innovative and challenges (Miriam)
  - [ ] Requirements specifications (gizem)
  - [ ] UML design (Hao)
  - [ ] planned eval and success metrics (mon/tues next week)
  - [ ] Review document
- [ ] bluemix server and git setup (Alex)
- [ ] Maybe start on DB schema (Alex)
- [ ] visuals and front end (picking css library, making user interface) (Miriam Gizem)
- [ ] check out crowdflower, design what is necessary (Gizem, Miriam)
- [ ] Check out Lucene (Peter Hao)

######Week 4
- [ ] build DB schema and implement, with php interface to update it
- [ ] build functionality to upload pictures with text
- [ ] functionality to login as human computation user
- [ ] functionality to login as user
- [ ] 

#####Week 5

#####Week 6
- [ ] app ready for crowdflower usage

#####Week7
- [ ] user voting implementation

#####Week 8
- [ ] everything is done




####Assignment Description
// purpose: written form of your pitch presentation. In details, you are required to formalise the project topic and to motivate in a written form: 
#####Pitch:
* why the idea is exciting
* How the idea is relevant to the course
* How the idea is placed with respect to the state of the art
* sketch the major components of the project
* Give a rough timeline. When do you plan to complete these components? 
* Explain who in your team will be responsible for which components. 
* How can you evaluate whether you succeeded? </b>

Mock-ups and prototype demonstrations are welcome. 

#####Project idea document
* The relevance to the course
* The innovative and challenging nature of the project
* The requirements/specifications of the application to develop;
* A coarse-grained execution plan; 
* a first UML design of your application; 
* your planned evaluation and success metrics</b>




