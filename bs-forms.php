<?php

class BS_Form {

	public function start( $method = 'post', $action = '', $extra = array() ) {

		$form_id = ( !empty( $extra['id'] ) ) ? ' id="' . $extra['id'] . '"' : '';
		$form_class = ( !empty( $extra['class'] ) ) ? ' class="' . $extra['class'] . '"' : '';
		$form_enctype = ( !empty( $extra['enctype'] ) ) ? ' enctype="' . $extra['enctype'] . '"' : '';

		$form_tag  = '<form ';
		$form_tag .= 'action="' . $action . '"';
		$form_tag .= 'method="' . $method . '"';
		$form_tag .= $form_id;
		$form_tag .= $form_class;
		$form_tag .= $form_enctype;
		$form_tag .= '>';

		if ( !empty( $extra['echo'] ) && ( $extra['echo'] === false ) ) {
			return $form_tag;
		} else {
			echo $form_tag;
		}

	}

	public function end( $args = array() ) {

		$form_tag = '</form>';

		if ( !empty( $args['echo'] ) && ( $args['echo'] === false ) ) {
			return $form_tag;
		} else {
			echo $form_tag;
		}

	}

	public function section_heading( $title = '', $first = false, $extra = array() ) {

		$first_class = ( $first ) ? ' first' : '';
		$heading_class = ( !empty( $extra['class'] ) ) ? ' ' . $extra['class'] : '';
		$heading_tag  = '<div ';
		$heading_tag .= 'class="form-section-heading';
		$heading_tag .= $first;
		$heading_tag .= $heading_class;
		$heading_tag .= '">';
		$heading_tag .= $title;
		$heading_tag .= '</div>';

		if ( !empty( $extra['echo'] ) && ( $extra['echo'] === false ) ) {
			return $heading_tag;
		} else {
			echo $heading_tag;
		}

	}


	/**
	 * text function.
	 *
	 * Outputs a input[type=text]
	 *
	 * Takes an array of args:
	 *
		array(
			'name' => 'field_name',
			'id' => 'field_id',
			'label' => 'field_label',
			'label_attrs' => array( // add an additional class or id to the field label
				'class' => 'label_class',
				'id' => 'label_id',
			),
			'form_group' => array( // add an additional class or id to form group
				'id' 	=> 'form_group_id',
				'class' => 	'form_group_class',
			),
			'field_wrapper' => array( // add a wrapper around the field inside of the from group for specific css stuff
				'id' => 'wrapper_id',
				'class' => 'wrapper_class'
			),
			'prepend' => '$',
			'append' => '.00',
			'max_length' => 100,
			'placeholder' => 'Enter value here...',
			'data_attr' => array( // add data-attributes if needed
				array( 'attr' => 'data-id', 'value' => 'attr-id' ),
				array( 'attr' => 'data-name', 'value' => 'attr-name' ),
			),
			'error_block' => 'please make sure to blah blah blah',
			'echo ' => true // if false then returns the field
		)
	 * @author Matthew Price
	 * @access public
	 * @param array $args (default: array())
	 * @return void
	 */
	public function text( $args = array() ) {

		$input_text = '';

		// print the input type text
		$max_length = ( isset( $args['max_length'] ) ) ? $args['max_length'] : '';
		$placeholder = ( isset( $args['placeholder'] ) ) ? $args['placeholder'] : '';
		$value = ( isset( $args['value'] ) ) ? $args['value'] : '';

		$type = 'text';
		if ( !empty( $args['type'] ) && ( $args['type'] == 'password' ) ) {
			$type = 'password';
		}

		$input_text .= self::field_header( $args );

		$input_text .= '<input ';
		$input_text .= 'type="' . $type . '" ';
		$input_text .= 'name="' . $args['name'] . '" ';
		$input_text .= 'id="' . $args['id'] . '" ';
		$input_text .= 'class="' . $args['class'] . '" ';
		$input_text .= 'value="' . $args['value'] . '" ';
		if ( $placeholder ) {
			$input_text .= 'placeholder="' . $args['placeholder'] . '" ';
		}
		if ( $max_length ) {
			$input_text .= 'max_length="' . $args['max_length'] . '"';
		}

		// check if there are data attr...like data-handle, data-toggle, etc
		$field_data = '';
		if ( !empty( $args['data_attr'] ) && is_array( $args['data_attr'] ) ) {

			foreach ( $data_attr as $da ) {
				$field_data .= ' ' . $da['attr'] . '="' . $da['value'] . '" ';
			}

		}
		if ( $field_data ) {
			$input_text .= rtrim( $field_data );
		}

		// close the input
		$input_text .= '>';

		$input_text .= self::field_footer( $args );

		if ( !empty( $args['echo'] ) && ( $args['echo'] === false ) ) {
			return $input_text;
		} else {
			echo $input_text;
		}

	}

