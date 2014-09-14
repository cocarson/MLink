<?php
require 'vendor/autoload.php';

require 'api.php';
 
use Parse\ParseClient;
use Parse\ParseQuery;
use Parse\ParseObject;

ParseClient::initialize('AQ2Vfb0vhbBq3N6t2Aeu4fpLaZ5Xp8HI42P1fOxr', 'yFuVB8uoineYD9d2DXredK3QF0ZH4N0IHcMx9oLf', '34h4r0BN7uE0w64iGdjFqvNqpIejoorV1Gdf82we');
$query = new ParseQuery("Subjects");
$query->exists("SchoolCode");
$results = $query->find();

foreach ($results as $el) {
	$schoolCode = $el->SchoolCode;
	$subjectCode = $el->SubjectCode;

	$url = 'https://api-gw.it.umich.edu/Curriculum/SOC/v1/Terms/2010/Schools/' . $schoolCode . '/Subjects/' . $subjectCode . '/CatalogNbrs';
	//$url = 'https://api-gw.it.umich.edu/Curriculum/SOC/v1/Terms/2010/Schools/ENG/Subjects/EECS/CatalogNbrs';
	$class = new UMapis;
	$json = $class->call_api($url);
	$data = json_decode($json);

	if ($data) {
		if ($data->getSOCCtlgNbrsResponse) {
			if (isset($data->getSOCCtlgNbrsResponse->ClassOffered)) {
				foreach ($data->getSOCCtlgNbrsResponse->ClassOffered as $class) {
		
					$courseNbr = (int)$class->CatalogNumber;
					$courseDescr = $class->CourseDescr;

					$course = new ParseObject('Classes');
					$course->set('SchoolCode', $schoolCode);
					$course->set('SubjectCode', $subjectCode);
					$course->set('CatalogNbr', $courseNbr);
					$course->set('CatalogDescr', $courseDescr);

					$course->save();
				}
			}
		}
	}
	
	//$courseNbr = $data->getSOCCtlgNbrsResponse->ClassOffered->CatalogNumber;
	//$courseDescr = $data->getSOCCtlgNbrsResponse->ClassOffered->CourseDescr;

	/*$course = new ParseObject('Classes');
	$course->set('SchoolCode', $schoolCode);
	$course->set('SubjectCode', $subjectCode);
	$course->set('CatalogNbr', $courseNbr);
	$course->set('CatalogDescr', $courseDescr);

	$course->save();*/

}

echo 'done';


?>