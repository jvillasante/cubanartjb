<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used
	| by the validator class. Some of the rules contain multiple versions,
	| such as the size (max, min, between) rules. These versions are used
	| for different input types such as strings and files.
	|
	| These language lines may be easily changed to provide custom error
	| messages in your application. Error messages for custom validation
	| rules may also be added to this file.
	|
	*/

	"accepted"       => ":attribute debe ser aceptado.",
	"active_url"     => ":attribute no es una URL v&aacute;lida.",
	"after"          => ":attribute debe ser una fecha posterior a :date.",
	"alpha"          => ":attribute s&oacute;lo puede contener letras.",
	"alpha_dash"     => ":attribute s&oacute;lo puede contener letras, n&uacute;meros y guiones.",
	"alpha_num"      => ":attribute s&oacute;lo puede contener letras y n&uacute;meros.",
	"array"          => ":attribute debe tener elementos seleccionados.",
	"before"         => ":attribute debe ser una fecha anterior a :date.",
	"between"        => array(
		"numeric" => ":attribute debe encontrarse entre :min &ndash; :max.",
		"file"    => ":attribute debe encontrarse entre :min &ndash; :max kilobytes.",
		"string"  => ":attribute debe encontrarse entre :min &ndash; :max caracteres.",
	),
	"confirmed"      => "La confirmaci&oacute;n de :attribute no es correcta.",
	"count"          => ":attribute debe tener exactamente :count elementos seleccionados.",
	"countbetween"   => ":attribute debe tener entre :min y :max elementos seleccionados.",
	"countmax"       => ":attribute debe tener menos de :max elementos seleccionados.",
	"countmin"       => ":attribute debe tener al menos :min elementos seleccionados.",
	"different"      => ":attribute y :other deben ser diferentes.",
	"email"          => "Formato de :attribute es inv&aacute;lido.",
	"exists"         => ":attribute seleccionado es inv&aacute;lido.",
	"image"          => ":attribute debe ser una im&aacute;gen.",
	"in"             => ":attribute seleccionado es inv&aacute;lido.",
	"integer"        => ":attribute debe ser un entero.",
	"ip"             => ":attribute debe ser una direcci&oacute;n IP v&aacute;lida.",
	"match"          => "El formato de :attribute no es v&aacute;lido.",
	"max"            => array(
		"numeric" => ":attribute debe ser menor que :max.",
		"file"    => ":attribute debe ser menor que :max kilobytes.",
		"string"  => ":attribute debe ser menor que :max caracteres.",
	),
	"mimes"          => ":attribute debe ser un fichero de tipo: :values.",
	"min"            => array(
		"numeric" => ":attribute debe ser al menos :min.",
		"file"    => ":attribute debe ser al menos :min kilobytes.",
		"string"  => ":attribute debe ser al menos :min caracteres.",
	),
	"not_in"         => "El :attribute seleccionado no es v&aacute;lido.",
	"numeric"        => ":attribute debe ser un n&uacute;mero.",
	"required"       => ":attribute es obligatorio.",
	"same"           => ":attribute y :other deben ser iguales.",
	"size"           => array(
		"numeric" => ":attribute debe ser :size.",
		"file"    => ":attribute debe ser :size kilobyte.",
		"string"  => ":attribute debe ser :size caracteres.",
	),
	"unique"         => ":attribute ya se encuentra en uso.",
	"url"            => "El formato de :attribute no es v&aacute;lido.",
  'current_password' => 'La contraseña entrada no concuerda con su contraseña actual.',
  'upload_err_ini_size' => 'El tamaño del fichero excede el m&aacute;ximo permitido por su servidor.',
  'upload_err_partial' => 'El fichero ha sido solo parcialmente subido.',
	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute_rule" to name the lines. This helps keep your
	| custom validation clean and tidy.
	|
	| So, say you want to use a custom validation message when validating that
	| the "email" attribute is unique. Just add "email_unique" to this array
	| with your custom message. The Validator will handle the rest!
	|
	*/

  'custom' => array(
  ),

	/*
	|--------------------------------------------------------------------------
	| Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as "E-Mail Address" instead
	| of "email". Your users will thank you.
	|
	| The Validator class will automatically search this array of lines it
	| is attempting to replace the :attribute place-holder in messages.
	| It's pretty slick. We think you'll like it.
	|
	*/

  'attributes' => array(
    'first_name' => 'Nombre',
    'last_name' => 'Appellidos',
    'email' => 'Direcci&oacute;n de Correo',
    'subject' => 'Sujeto',
    'message' => 'Mensaje',
    'name' => 'Nombre del Cuadro',
    'dimensions' => 'Dimensiones del Cuadro',
    'type' => 'Tipo de Pintura',
    'painter' => 'Nombre del Pintor',
    'year' => 'Año de Creaci&oacute;n',
    'comment' => 'Comentario del Cuadro',
    'painting_image' => 'Imagen del Cuadro',
    'current_password' => 'Contraseña Actual',
    'new_password' => 'Nueva Contraseña',
    'username' => 'Nombre de Usuario',
    'image1' => 'Imagen 1',
    'image2' => 'Imagen 2',
    'image3' => 'Imagen 3',
    'image4' => 'Imagen 4',
    'image5' => 'Imagen 5',
    'image6' => 'Imagen 6',
    'password' => 'Contraseña',
    'password_confirmation' => 'Confirmaci&oacute;n',
    'event_name' => 'Nombre del Evento',
    'event_place' => 'Lugar del Evento',
    'event_date' => 'Fecha del Evento',
    'event_description' => 'Descripci&oacute;n del Evento',
  ),

);
