<p align="center">
  <b></b><br>
  <b> Distributed Programming I</b><br>
  <b> Web Programming Test Assignment</b><br>
  <br><br>
</p>
Build a website for assigning maintenance operations that a company has to do at customers’ premises. Assume that
each customer has a location (Y,Y coordinates) on a rectangular map. X and Y grow from left to right and from bottom
to top, respectively, with the origin corresponding to the lower left corner of the rectangle. Each worker of the company
uses the website in order to select the clients for whom the worker wants to carry out the maintenance operation.
The web application must have the following features:<br>
1. On the home page of the site, anyone can view, without any registration, all the locations of the customers that must
be served by the company, displayed on the map as small circles, each one with a diameter of 4 pixels. Each place not
yet assigned to a worker is represented by a black circle, while one already assigned is represented by a green circle.<br>
2. Each worker of the company who is already registered in the system can log into the application by means of a
dedicated form. A new worker willing to use the site can sign up freely on the site by providing a username, which must
be a valid email address, and a password, which must contain at least 2 special characters (i.e. non-alphanumeric
characters). The password entered by the user must be confirmed by the user by filling a second identical password field
in the form. If the two passwords entered by the user do not match, sign-up must not continue. If sign-up is successful,
the worker must be automatically logged into the system without having to perform a regular sign-in nor any other
action.<br>
3. Once logged in, a worker must see a personal home page displaying the map with all the locations of customers. The
locations of customers assigned to the worker must be yellow, the ones not yet assigned to anyone must be black, while
the ones assigned to other workers must be green.<br>
4. A logged-in worker must be able to request the assignment of some customers by selecting a rectangle on the map
that includes these customers’ locations. The selection must not include yellow circles, but it may include green circles,
because the workers to which they have been assigned may have deleted these assignments in the meanwhile. Once the
rectangular selection has been made, without interacting with the server, the application shows a vertical list including
all the selected locations of customers, with their coordinates. Moreover, the selected locations are highlighted on the
map by adding an external circle to the location circle. Afterwards, the worker can send the selection to the server, e.g.
by clicking on a button. The server, once received the selection, assigns the selected locations to the worker, if possible.
Then, a page is displayed with the updated situation, on which a new selection becomes possible. In case of error (e.g.
because one or more locations have already been assigned to other workers, so they cannot be assigned to the requesting
worker) no selected location is assigned, and a specific error message is displayed in the next page.
4. A logged-in worker must also be able to delete the assignments made previously, by clicking on a button. Each click
on the button deletes the last assignment made (i.e. assignments are deleted in reverse order).<br>
5. It is mandatory that the application deployed at Labinf is in the following initial state: three workers are already
signed-up, with usernames u1@p.it, u2@p.it, u3@p.it and passwords p.-1, p.-2, p.-3 respectively, and these workers
have already made the requests described below. Use a map of 600x400 pixels, with 10 customers having the following
locations:<br>
10,20<br>
30,30<br>
30,180 (selected by u1@p.it in a single operation, along with the other selection by u1@p.it)<br>
70,290 (selected by u1@p.it in a single operation, along with the other selection by u1@p.it)<br>
75,360 (selected by u2@p.it)<br>
130,241<br>
240,241<br>
280,302<br>
350,144<br>
540,203<br>
7. Authentication through username and password remains valid if no more than two minutes have elapsed since the last
page load. If a user tries to perform an operation that requires authentication after an idle time of more than 2 minutes,
the operation has no effect and the user is forced to re-authenticate with username and password. The use of HTTPS
must be enforced for sign up and authentication and in any part of the site that shows private information of an
authenticated or signed up user.<br>
8. The general layout of the web pages must contain: a header in the upper part, a navigation bar on the left side with
links or buttons to carry out the possible operations and a central part which is used for the main operation.<br>
9. Cookies and Javascript must be enabled, otherwise the website must not work (in that case, the user has to be notified
in the main page, and the application web pages must not be displayed). Forms should be provided with small
informational messages in order to explain the meaning of the different fields. These messages may be put within the
fields themselves or may appear when the mouse pointer is over them.<br>
10. The more uniform the views and the layouts are by varying the adopted browser, the better. 
