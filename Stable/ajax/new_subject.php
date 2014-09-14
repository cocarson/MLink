
<?php 

include '../api.php';

$url = 'https://api-gw.it.umich.edu/Curriculum/SOC/v1/Terms/2010/Schools/' . $_POST['college'] . '/Subjects/' . $_POST['subject'] . '/CatalogNbrs';
$class = new UMapis;
$json = $class->call_api($url);
$data = json_decode($json);

echo '<div id="course-div">';

echo '<select id="course">';

foreach ($data->getSOCCtlgNbrsResponse->ClassOffered as $class) {
	echo '<option value="' . $class->CatalogNumber . '">' . $class->CatalogNumber . ': ' . $class->CourseDescr . '</option>';
}

echo '</select>';

echo '</div>';

?>