<!DOCTYPE html>
<html>
<head>
	<title>Form Submitted</title>
</head>
<body>

<?php

	if(isset($_POST['submit'])) {
		// Check for the honeypot input field meant to catch bots
		if(!empty($_POST['website'])) {
			// die();
			// Give an error message
			echo "<h1>問題が発生しました</h1>";
			echo "URLs are not allowed.";
		}
		else {
			// $to = "labo@5star-english.jp"; // this is the recipient's e-mail address
			$to = "chris@5star-english.jp";
	    $from = $_POST['email'] ?? "無記入"; // this is the sender's e-mail address
	    $name = $_POST['name'] ?? "無記入";
	    $subject = "Linove Elite Business Website Form Submission";
	    $form_message = $_POST['message'] ?? "メッセージはありません。";
	    $message = $name . ", with the e-mail address " . $from . " wrote the following:" . "\n\n" . $form_message . "\n\n";

			$message .= "以下の項目が選択されました。\n\n";
			$application_details = $_POST['application-details'] ?? NULL;
			if ($application_details) {
				$message .= "お申込み内容:\n\n";
				foreach ($application_details as $value) {
					$message .= $value. "\n";
				}
			}
			echo "\n";

	    $headers = "From:" . $from;

			mail($to,$subject,$message,$headers);
	    echo "<h1>送信完了</h1>";
	    echo "<p>お問い合わせありがとうございます。メッセージが正常に送信されました。折り返し担当より回答させていただきますので、今しばらくお待ちください。</p>";
		}
	}
	else {
		echo "<h1>問題が発生しました</h1>";
	}
?>
	<p><a href="index.html">前のページに戻ってください</a></p>
</body>
</html>
