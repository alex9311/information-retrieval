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
#####Human Computation
* Sanitation check on images/text that are submitted, before the idea item goes into the public pool
* Sanitation check on IR result for similar idea, before the idea item goes into the public pool

#####Information Retrieval
* Finding similar ideas in the public pool to a new ideas

#####Crowdsourcing
* Ideas are submitted by the crowd
* Voting is done by the crowd
* Sharing/advertizing is done by the crowd

#####Original Relevance content (from first draft):
We are sending out an open call for the crowd to send in ideas. Creating a idea-crowdsourcing platform. Having the platform open for anyone brings a variety in quality of ideas contributed. This being the internet, you are inevitably vulnerable to people posting unwanted content such as spam or content that is sexual, hateful or otherwise offensive. To screen the ideas posted to our platform we use Crowdflower for content moderation. Crowdflower is a crowdsourcing platform where you can hire the crowd for a small fee to complete simple tasks that need reliable feedback.

The ideas will be stored in a database with an ID attached to it. For each idea we parse the text attached to it, creating a dictionary where we connect words to IDs to make it possible to search the ideas and rank for relevance based on word relevance, popularity, date of creation. (This needs to be worked out in more detail). 

####Innovative and Challenging Nature of Project
#####Innovative ideas
* Gives unskilled individuals an opportunity to make money from a small ideas, through the crowd
* Mobile app companies have validated ideas for products

#####Challenges
* There are many different components that need to work together seamlessly
* Getting distict ideas can be challenging  
* Keep users involved and contributing, getting the user to feel invested in an idea

####Motivating the Crowd and Monetization
The possibility to sell the ideas to companies was mentioned. I prefer the idea of being more involved in the execution of the idea. With the site open to use and view by anyone nothing is stopping companies from getting the ideas for free. With something as intangible as an idea it is near impossible to claim rights on it. I think the best way to monetize and have the site be sustainable is to find people skilled to implement the idea and start a kickstarter to collect funds. Fact is that a lot of kickstarter projects don't reach their target. When starting a kickstarter campaign for a idea from our platform however we already have contributors and people invested in the idea who might be interested to donate and spread the word about the project. People that have contributed ideas to the project can then eventually receive a percentage of the revenue created when the product is on the market (for mobile apps at least its easy to get something in an app store).

Also, the idea of ads was shot down by the professor, but I believe that if you can show ads that are relevant and non-intrusive it is not a bad idea. For example, there is an popular idea to make a virtual pet dragon app. You can have a web-crawler search for a similar app that is already available (similar but most likely not exactly the same) and offer the makers of the app some adspace on the site. The ad would be relevant to what the user is looking at. The idea on the site can still be elaborated on and might turn into something quite different.

####Requirements and Specifications

#####a)	User Characteristics
The main users that the application is created for are both experienced and non-experienced users; it can be used by average users that have ideas that they would like to be made but do not have the required time/skills/money for it. The general users that the application addresses are listed below:
* 	Non-experienced User:	Average user with little or no expertise. Uses the system to share ideas and/or vote on ideas.
* Experienced User:	User with expertise in the field, who uses the system to take the ideas to the implementation level. They can be in-house experts who define the chosen ideas. They can also vote on ideas.
* Investors/Companies:	Users who are looking for new ideas to get implemented and gain profit by funding and/or providing resources for it. They can also vote on ideas that they would like to get implemented.	

#####b)	Functional Requirements
The application functions in two phases; one for sharing and voting ideas and another for working on the implementation of the ideas. The main functional requirements in these phases are as follows:

Phase 1:
*	The system allows users to sign up and create a user profile.
*	The system must allow users to submit ideas for mobile applications, accompanied by a short text describing the idea and an optional picture.
*	The system must put the idea along with its description through a sanitation check to eliminate submissions that are inappropriate according to specified rules. Sanitation check is performed by CrowdFlower.
*	If a picture is also provided with the submitted idea, the system puts the picture through the sanitation check as well.
*	The system must give a notification informing the user of the status of their submission; it can either be accepted or rejected. If it is rejected, a reason must be provided to the user.
*	If the submission is accepted, the system transfers the submitted idea to the public pool.
*	The system must allow all users to see the ideas in the public pool and vote on them.
*	If an idea gets enough votes, the system takes it to Phase 2.

Phase 2:
*	Ideas are clearly defined by in-house experts.
*	Appropriate investors and companies are informed of the idea to implement it.
*	Users can choose to get their ideas developed in-house or find outside developers.
*	Users who originally submit the ideas get a certain percentage from the profit.

Other Specifications:
*	Users can log in to the application through Facebook.
*	Users are allowed to write up to 140 characters in the description of their ideas.
*	A database tracks users’ own ideas. 
*	User profiles should include the ideas that the users have shared, as well as the ideas that they liked. It should also show the current status of the users’ ideas, including the submission status and the number of votes it received.
* The system can rank all ideas according to the number of likes they receive.

#####c)	User Interface Requirements

The application must provide an easy-to-use platform that is straightforward to all of its users. The main requirements are as follows:
*	The interface design must be responsive to allow for mobile devices.
*	The public pool which shows ideas to all users has a tinder-like interaction style, in which users go through cards that can be swiped.
*	The language of the application, as well as the ideas, is English only in the first version of the application.

/* remove after review on requirements/specifications
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

*/

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




