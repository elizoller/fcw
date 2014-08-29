
<h1>Faculty Creative Works Technical and Web Summary</h1>
<p>Current as of May 15 2014- Eli Zoller</p>
<h2>Website Structure</h2>
<p>The Faculty Creative Works website is organized by college or school then by department (if there are any). Under each department the faculty are organized by last name. A user can click on the faculty&rsquo;s name or picture to pull up the works they are being honored for that calendar year. The main url is <a href="http://library.uta.edu/fcw">http://library.uta.edu/fcw</a>. When a user goes to that URL they are redirected into the current year&rsquo;s celebration site. For example, the redirect may lead a user to the 2013/index.php file. New events can be added by adding new directories to the server and changing the redirect path.</p>
<h2>Database Structure</h2>
<p>Data is modeled in a relational database using MySQL. The graphical user interface software used to maintain the MySQL database is Navicat. The structure of the database allows faculty to be associated to with one department and one college. Faculty can be associated with multiple items. Each item can be associated with a single category. Because of the many-to-many relationship between faculty and items, the faculty_items table serves as a linking table to allow that relationship. The primary keys for categories, colleges, departments, faculty_items, and items are auto generated. The faculty_id is pulled from the mentis system.</p>
<p>Table: Categories</p>
<table border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="148" valign="top"><br />
      Field name </td>
    <td width="148" valign="top"><p>Field type</p></td>
    <td width="148" valign="top"><p>Example</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Category_id</p></td>
    <td width="148" valign="top"><p>Int 5 primary key</p></td>
    <td width="148" valign="top"><p>2</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Category_name</p></td>
    <td width="148" valign="top"><p>Varchar 30</p></td>
    <td width="148" valign="top"><p>Presentations</p></td>
  </tr>
</table>
<p>Table: Colleges</p>
<table border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="148" valign="top"><br />
      Field name </td>
    <td width="148" valign="top"><p>Field type</p></td>
    <td width="148" valign="top"><p>Example</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>College_id</p></td>
    <td width="148" valign="top"><p>Int 5 primary key</p></td>
    <td width="148" valign="top"><p>7</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>College_name</p></td>
    <td width="148" valign="top"><p>Varchar 75</p></td>
    <td width="148" valign="top"><p>College of Science</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>College_dean</p></td>
    <td width="148" valign="top"><p>Varchar 75</p></td>
    <td width="148" valign="top"><p>Beth S. Wright</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>College_dean_title</p></td>
    <td width="148" valign="top"><p>Varchar 75</p></td>
    <td width="148" valign="top"><p>Dean</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>College_img</p></td>
    <td width="148" valign="top"><p>Varchar 50</p></td>
    <td width="148" valign="top"><p>Liberalarts2.jpg</p></td>
  </tr>
</table>
<p>Table: Departments</p>
<table border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="148" valign="top"><br />
      Field name </td>
    <td width="148" valign="top"><p>Field type</p></td>
    <td width="148" valign="top"><p>Example</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Department_id</p></td>
    <td width="148" valign="top"><p>Int 5 primary key</p></td>
    <td width="148" valign="top"><p>20</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Department_name</p></td>
    <td width="148" valign="top"><p>Department_chair</p></td>
    <td width="148" valign="top"><p>English</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>College_id</p></td>
    <td width="148" valign="top"><p>Foreign key</p></td>
    <td width="148" valign="top"><p>5</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Department_chair</p></td>
    <td width="148" valign="top"><p>Varchar 75</p></td>
    <td width="148" valign="top"><p>Bruce Krajewski</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Department_chair_title</p></td>
    <td width="148" valign="top"><p>Varchar 25</p></td>
    <td width="148" valign="top"><p>Chair</p></td>
  </tr>
</table>
<p>Table: Faculty</p>
<table border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="148" valign="top"><br />
      Field name </td>
    <td width="148" valign="top"><p>Field type</p></td>
    <td width="148" valign="top"><p>Example</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Faculty_id</p></td>
    <td width="148" valign="top"><p>Int 5 primary key</p></td>
    <td width="148" valign="top"><p>13021</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Faculty_prefix</p></td>
    <td width="148" valign="top"><p>Varchar 25</p></td>
    <td width="148" valign="top"><p>Dr.</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Faculty_first_name</p></td>
    <td width="148" valign="top"><p>Varchar 50</p></td>
    <td width="148" valign="top"><p>Julieann</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Faculty_middle_name</p></td>
    <td width="148" valign="top"><p>Varchar 50</p></td>
    <td width="148" valign="top"><p>M.</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Faculty_last_name</p></td>
    <td width="148" valign="top"><p>Varchar 50</p></td>
    <td width="148" valign="top"><p>Nagoshi</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Faculty_suffix</p></td>
    <td width="148" valign="top"><p>Varchar 25</p></td>
    <td width="148" valign="top"><p>Jr.</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Faculty_title</p></td>
    <td width="148" valign="top"><p>Varchar 100</p></td>
    <td width="148" valign="top"><p>Assistant Professor</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Faculty_img</p></td>
    <td width="148" valign="top"><p>Varchar 150</p></td>
    <td width="148" valign="top"><p>1001035627</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Faculty_link</p></td>
    <td width="148" valign="top"><p>Varchar 150</p></td>
    <td width="148" valign="top"><p>https://www.uta.edu /profile/julieann-nagoshi</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Department_id</p></td>
    <td width="148" valign="top"><p>Int 5 foreign key</p></td>
    <td width="148" valign="top"><p>14</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>College_id</p></td>
    <td width="148" valign="top"><p>Int 5 foreign key</p></td>
    <td width="148" valign="top"><p>4</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Faculty_item_types</p></td>
    <td width="148" valign="top"><p>Varchar 500</p></td>
    <td width="148" valign="top"><p>Book, Journal Article, Presentation</p></td>
  </tr>
