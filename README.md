csvread 
=======

http://gentle-anchorage-9028.herokuapp.com/

csvread is designed to read .csv file submissions containing information regarding train scheduling and present them in a consolidated, organized, and aesthetically pleasing manner.

Getting Started
============
1. To upload a .csv file simply select the "choose file" option.

2. A prompt will appear requesting you select a file (note: the program will only accept .csv files adhering to the train schedule format)

3. If you would like to include additional .csv content, click the "add csv" link to do so.

4. An additional "choose file" field will appear, add your file using the same process performed in steps (1&2).

5. Once you are prepared to submit your information, click submit.

6. View your nicely formatted, web friendly data!

ABOUT
=======

-The reader was written using php and javascript to power the core functionality.
-Was tested locally using XAMPP Apache services.

PHP
-used to read, consolidate, and organize the file content.
-utilized a temporary sqlite3 database to identify duplicate entries and sort the data by Run Number.
-clean all undesirable formatting.

Javascript
-Allows for the submission of multiple .csv files.
-Validates that the submitted files have the ".csv" extension to prevent error.

HTML/CSS
-Basic structure & design
-Utilized some basic Bootstrap.css features


