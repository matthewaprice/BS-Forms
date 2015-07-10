# BS-Forms
PHP Class for Implementing Twitter Bootstrap 3 Forms

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