	/**
	 * password function.
	 *
	 * Outputs a input[type=password]
	 *
	 * Takes an array of args:
	 *
		array(
			'name' => 'field_name',
			'id' => 'field_id',
			'label' => 'field_label',
			'label_attrs' => array( // add an additional class or id to the field label
				'class' => 'label_class',
				'id' => 'label_id',
			),
			'form_group' => array( // add an additional class or id to form group
				'id' 	=> 'form_group_id',
				'class' => 	'form_group_class',
			),
			'field_wrapper' => array( // add a wrapper around the field inside of the from group for specific css stuff
				'id' => 'wrapper_id',
				'class' => 'wrapper_class'
			),
			'prepend' => '$',
			'append' => '.00',
			'max_length' => 100,
			'placeholder' => 'Enter value here...',
			'data_attr' => array( // add data-attributes if needed
				array( 'attr' => 'data-id', 'value' => 'attr-id' ),
				array( 'attr' => 'data-name', 'value' => 'attr-name' ),
			),
			'help_block' => 'make sure to blah blah blah',
			'echo ' => true // if false then returns the field
		)
	 * @author Matthew Price
	 * @access public
	 * @param array $args (default: array())
	 * @return void
	 */
	public function password( $args = array() ) {

		$args['type'] = 'password';
		self::text( $args );

	}

	/**
	 * textarea function.
	 *
	 * Outputs a textarea
	 *
	 * Takes an array of args:
	 *
		array(
			'name' => 'field_name',
			'id' => 'field_id',
			'label' => 'field_label',
			'label_attrs' => array( // add an additional class or id to the field label
				'class' => 'label_class',
				'id' => 'label_id',
			),
			'form_group' => array( // add an additional class or id to form group
				'id' 	=> 'form_group_id',
				'class' => 	'form_group_class',
			),
			'field_wrapper' => array( // add a wrapper around the field inside of the from group for specific css stuff
				'id' => 'wrapper_id',
				'class' => 'wrapper_class'
			),
			'max_length' => 100,
			'data_attr' => array( // add data-attributes if needed
				array( 'attr' => 'data-id', 'value' => 'attr-id' ),
				array( 'attr' => 'data-name', 'value' => 'attr-name ),
			),
			'help_block' => 'make sure to blah blah blah',
			'echo ' => true // if false then returns the field
		)
	 * @author Matthew Price
	 * @access public
	 * @param array $args (default: array())
	 * @return void
	 */
	public function textarea( $args = array() ) {

		$textarea = '';

		$textarea .= self::field_header( $args );

		// print the input type text
		$max_length = ( isset( $args['max_length'] ) ) ? $args['max_length'] : '';
		$value = ( isset( $args['value'] ) ) ? $args['value'] : '';

		$textarea .= '<textarea ';
		$textarea .= 'name="' . $args['name'] . '" ';
		$textarea .= 'id="' . $args['id'] . '" ';
		$textarea .= 'class="' . $args['class'] . '" ';
		if ( $max_length ) {
			$textarea .= 'max_length="' . $args['max_length'] . '"';
		}

		// check if there are data attr...like data-handle, data-toggle, etc
		if ( !empty( $args['data_attr'] ) && is_array( $args['data_attr'] ) ) {

			$field_data = '';
			foreach ( $data_attr as $da ) {
				$field_data .= ' ' . $da['attr'] . '="' . $da['value'] . '" ';
			}

		}
		if ( $field_data ) {
			$textarea .= rtrim( $field_data );
		}

		$value = ( !empty( $args['value'] ) ) ? $args['value'] : '';

		// close the opening textarea tag
		$textarea .= '>' . $value . '</textarea>';

		$textarea .= self::field_footer( $args );

		if ( !empty( $args['echo'] ) && ( $args['echo'] === false ) ) {
			return $textarea;
		} else {
			echo $textarea;
		}

	}

