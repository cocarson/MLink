
<?php 

include '../api.php';

$url = 'https://api-gw.it.umich.edu/Curriculum/SOC/v1/Terms/2010/Schools/' . $_POST['college'] . '/Subjects';
$class = new UMapis;
$json = $class->call_api($url);
$data = json_decode($json);

echo '<div id="subject-div">';

echo '<select id="subject">';

foreach ($data->getSOCSubjectsResponse->Subject as $subject) {
	echo '<option value="' . $subject->SubjectCode . '">' . $subject->SubjectDescr . '</option>';
}

echo '</select>';

echo '</div>';

?>