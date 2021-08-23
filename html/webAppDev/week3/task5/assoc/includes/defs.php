<?php
/* Functions for PM database example. */

/* Load sample data, an array of associative arrays. */
include "pms.php";

/* Search sample data for $name or $year or $state from form. */
function search($name, $year, $state)
{
	global $pms;
	global $error;

	// Filter $pms by $name
	if (!empty($name)) {
		$results = array();
		foreach ($pms as $pm) {
			if (stripos($pm['name'], $name) !== FALSE) {
				$results[] = $pm;
			}
		}
		$pms = $results;
	}

	// Filter $pms by $year
	if (!empty($year)) {
		if (is_int($year)) {
			$results = array();
			foreach ($pms as $pm) {
				if (
					strpos($pm['from'], $year) !== FALSE ||
					strpos($pm['to'], $year) !== FALSE
				) {
					$results[] = $pm;
				}
			}
			$pms = $results;
		} else {
			$error = "Year must be a number.";
			$pms = [];
		}
	}

	// Filter $pms by $state
	if (!empty($state)) {
		$results = array();
		foreach ($pms as $pm) {
			if (stripos($pm['state'], $state) !== FALSE) {
				$results[] = $pm;
			}
		}
		$pms = $results;
	}

	if (empty($name) && empty($year) && empty($state)) {
		$error = "At least one field must contain value.";
		$pms = [];
	}

	return [$pms, $error];
}
