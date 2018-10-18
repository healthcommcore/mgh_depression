<?php

/**
 * Implements hook_preprocess_page().
 */
function mgh_depression_preprocess_page(&$variables) {
  if (!empty($variables['page']['sidebar_first']) || !empty($variables['page']['sidebar_second'])) {
    $variables['content_column_class'] = ' class="col-md-9 col-sm-9"';
  }
	if ( isset($variables['navbar_classes_array']) ) {
		if ($index = array_search('container', $variables['navbar_classes_array']) ) {
			array_splice( $variables['navbar_classes_array'], $index, 1);
		}
	}
}

/**
 * Implements hook_preprocess_views_exposed_form
 */
function mgh_depression_views_pre_render(&$view) {
	//dpm($view);
}

/**
 * Implements hook_preprocess_views_exposed_form
 */
function mgh_depression_views_query_alter(&$view, &$query) {
}


/**
 * Implements hook_preprocess_views_exposed_form
 */
function mgh_depression_preprocess_views_exposed_form(&$vars, $hook) {
}

/**
 * Implements hook_form_alter
 */
function mgh_depression_form_alter(&$form, &$form_state, $form_id) {
}

/**
 * Implements hook_element_info_alter
 */
	/*
function mgh_depression_element_info_alter(&$elements) {
	if(isset($elements['checkboxes'])) {
		//dpm($elements['checkboxes']);
		if( $key = array_search('_bootstrap_process_input', $elements['checkboxes']['#process']) ) {
			//dpm($key);
			unset($elements['checkboxes']['#process'][$key]);
			$elements['checkboxes']['#process'][] = '_mgh_depression_process_input';
		}
	}
  foreach ($elements as &$element) {
    // Process all elements.
		if (!empty($element['#input']) && !empty($element['#attributes']['class'])) {
			unset($element['#process']);
      //$element['#process'][] = '_mgh_depressionp_process_input';
    }
  }
}
function _mgh_depression_process_input(&$element, &$form_state) {
  // Only add the "form-control" class for specific element input types.
  $types = array(
    // Core.
    'password',
    'password_confirm',
    'select',
    'textarea',
    'textfield',
    // Elements module.
    'emailfield',
    'numberfield',
    'rangefield',
    'searchfield',
    'telfield',
    'urlfield',
  );
  if (!empty($element['#type']) && (in_array($element['#type'], $types) || ($element['#type'] === 'file' && empty($element['#managed_file'])))) {
    $element['#attributes']['class'][] = 'thisisatest';
  }
  return $element;
}
	 */
/**
 * Implements hook_menu_link
 */
function mgh_depression_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    }
    elseif ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] == 1)) {
      // Add our own wrapper.
      unset($element['#below']['#theme_wrappers']);
      $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
      // Generate as standard dropdown.
      //$element['#title'] .= ' <span class="caret"></span>';
      $element['#attributes']['class'][] = 'dropdown';
      $element['#localized_options']['html'] = TRUE;

      // Set dropdown trigger element to # to prevent inadvertant page loading
      // when a submenu link is clicked.
			/*
      $element['#localized_options']['attributes']['data-target'] = '#';
      $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
      $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
			 */
    }
  }
  // On primary navigation menu, class 'active' is not set on active menu item.
  // @see https://drupal.org/node/1896674
  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Implements hook_preprocess_block()
 */
function mgh_depression_preprocess_block(&$variables) {
	$region = $variables['elements']['#block']->region;
	if($region == 'home_feature') {
		$variables['classes_array'][] = 'col-md-4 home-feature';
	}
}

