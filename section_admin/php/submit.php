<?php // You need to add server side validation and better error handling here

$data = array();

$conn = mysqli_connect('localhost','root','','db_dar');
if(isset($_GET['files']))
{	
	$deptId = $_GET["deptId"];
	$error = false;
	$files = array();

	$uploaddir = '../../FILE/Files/File_Original/';
	foreach($_FILES as $file)
	{
		$fileId = rand(0,9)."".rand(0,9)."".rand(0,9)."".rand(0,9);
		$fileName = $file['name'];
		mysqli_query($conn, "INSERT INTO tbl_file(file_id,file_name,emp_id,dept_id,file_verified) VALUES('$fileId','$fileName','0','$deptId','0')");
		if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($file['name'])))
		{
			$files[] = $uploaddir .$file['name'];
		}
		else
		{
		    $error = true;
		}
	}
	$data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
}
else
{
	$data = array('success' => 'Form was submitted', 'formData' => $_POST);
}

echo json_encode($data);

?>