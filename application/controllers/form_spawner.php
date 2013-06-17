<?php
/**
 * Controls Spawning and Handling of Forms
 */
class Form_spawner extends MY_Controller {
	/**
	 * Create Form
	 */
	public function Index() {
		echo 'working';
	}

	public function createForm($data) {

		$midRowCounter = 0;
		$legendCounter = 0;
		$fieldCounter = 0;
		$legend = $data['legend'];
		$order = $data['order'];
		$fields = $data['fields'];

		//Split Variables
		$labels = $fields['label'];
		$fieldsColumn = $fields['column'];
		$fieldName = $fields['name'];
		$fieldType = $fields['type'];
		$fieldActual;

		echo '<form id=' . $data['formID'] . ' name=' . $data['formName'] . ' action=' . $data['formAction'] . ' method="post">';

		//Create Column
		foreach ($data ['columns'] as $column => $value) {
			echo '<div class="column">
		            <fieldset>';
			//Legend
			echo '<legend>' . $legend[$legendCounter] . '</legend>';

			foreach ($fieldsColumn as $fCol) {
				if ($fCol == $value) {
					if ($fieldType[$fieldCounter] == 'textarea') {
						$fieldActual = '
						 <textarea  name="' . $fieldName[$fieldCounter] . '" id="last_name" class="validate[required]"></textarea>
						';

					} elseif ($fieldType[$fieldCounter] == 'select') {
						$fieldActual = '
						 <select  name="' . $fieldName[$fieldCounter] . '" id="last_name" class="validate[required]"></select>
						';

					} else {
						$fieldActual = '
						<input  type='.$fieldType[$fieldCounter].'.name="' . $fieldName[$fieldCounter] . '" id="last_name" class="validate[required]">
						';
					}

					if ($order[$fieldCounter] == 'max') {
						echo '
						 <div class="max-row">
						 <label>' . $labels[$fieldCounter] . '</label>' . $fieldActual . ' </div>';
					} elseif (($order[$fieldCounter] == 'mid')) {
						if ($midRowCounter % 2 == 0) {

							echo '
						 <div class="mid-row">
						  <label>' . $labels[$fieldCounter] . '</label>' . $fieldActual . ' </div>';

						} else {

							echo '
						 <div class="mid-row">
						  <label>' . $labels[$fieldCounter] . '</label>' . $fieldActual . ' </div>';
						}

					}

					$fieldCounter += 1;
				}
			}
			echo '</fieldset>
			</div>';
			$legendCounter += 1;
		}

	}

	public function Test() {
		$data['formID'] = 'one';
		$data['formName'] = 'two';
		$data['formAction'] = 'three';
		$data['fields'] = array('label' => array('First Name', 'Last Name', 'three'), 'name' => array('one', 'two', 'three'), 'id' => array('one', 'three', 'three'), 'field' => array('one', 'two', 'three'), 'type' => array('textarea', 'select', 'text'), 'column' => array('one', 'three', 'three'));
		$data['order'] = array('mid', 'mid', 'max');
		$data['columns'] = array('one', 'two', 'three');
		$data['legend'] = array('one', 'two', 'three');
		$this -> createForm($data);
	}

	public function submitForm() {

	}

}