	/**
	 * select function.
	 *
	 * Outputs a select
	 *
	 * Takes an array of args:
	 *
		array(
			'name' => 'field_name',
			'id' => 'field_id',
			'options' => array(
				array( 'id' => option_id', 'value' => 'option_value' ),
				array( 'id' => option_id', 'value' => 'option_value' )
			),
			'value' => 'field_value' // if there is a value, it will be compared with options to determine selected
			'label' => 'field_label',
			'label_attrs' => array( // add an additional class or id to the field label
				'class' => 'label_class',
				'id' => 'label_id',
			),
			'form_group' => array( // add an additional class or id to form group
				'id' 	=> 'form_group_id',
				'class' => 	'form_group_class',
			),
			'field_wrapper' => array( // add a wrapper around the field inside of the from group for specific css stuff
				'id' => 'wrapper_id',
				'class' => 'wrapper_class'
			),
			'prepend' => '$',
			'append' => '.00',
			'data_attr' => array( // add data-attributes if needed
				array( 'attr' => 'data-id', 'value' => 'attr-id' ),
				array( 'attr' => 'data-name', 'value' => 'attr-name' ),
			),
			'help_block' => 'make sure to blah blah blah',
			'echo ' => true // if false then returns the field
		)
	 * @author Matthew Price
	 * @access public
	 * @param array $args (default: array())
	 * @return void
	 */
	public function select( $args = array() ) {

		$select = '';

		$select .= self::field_header( $args );

		$select .= '<select ';
		$select .= 'name="' . $args['name'] . '" ';
		$select .= 'id="' . $args['id'] . '" ';
		$select .= 'class="' . $args['class'] . '" ';

		// check if there are data attr...like data-handle, data-toggle, etc
		$field_data = '';
		if ( !empty( $args['data_attr'] ) && is_array( $args['data_attr'] ) ) {
			foreach ( $data_attr as $da ) {
				$field_data .= ' ' . $da['attr'] . '="' . $da['value'] . '" ';
			}

		}
		if ( $field_data ) {
			$select .= rtrim( $field_data );
		}

		// close the opening select tag
		$select .= '>';

		if ( !empty( $args['options'] ) ) {
			foreach ( $args['options'] as $option ) {
				$selected = ( $option['value'] == $args['value'] ) ? ' selected="selected"' : '';
				$disabled = ( !empty( $option['disabled'] ) && ( $option['disabled'] === true ) ) ? ' disabled="disabled"' : '';
				$select .= '<option value="' . $option['value'] . '"' . $selected . $disabled . '>';
				$select .= $option['label'];
				$select .= '</option>';
			}
		}

		$select .= '</select>';

		$select .= self::field_footer( $args );

		if ( !empty( $args['echo'] ) && ( $args['echo'] === false ) ) {
			return $select;
		} else {
			echo $select;
		}

	}

	/**
	 * radio function.
	 *
	 * Outputs a set of radio buttons
	 *
	 * Takes an array of args:
	 *
		array(
			'name' => 'field_name',
			'id' => 'field_id',
			'options' => array(
				array( 'id' => 'option_id', 'value' => 'option_value', 'disabled' => true/false ),
				array( 'id' => 'option_id', 'value' => 'option_value' )
			),
			'value' => 'field_value', // if there is a value, it will be compared with options to determine selected
			'label' => 'field_label',
			'label_attrs' => array( // add an additional class or id to the field label
				'class' => 'label_class',
				'id' => 'label_id',
			),
			'form_group' => array( // add an additional class or id to form group
				'id' 	=> 'form_group_id',
				'class' => 	'form_group_class'
			),
			'field_wrapper' => array( // add a wrapper around the field inside of the from group for specific css stuff
				'id' => 'wrapper_id',
				'class' => 'wrapper_class'
			),
			'data_attr' => array( // add data-attributes if needed
				array( 'attr' => 'data-id', 'value' => 'attr-id' ),
				array( 'attr' => 'data-name', 'value' => 'attr-name' )
			),
			'help_block' => 'make sure to blah blah blah',
			'echo ' => true // if false then returns the field
		)
	 * @author Matthew Price
	 * @access public
	 * @param array $args (default: array())
	 * @return void
	 */
	public function radio( $args = array() ) {

		$radio = '';

		$args['type'] = 'radio';
		$radio .= self::field_header( $args );

		if ( !empty( $args['options'] ) ) {
			foreach ( $args['options'] as $option ) {
				$checked = ( $option['value'] == $args['value'] ) ? ' checked="checked"' : '';
				$disabled = ( !empty( $option['disabled'] ) && ( $option['disabled'] === true ) ) ? ' disabled="disabled"' : '';
				$radio .= '<div class="radio">';
				$radio .= '<label for="' . $option['id'] . '">';
				$radio .= '<input type="radio" name="' . $args['name'] . '" id="' . $option['id'] . '" value="' . $option['value'] . '"' . $checked  . $disabled . '>';
				$radio .= $option['label'];
				$radio .= '</label>';
				$radio .= '</div>';
			}
		}

		$radio .= self::field_footer( $args );

		if ( !empty( $args['echo'] ) && ( $args['echo'] === false ) ) {
			return $radio;
		} else {
			echo $radio;
		}

	}

