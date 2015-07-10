# BS-Forms
PHP Class for Implementing Twitter Bootstrap 3 Forms

<b>Fact: Writing endless HTML containers for Bootstrap 3 forms is boring and time consuming.</b>

You could have some shortcuts in your code editor that will draw them quick enough, but even that still displays a lot of junk on your templates and views.

Also, if you have all that html on your pages and want to add more functionality, you have to add that html to every single page that will use that new feature.

BS Forms to the rescue!

Full Documentation at:  http://bs-forms.com


Basic Example Usage:


```
$form = new BS_Form();
$form->start(
	'post',
	'/form-processor',
	array( 'class' => 'form_class', 'id' => 'form_id' )
);
$form->text(
	array(
		'name' => 'first_name',
		'id' => 'first_name',
		'class' => 'form-control',
		'label' => 'First Name'
	)
);
$form->text(
	array(
		'name' => 'last_name',
		'id' => 'last_name',
		'class' => 'form-control',
		'label' => 'Last Name'
	)
);
$form->text(
	array(
		'name' => 'email',
		'id' => 'email',
		'class' => 'form-control',
		'label' => 'Email Address'
	)
);
$form->submit_button(
	array(
		'name' => 'submit',
		'id' => 'submit',
		'class' => 'btn btn-success',
		'display' => 'Submit'
	)
);
$form->end();
```