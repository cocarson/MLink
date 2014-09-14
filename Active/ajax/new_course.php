
<?php 

$ch = curl_init();

$url_string = 'https://api-gw.it.umich.edu/Curriculum/SOC/v1/Terms/2010/Schools/' . $_POST["college"] . '/Subjects/' . $_POST['subject'] . '/CatalogNbrs/' . $_POST['course'] . '/Textbooks';

curl_setopt($ch, CURLOPT_URL, $url_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Authorization: Bearer 91838eacb55280c88b45f3bd12cf8d90',
	'Accept: application/json'
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$json = curl_exec($ch);
$data = json_decode($json);

echo '<div id="course-div">';

echo '<select id="course">';

foreach ($data->getSOCCtlgNbrsResponse->ClassOffered as $class) {
	echo '<option value="' . $class->CatalogNumber . '">' . $class->CatalogNumber . ': ' . $class->CourseDescr . '</option>';
}

echo '</select>';

echo '</div>';

?>