	/**
	 * checkbox function.
	 *
	 * Outputs a set of checkboxes
	 *
	 * Takes an array of args:
	 *
		array(
			'name' => 'field_name',
			'id' => 'field_id',
			'options' => array(
				array( 'id' => 'option_id', 'value' => 'option_value', 'disabled' => true/false ),
				array( 'id' => 'option_id', 'value' => 'option_value' )
			),
			'value' => 'field_value' // if there is a value, it will be compared with options to determine selected
			'label' => 'field_label',
			'label_attrs' => array( // add an additional class or id to the field label
				'class' => 'label_class',
				'id' => 'label_id'
			),
			'form_group' => array( // add an additional class or id to form group
				'id' 	=> 'form_group_id',
				'class' => 	'form_group_class'
			),
			'field_wrapper' => array( // add a wrapper around the field inside of the from group for specific css stuff
				'id' => 'wrapper_id',
				'class' => 'wrapper_class'
			),
			'data_attr' => array( // add data-attributes if needed
				array( 'attr' => 'data-id', 'value' => 'attr-id' ),
				array( 'attr' => 'data-name', 'value' => 'attr-name' )
			),
			'help_block' => 'make sure to blah blah blah',
			'echo ' => true // if false then returns the field
		)
	 * @author Matthew Price
	 * @access public
	 * @param array $args (default: array())
	 * @return void
	 */
	public function checkbox( $args = array() ) {

		$checkbox = '';

		$args['type'] = 'checkbox';
		$checkbox .= self::field_header( $args );

		if ( !empty( $args['options'] ) ) {
			foreach ( $args['options'] as $option ) {
				$checked = ( $option['value'] == $args['value'] ) ? ' checked="checked"' : '';
				$disabled = ( !empty( $option['disabled'] ) && ( $option['disabled'] === true ) ) ? ' disabled="disabled"' : '';
				$checkbox .= '<div class="checkbox">';
				$checkbox .= '<label for="' . $option['id'] . '">';
				$checkbox .= '<input type="checkbox" name="' . $args['name'] . '" id="' . $option['id'] . '" value="' . $option['value'] . '"' . $checked . $disabled . '>';
				$checkbox .= $option['label'];
				$checkbox .= '</label>';
				$checkbox .= '</div>';
			}
		}

		$checkbox .= self::field_footer( $args );

		if ( !empty( $args['echo'] ) && ( $args['echo'] === false ) ) {
			return $checkbox;
		} else {
			echo $checkbox;
		}

	}

	/**
	 * hidden function.
	 *
	 * Outputs a hidden field
	 *
	 * Takes an array of args:
	 *
	 	Form_Display::hidden(
			array(
				'name' => 'field_name',
				'id' => 'field_id',
				'value' => 'field_value' // if there is a value, it will be compared with options to determine selected
				'echo ' => true // if false then returns the field
			)
		)
	 * @author Matthew Price
	 * @access public
	 * @param array $args (default: array())
	 * @return void
	 */
	public function hidden( $args = array() ) {

		$hidden = '<input type="hidden" name="' . $args['name'] . '" id="' . $args['id'] . '" value="' . ( !empty( $args['value'] ) ) ? $args['value'] : '' . '">';
		if ( !empty( $args['echo'] ) && ( $args['echo'] === false ) ) {
			return $hidden;
		} else {
			echo $hidden;
		}

	}

