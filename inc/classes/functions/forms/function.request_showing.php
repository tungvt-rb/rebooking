<?php
	
function submit_contact()
{
	$email = isset($_POST['email']) ? trim($_POST['email']) : '';
	$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
	$name = isset($_POST['name']) ? trim($_POST['name']) : '';
	$errors = array();
	
	if (empty($phone)) $errors['phone'] = 'Bạn cần nhập số điện thoại.';
	if (empty($name)) $errors['name'] = 'Bạn cần nhập họ tên.';
	if (empty($email)) $errors['email'] = 'Bạn cần nhập địa chỉ email.';
	elseif (!is_email($email)) $errors['email'] = 'Địa chỉ email sai. Hãy nhập lại.';

	if (sizeof($errors)) {
		echo json_encode(array(
			'status' => 'FAILED',
			'errors' => $errors
		));
	} else {
		// send mail
		$subject 		= 'Gửi từ [' . get_bloginfo('name') . ']';
		$content 		= "Name: $name" . "\n";
		$content 		.= "Phone: $phone" . "\n";
		$content 		.= "Email: $email" . "\n";
		$content 		.= "Dự án quan tâm: $subject" . "\n";
		$content 		.= "Message:" . "\n"
							. '----------------------------------------' . "\n"
							. stripslashes($message) . "\n"
							. '----------------------------------------' . "\n"
							. "\n";
		$content 		.= "Tin nhắn này được gửi từ trang " . get_bloginfo('home');
		$to 			= 'tungvt1611@gmail.com';
		$headers 		= 'From: webmaster@example.com' . "\r\n" .
							'Reply-To: webmaster@example.com' . "\r\n" .
							'X-Mailer: PHP/' . phpversion();
		//mail($to, $subject, $content, $headers);

		// insert post
		$postID = wp_insert_post(array(
			'comment_status' => 'closed',
			'ping_status' => 'open',
			'post_content' => $content,
			'post_status' => 'private',
			'post_title' => $name . '[Contact Page]',
			'post_type' => 'newsletter',
			'post_excerpt' => $content,
		));

		if ($postID) {

			echo json_encode(array(
				'status' => 'SUCCESS',
				'body' => '<div class="success">' . vrOptionTree('thankyou_message', '', 0) . '</div>',
			));

		} else {
			echo json_encode(array(
				'status' => 'FAILED',
				'errors' => 'Error occured while submitting your story. Please try again later.',
			));
		}

	}
	exit();
}