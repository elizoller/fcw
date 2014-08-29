fcw
===
Faculty Creative Works Technical and Web Summary
Current as of May 15 2014- Eli Zoller
Website Structure
The Faculty Creative Works website is organized by college or school then by department (if there are any). Under each department the faculty are organized by last name. A user can click on the faculty’s name or picture to pull up the works they are being honored for that calendar year. The main url is http://library.uta.edu/fcw. When a user goes to that URL they are redirected into the current year’s celebration site. For example, the redirect may lead a user to the 2013/index.php file. New events can be added by adding new directories to the server and changing the redirect path.
Database Structure
Data is modeled in a relational database using MySQL. The graphical user interface software used to maintain the MySQL database is Navicat. The structure of the database allows faculty to be associated to with one department and one college. Faculty can be associated with multiple items. Each item can be associated with a single category. Because of the many-to-many relationship between faculty and items, the faculty_items table serves as a linking table to allow that relationship. The primary keys for categories, colleges, departments, faculty_items, and items are auto generated. The faculty_id is pulled from the mentis system.

Table: Categories
Field name	Field type	Example
Category_id	Int 5 primary key	2
Category_name	Varchar 30	Presentations

Table: Colleges
Field name	Field type	Example
College_id	Int 5 primary key	7
College_name	Varchar 75	College of Science
College_dean	Varchar 75	Beth S. Wright
College_dean_title	Varchar 75	Dean
College_img	Varchar 50	Liberalarts2.jpg

Table: Departments
Field name	Field type	Example
Department_id	Int 5 primary key	20
Department_name	Department_chair	English
College_id	Foreign key	5
Department_chair	Varchar 75	Bruce Krajewski
Department_chair_title	Varchar 25	Chair

Table: Faculty
Field name	Field type	Example
Faculty_id	Int 5 primary key	13021
Faculty_prefix	Varchar 25	Dr.
Faculty_first_name	Varchar 50	Julieann
Faculty_middle_name	Varchar 50	M.
Faculty_last_name	Varchar 50	Nagoshi
Faculty_suffix	Varchar 25	Jr.
Faculty_title	Varchar 100	Assistant Professor
Faculty_img	Varchar 150	1001035627
Faculty_link	Varchar 150	https://www.uta.edu /profile/julieann-nagoshi
Department_id	Int 5 foreign key	14
College_id	Int 5 foreign key	4
Faculty_item_types	Varchar 500	Book, Journal Article, Presentation
Table: Faculty_items
Field name	Field type	Example
Faculty_item_id	Int 5 primary key	7757
Faculty_id	Int 5 foreign key	2166
Item_id	Int 5 foreign key	1556

Table: Items
Field name	Field type	Example
Item_id	Int 5 primary key	1032
Item_link	Varchar 150	http:// link
Item_title	Varchar 2000	Item title or citation
Item_date	Varchar 50	2013
Item_location	Varchar 100	Austin, TX
Item_description	Varchar 2000	User provided description
Item_subtype	Varchar 250	Invited
Item_refereed	Varchar 50	Yes
Item_peerreview	Varchar 50	Peer Reviewed
Category_id	Int 5 foreign key	17

Website Languages and Plugins
The website is built primarily using HTML, CSS, Javascript, PHP, MySQL, JQuery, Less, and Bootstrap. HTML forms the structure of the pages. CSS is used to style the pages. Javascript is used to make interactive components such as buttons and hover affects. PHP is used to dynamically generate content from the database. Queries are performed using PHP and MySQL to pull the data. JQuery is a Javascript library used along side Javascript for the interactive client-side interaction. Less is a CSS preprocessor used to compile and organize the CSS before it is outputted for use. Bootstrap is a front-end framework that was used to form the responsive base of the site.  To make changes to the style the changes are made in a Less file which is run through preprocessing software such as Koala which outputs a CSS file to be included in the page. The search function allows users to query the database directly. The search uses AJAX to dynamically pull data from the database.
Unique Data Situations
How to add a new year?
To add a new year to the site, add a new directory for that calendar year under /fcw. Then change the redirect located in fcw/index.html to go to the new index page. You can copy and paste the entire directory from the previous year into the new year. In the leftnav.php file, you’ll need to uncomment the link to previous years and have that link back to the previous year (or years). In the top of each of the college/school pages there is a variable allowing you to specify the year, change that variable to the current year. On the index.php file for that year change the large banner to read the correct year. If you want to limit users in the search to just that year then modify the queries to make sure the item_date field = 2013. Each of the items in the database for that year will have the item_date as that year which will allow us to separate the years

How to add a new faculty member?
To add a new faculty member, add their info to the faculty table. The unique identifier is pulled from the mentis system.

How to move a faculty to a new department?
To move a faculty to a new department or college/school, duplicate the faculty record then modify the department or college/school foreign key(s).

How to add a new school/college?	
To add a new school/college, add the info to the colleges table, increment the id to the next value.

How to add a new department?
To add a new department, add the info to the departments table, increment the id to the next value.
 
How to move a department to a different school/college?
To move a department to a different school/college, change the college_id field in the departments table which links the departments to the colleges.	

How to remove a faculty member who left?
	Leave them in the faculty table to preserve previous years.

Future Potential
The site could be expanded to include more dynamic and visual elements. There is potential in developing how the items are displayed on the site in addition to their citations such as including links, images, videos, or recordings of the items. Further links to the mentis system could be added and the search can become more robust as content is added. Pictures and video from the receptions could be added as well.
