## Remmberall - important tips / tricks / and lessons

### git commits the right way
```
Summarize changes in around 50 characters or less

More detailed explanatory text, if necessary. Wrap it to about 72
characters or so. In some contexts, the first line is treated as the
subject of the commit and the rest of the text as the body. The
blank line separating the summary from the body is critical (unless
you omit the body entirely); various tools like `log`, `shortlog`
and `rebase` can get confused if you run the two together.

Explain the problem that this commit is solving. Focus on why you
are making this change as opposed to how (the code explains that).
Are there side effects or other unintuitive consequences of this
change? Here's the place to explain them.

Further paragraphs come after blank lines.

 - Bullet points are okay, too

 - Typically a hyphen or asterisk is used for the bullet, preceded
   by a single space, with blank lines in between, but conventions
   vary here

If you use an issue tracker, put references to them at the bottom,
like this:

Resolves: #123
See also: #456, #789

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

