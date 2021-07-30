## To do and important notes

```
status: closed
task: redo tables naming in database
use case: better naming conventions for PHP
solution: remake tables

status: closed
task: add FK to shool id in teachers_courses
use case: connect a school to each course being
taught
solution: add fk relationship

status: doing
task: add a count of the total number of credts
each student has to each student object when
created in the studentsTable
use case: to be able to show the view of total
credits for each student
solution: foreach loop over the array of enrolled
classes

status: open
task: upload to github and share to sheldon
use case: so he can review the work
solution: git add . && git commit

status: open
task: show students total credits and
dynamically show if they are on track
to graduate
use case: be able to see if a student
is on track to graduate
solution: use the student object and show the
total number of credits to graduate.

status: open
task: fix the spacing for the view of the
TeachCourses index view for the description
use case: better to read
solution: n/a

status: open
task: change the way the semesters show in the
default view, it would be better to only show
it if it's true and represent it with a checkbox
instead of a 1 or 0
use case: easier to understand and view content
solution: n/a

status: open
task: concatanate the first and last name for
the teacher in teacherCourses
use case: easier to read
solution:

status: open
location: path/students
task: add total credits for each student in the student view
use case: view students by credits
solution: create a function in the students table

status: open
task:
use case:
solution:

status: open
task:
use case:
solution:
```

## Tips and Tricks Learned

### Return Json Objects from views
* the controllers have views that are auto loaded when the path is loaded
and to return a json object use this syntax:

  `return $this->response
  ->withType('application/json')
  ->withStatus(200)
  ->withStringBody(json_encode($student,1));`

### New paths for apis
an admin(alternate) view can be added by adding an admin folder
and the desired controller, fix the name spaces by adding the
new folder path and then adding the controller route.

### Global variables
* you can add global data that needs to be secret but accessible with
the following method:
    1. add the variable to the .env file
    2. add the path to the global variables you want in the app.php Path array found here:
```'paths' => [
'plugins' => [ROOT . DS . 'plugins' . DS],
'templates' => [ROOT . DS . 'templates' . DS],
'locales' => [RESOURCES . 'locales' . DS],
'name' => [ROOT . DS . env('APP_NAME') . DS],],
```
3. make sure bootstrap.php has an env function to call the varible
4. use this syntax to call it: env('variable_name');

###when using postman you need to disable the Csrf protection middleware located in the Application.php file.
uncomment the following code:

    `          ->add(new CsrfProtectionMiddleware([
                    'httponly' => true,
                 ]));`

