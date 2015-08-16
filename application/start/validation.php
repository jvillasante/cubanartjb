<?php

/**
 * Validate that the password submitted is this user password
 */
Validator::register('current_password', function($attribute, $value, $parameter) {
  try {
    $user = Sentry::user();
    if ($user->check_password($value)) {
      return true;
    } else {
      return false;
    }
  } catch (Sentry\SentryException $e) {
    return false;
  }
});

/*
 * Image Validation
 */
Validator::register('upload_err_ini_size', function($attribute, $value, $parameter) {
  return false;
});
Validator::register('upload_err_partial', function($attribute, $value, $parameter) {
  return false;
});

