# Mastering Drupal 8 Development


## Create a Custom Module for Aquifer Content Types [√]

- create iai_aquifer module
	- use drupal console 
- enable the module
	- use drush 	


## create water eco action content type [√]

- **description**: The Water Eco Action content type stores details about opportunities to help out with things like cleaning up polluted beaches
- **title label**: Title
- *disable preview*
- *publish and create new revision*
- *don't promote or make sticky*
- *don't display author and date*
- *don't select any menues*

**Fields**

- use `wea` slug in all machine names
- *remove body field*
-  **add Contact Email (type: email)**
-  **add Coordinates (type: plain text)**
-  **add Description (type: long plain text)**
-  **add Status (type: list text)**
	pending|Pending  
	active|In Progress
	completed|Completed
	cancelled|Cancelled
	postponed|Postponed
	paused|Paused

- **add Urgency (type: list text)** 
	low|Low
	normal|Normal
	high|High

## Create a Custom Module for Water Eco Action Content Types [√]