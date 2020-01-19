<?PHP
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$bucketName = '4ww3a3';


try {
		// You may need to change the region. It will say in the URL when the bucket is open
		// and on creation.
		$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => 'us-east-2'
			)
		);
	} catch (Exception $e) {
		// We use a die, so if this fails. It stops here. Typically this is a REST call so this would
		// return a json object.
		die("Error: " . $e->getMessage());
	}

	$keyName = basename($_FILES["imgupload"]['name']);
	$pathInS3 = 'https://s3.us-east-2.amazonaws.com/' . $bucketName . '/' . $keyName;

	try {
		// Uploaded:
		$file = $_FILES["imgupload"]['tmp_name'];
		$s3->putObject(
			array(
				'Bucket'=>$bucketName,
				'Key' =>  $keyName,
				'SourceFile' => $file,
				'ACL' => 'public-read',
				'StorageClass' => 'REDUCED_REDUNDANCY'
			)
		);
	} catch (S3Exception $e) {
		//die('Error:' . $e->getMessage());
		echo 'False';
	} catch (Exception $e) {
		//die('Error:' . $e->getMessage());
		echo 'False';
	}
	//after upload complete redirect to sample results page
	header("Location: https://polskagasreviews.me/4WW3_Project/docs/results_sample.php");
	exit();
?>