</table>
<p>Table: Faculty_items</p>
<table border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="148" valign="top"><br />
      Field name </td>
    <td width="148" valign="top"><p>Field type</p></td>
    <td width="148" valign="top"><p>Example</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Faculty_item_id</p></td>
    <td width="148" valign="top"><p>Int 5 primary key</p></td>
    <td width="148" valign="top"><p>7757</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Faculty_id</p></td>
    <td width="148" valign="top"><p>Int 5 foreign key</p></td>
    <td width="148" valign="top"><p>2166</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Item_id</p></td>
    <td width="148" valign="top"><p>Int 5 foreign key</p></td>
    <td width="148" valign="top"><p>1556</p></td>
  </tr>
</table>
<p>Table: Items</p>
<table border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="148" valign="top"><br />
      Field name </td>
    <td width="148" valign="top"><p>Field type</p></td>
    <td width="148" valign="top"><p>Example</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Item_id</p></td>
    <td width="148" valign="top"><p>Int 5 primary key</p></td>
    <td width="148" valign="top"><p>1032</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Item_link</p></td>
    <td width="148" valign="top"><p>Varchar 150</p></td>
    <td width="148" valign="top"><p>http:// link</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Item_title</p></td>
    <td width="148" valign="top"><p>Varchar 2000</p></td>
    <td width="148" valign="top"><p>Item title or citation</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Item_date</p></td>
    <td width="148" valign="top"><p>Varchar 50</p></td>
    <td width="148" valign="top"><p>2013</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Item_location</p></td>
    <td width="148" valign="top"><p>Varchar 100</p></td>
    <td width="148" valign="top"><p>Austin, TX</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Item_description</p></td>
    <td width="148" valign="top"><p>Varchar 2000</p></td>
    <td width="148" valign="top"><p>User provided description</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Item_subtype</p></td>
    <td width="148" valign="top"><p>Varchar 250</p></td>
    <td width="148" valign="top"><p>Invited</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Item_refereed</p></td>
    <td width="148" valign="top"><p>Varchar 50</p></td>
    <td width="148" valign="top"><p>Yes</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Item_peerreview</p></td>
    <td width="148" valign="top"><p>Varchar 50</p></td>
    <td width="148" valign="top"><p>Peer Reviewed</p></td>
  </tr>
  <tr>
    <td width="148" valign="top"><p>Category_id</p></td>
    <td width="148" valign="top"><p>Int 5 foreign key</p></td>
    <td width="148" valign="top"><p>17</p></td>
  </tr>
</table>
<h2>Website Languages and Plugins</h2>
<p>The website is built primarily using HTML, CSS, Javascript, PHP, MySQL, JQuery, Less, and Bootstrap. HTML forms the structure of the pages. CSS is used to style the pages. Javascript is used to make interactive components such as buttons and hover affects. PHP is used to dynamically generate content from the database. Queries are performed using PHP and MySQL to pull the data. JQuery is a Javascript library used along side Javascript for the interactive client-side interaction. Less is a CSS preprocessor used to compile and organize the CSS before it is outputted for use. Bootstrap is a front-end framework that was used to form the responsive base of the site.  To make changes to the style the changes are made in a Less file which is run through preprocessing software such as Koala which outputs a CSS file to be included in the page. The search function allows users to query the database directly. The search uses AJAX to dynamically pull data from the database.</p>
<h2>Unique Data Situations</h2>
<p>How to add a new year?<br />
  To add a new year to the site, add a new directory for that calendar year under /fcw. Then change the redirect located in fcw/index.html to go to the new index page. You can copy and paste the entire directory from the previous year into the new year. In the leftnav.php file, you&rsquo;ll need to uncomment the link to previous years and have that link back to the previous year (or years). In the top of each of the college/school pages there is a variable allowing you to specify the year, change that variable to the current year. On the index.php file for that year change the large banner to read the correct year. If you want to limit users in the search to just that year then modify the queries to make sure the item_date field = 2013. Each of the items in the database for that year will have the item_date as that year which will allow us to separate the years</p>
<p>How to add a new faculty member?<br />
  To add a new faculty member, add their info to the faculty table. The unique identifier is pulled from the mentis system.</p>
<p>How to move a faculty to a new department?<br />
  To move a faculty to a new department or college/school, duplicate the faculty record then modify the department or college/school foreign key(s).</p>
<p>How to add a new school/college?  <br />
  To add a new school/college, add the info to the colleges table, increment the id to the next value.</p>
<p>How to add a new department?<br />
  To add a new department, add the info to the departments table, increment the id to the next value.<br />
   <br />
  How to move a department to a different school/college?<br />
  To move a department to a different school/college, change the college_id field in the departments table which links the departments to the colleges.   </p>
<p>How to remove a faculty member who left?<br />
              Leave them in the faculty table to preserve previous years.</p>
<h2>Future Potential</h2>
<p>The site could be expanded to include more dynamic and visual elements. There is potential in developing how the items are displayed on the site in addition to their citations such as including links, images, videos, or recordings of the items. Further links to the mentis system could be added and the search can become more robust as content is added. Pictures and video from the receptions could be added as well.</p>