	/**
	 * submit_button function.
	 *
	 * Outputs a submit button
	 *
	 * Takes an array of args:
	 *
	 	Form_Display::select(
			array(
				'name' => 'field_name',
				'id' => 'field_id',
				'class' => 'btn btn-default',
				'display' => 'Submit' // if there is a value, it will be compared with options to determine selected
				'echo ' => true // if false then returns the field
			)
		)
	 * @author Matthew Price
	 * @access public
	 * @param array $args (default: array())
	 * @return void
	 */
	public function submit_button( $args = array() ) {

		$submit_button = '';

		$submit_button = self::field_header( $args );

		$btn_class = ( !empty( $args['class'] ) ) ? $args['class'] : 'btn btn-default';
		$submit_button .= '<button class="' . $btn_class . '" id="' . $args['id'] . '" name="' . $args['name'] . '">';
		$submit_button .= $args['display'];
		$submit_button .= '</button>';

		$submit_button .= self::field_footer( $args );

		if ( !empty( $args['echo'] ) && ( $args['echo'] === false ) ) {
			return $submit_button;
		} else {
			echo $submit_button;
		}

	}


	/**
	 * field_header function.
	 *
	 * handles containers around field
	 *
	 * @access public
	 * @param array $args (default: array())
	 * @return void
	 */
	public function field_header( $args = array() ) {

		$field = '';

		// check for form group id or class
		$form_group_id = ( !empty( $args['form_group_id'] ) ) ? ' ' . $form_group_id : 'form_group-' . $args['id'];
		$form_group_class = '';
		if ( !empty( $args['type'] ) && ( in_array( $args['type'], array( 'radio', 'checkbox' ) ) ) ) {
			$form_group_class .= ' ' . $args['type'] . '-form-group';
		}
		$form_group_class .= ( !empty( $args['form_group']['class'] ) ) ? ' ' . $args['form_group']['class'] : '';

		// print the opening form-group div
		$field .= '<div ';
		$field .= 'id="' . $form_group_id . '" ';
		$field .= 'class="form-group' . $form_group_class . '"';
		$field .= '>';

		// print label if necessary
		if ( !empty( $args['label'] ) ) {

			$label_for = ( !empty( $args['id'] ) ) ? $args['id'] : '';

			$field .= '<label ';
			$field .= 'for="' . $label_for . '" ';

			if ( !empty( $args['label_attrs'] ) ) {
				$label_class = ( !empty( $args['label_attrs']['class'] ) ) ? $args['label_attrs']['class'] : '';
				$label_id = ( !empty( $args['label_attrs']['id'] ) ) ? $args['label_attrs']['id'] : '';
				$field .= 'id="' . $label_id . '" ';
				$field .= 'class="' . $label_class . '" ';
			}

			$field .= '>';
			$field .= $args['label'];
			$field .= '</label>';

		}

		// if field wrapper needed, add the opening div tag
		if ( !empty( $args['field_wrapper' ] ) ) {

			$field_wrapper_id = ( !empty( $args['field_wrapper']['id'] ) ) ? $args['field_wrapper']['id'] : '';
			$field_wrapper_class = ( !empty( $args['field_wrapper']['class'] ) ) ? $args['field_wrapper']['class'] : '';
			$field .= '<div ';
			$field .= 'id="' . $field_wrapper_id . '" ';
			$field .= 'class="' . $field_wrapper_class . '"';
			$field .= '>';

		}

		// print input-group div if prepend or append is being used
		if ( !empty( $args['prepend'] ) || !empty( $args['append'] ) ) {
			$field .= '<div class="input-group">';
		}

		// print prepend group if necessary.  can be glyphicon or text
		if ( !empty( $args['prepend'] ) ) {
			$field .= '<div class="input-group-addon">' . $args['prepend'] . '</div>';
		}

		return $field;

	}

	/**
	 * field_footer function.
	 *
	 * handles containers around field
	 *
	 * @access public
	 * @param array $args (default: array())
	 * @return void
	 */
	public function field_footer( $args = array() ) {

		$field = '';

		// append div if necessary
		if ( !empty( $args['append'] ) ) {
			$field .= '<div class="input-group-addon">' . $args['append'] . '</div>';
		}

		// end of input group if prepend or append
		if ( !empty( $args['prepend'] ) || !empty( $args['append'] ) ) {
			$field .= '</div>';
		}

		// end of field wrapper if necessary
		if ( !empty( $args['field_wrapper' ] ) ) {
			$field .= '</div>';
		}

		// error block
		if ( !empty( $args['error_block'] ) ) {
			$field .= '<p class="error-block" style="display: none;" id="error-block-' . $args['id'] . '">' . $args['error_block'] . '</p>';
		}

		// end of form group
		$field .= '</div>';
		return $field;

	}

}