<?php

	$email = isset($_POST['email']) ? trim($_POST['email']) : '';
	$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
	$fullname = isset($_POST['full-name']) ? trim($_POST['full-name']) : '';
	$securecode = isset($_POST['secure-code']) ? trim($_POST['secure-code']) : '';
	$errors = array();
	
	if (empty($phone)) $errors['phone'] = 'Bạn cần nhập số điện thoại.';
	if (empty($fullname)) $errors['full-name'] = 'Bạn cần nhập họ tên.';
	if (empty($email)) $errors['email'] = 'Bạn cần nhập địa chỉ email.';
	elseif (!is_email($email)) $errors['email'] = 'Địa chỉ email sai. Hãy nhập lại.';
	if (empty($securecode)) $errors['secure-code'] = 'Secure code is required.';
	else if (!isset($_SESSION['secure-code']) OR $_SESSION['secure-code']!=$securecode) $errors['secure-code'] = 'Secure code is incorrect.';

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
		// $postID = wp_insert_post(array(
		// 	'comment_status' => 'closed',
		// 	'ping_status' => 'open',
		// 	'post_content' => $content,
		// 	'post_status' => 'private',
		// 	'post_title' => $name . '[Contact Page]',
		// 	'post_type' => 'newsletter',
		// 	'post_excerpt' => $content,
		// ));
		$postID = 1;

		if ($postID) {
			$html = '<div class="notification success">
						<a href="javascript:;" class="close"><i class="fa fa-close"></i></a>
						<span><i class="fa fa-info-circle"></i> Lorem isum dolor set amit</span>
					</div>';

			echo json_encode(array(
				'status' => 'SUCCESS',
				'body' => $html,
			));

		} else {
			echo json_encode(array(
				'status' => 'FAILED',
				'errors' => 'Error occured while submitting your story. Please try again later.',
			));
		}

	}

	exit();