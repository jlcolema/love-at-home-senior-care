<?php
session_start();

/*
Template Name: Employment Application
*/



$et_regenerate_numbers = isset( $et_ptemplate_settings['et_regenerate_numbers'] ) ? (bool) $et_ptemplate_settings['et_regenerate_numbers'] : false;
		
	$et_error_message = '';
	$et_contact_error = false;
	
	if ( isset($_POST['et_contactform_submit']) ) {
		
		
		// Process form
		
		if ( !isset($_POST['et_contact_captcha']) || empty($_POST['et_contact_captcha']) ) {
			$et_error_message .= '<p>Make sure you entered the security value.</p>';
			$et_contact_error = true;
		} else if ( $_POST['et_contact_captcha'] <> ( $_SESSION['et_first_digit'] + $_SESSION['et_second_digit'] ) ) {			
			$et_numbers_string = $et_regenerate_numbers ? esc_html__('Numbers regenerated.','Nimble') : '';
			$et_error_message .= '<p>You entered the wrong number in captcha. ' . $et_numbers_string . '</p>';
			
			if ($et_regenerate_numbers) {
				unset( $_SESSION['et_first_digit'] );
				unset( $_SESSION['et_second_digit'] );
			}
			
			$et_contact_error = true;
		} else if ( empty($_POST['et_contact_name']) || empty($_POST['et_contact_email']) ){
			$et_error_message .= '<p>Make sure you fill all fields.</p>';
			$et_contact_error = true;
		}
		
		if ( !is_email( $_POST['et_contact_email'] ) ) {
			$et_error_message .= '<p>Invalid Email.</p>';
			$et_contact_error = true;
		}
		
		
	} else {
		
		// Clear captcha
		$et_contact_error = true;
		if ( isset($_SESSION['et_first_digit'] ) ) unset( $_SESSION['et_first_digit'] );
		if ( isset($_SESSION['et_second_digit'] ) ) unset( $_SESSION['et_second_digit'] );
		
	}
	
	if ( !isset($_SESSION['et_first_digit'] ) ) $_SESSION['et_first_digit'] = $et_first_digit = rand(1, 15);
	else $et_first_digit = $_SESSION['et_first_digit'];
	
	if ( !isset($_SESSION['et_second_digit'] ) ) $_SESSION['et_second_digit'] = $et_second_digit = rand(1, 15);
	else $et_second_digit = $_SESSION['et_second_digit'];
	
	if ( !$et_contact_error ) {
		$et_email_to = ( isset($et_ptemplate_settings['et_email_to']) && !empty($et_ptemplate_settings['et_email_to']) ) ? $et_ptemplate_settings['et_email_to'] : get_site_option('admin_email');
		
		$et_email_to = 'ajniska@gmail.com';
				
		$et_site_name = is_multisite() ? $current_site->site_name : get_bloginfo('name');	
		
		$contact_name 	= wp_strip_all_tags( $_POST['et_contact_name'] );
		$contact_email 	= wp_strip_all_tags( $_POST['et_contact_email'] );

		$headers  = 'From: ' . $contact_name . ' <' . $contact_email . '>' . "\r\n";
		$headers .= 'Reply-To: ' . $contact_name . ' <' . $contact_email . '>';
		
		
		
		$et_contact_address = wp_strip_all_tags( $_POST['et_contact_address'] );
		$et_contact_city = wp_strip_all_tags( $_POST['et_contact_city'] );
		$et_contact_state = wp_strip_all_tags( $_POST['et_contact_state'] );
		$et_contact_zip = wp_strip_all_tags( $_POST['et_contact_zip'] );
		$et_contact_phone = wp_strip_all_tags( $_POST['et_contact_phone'] );

		$et_contact_em_name = wp_strip_all_tags( $_POST['et_contact_em_name'] );
		$et_contact_em_phone = wp_strip_all_tags( $_POST['et_contact_em_phone'] );
		$et_contact_em_address = wp_strip_all_tags( $_POST['et_contact_em_address'] );
		$et_contact_em_rel = wp_strip_all_tags( $_POST['et_contact_em_rel'] );

		$et_contact_position = wp_strip_all_tags( $_POST['et_contact_position'] );
		$et_contact_felony = wp_strip_all_tags( $_POST['et_contact_felony'] );
		$et_contact_felony_yes = wp_strip_all_tags( $_POST['et_contact_felony_yes'] );

		$et_contact_transportation = wp_strip_all_tags( $_POST['et_contact_transportation'] );
		$et_contact_makemodel = wp_strip_all_tags( $_POST['et_contact_makemodel'] );
		$et_contact_license = wp_strip_all_tags( $_POST['et_contact_license'] );

		$et_contact_hours = wp_strip_all_tags( $_POST['et_contact_hours'] );
		$et_contact_times = wp_strip_all_tags( $_POST['et_contact_times'] );
		$et_contact_timesno = wp_strip_all_tags( $_POST['et_contact_timesno'] );
		$et_contact_emergencycall = wp_strip_all_tags( $_POST['et_contact_emergencycall'] );
		$et_contact_avail_comments = wp_strip_all_tags( $_POST['et_contact_avail_comments'] );

		$et_contact_highschool = wp_strip_all_tags( $_POST['et_contact_highschool'] );
		$et_contact_highschool_city = wp_strip_all_tags( $_POST['et_contact_highschool_city'] );
		$et_contact_highschool_grad = wp_strip_all_tags( $_POST['et_contact_highschool_grad'] );
		$et_contact_colledge = wp_strip_all_tags( $_POST['et_contact_colledge'] );
		$et_contact_colledge_city = wp_strip_all_tags( $_POST['et_contact_colledge_city'] );
		$et_contact_colledge_degree = wp_strip_all_tags( $_POST['et_contact_colledge_degree'] );
		$et_contact_scholother = wp_strip_all_tags( $_POST['et_contact_scholother'] );
		$et_contact_scholother_city = wp_strip_all_tags( $_POST['et_contact_scholother_city'] );
		$et_contact_scholother_field = wp_strip_all_tags( $_POST['et_contact_scholother_field'] );
		$et_contact_degrees = wp_strip_all_tags( $_POST['et_contact_degrees'] );
		$et_contact_skills = wp_strip_all_tags( $_POST['et_contact_skills'] );

		$et_contact_language = wp_strip_all_tags( $_POST['et_contact_language'] );

		$et_contact_experience = wp_strip_all_tags( $_POST['et_contact_experience'] );
		$et_contact_like = wp_strip_all_tags( $_POST['et_contact_like'] );
		$et_contact_dislike = wp_strip_all_tags( $_POST['et_contact_dislike'] );

		$et_task_companionship = wp_strip_all_tags( $_POST['et_task_companionship'] );
		$et_task_bathing = wp_strip_all_tags( $_POST['et_task_bathing'] );
		$et_task_grooming = wp_strip_all_tags( $_POST['et_task_grooming'] );
		$et_task_incontinence = wp_strip_all_tags( $_POST['et_task_incontinence'] );
		$et_task_transfer = wp_strip_all_tags( $_POST['et_task_transfer'] );
		$et_task_vacuuming = wp_strip_all_tags( $_POST['et_task_vacuuming'] );
		$et_task_dusting = wp_strip_all_tags( $_POST['et_task_dusting'] );
		$et_task_cleanbathroom = wp_strip_all_tags( $_POST['et_task_cleanbathroom'] );
		$et_task_cleankitchen = wp_strip_all_tags( $_POST['et_task_cleankitchen'] );
		$et_task_changebed = wp_strip_all_tags( $_POST['et_task_changebed'] );
		$et_task_laundry = wp_strip_all_tags( $_POST['et_task_laundry'] );
		$et_task_grocery = wp_strip_all_tags( $_POST['et_task_grocery'] );
		$et_task_cooking = wp_strip_all_tags( $_POST['et_task_cooking'] );
		$et_task_driving = wp_strip_all_tags( $_POST['et_task_driving'] );
		$et_task_meds = wp_strip_all_tags( $_POST['et_task_meds'] );
		
		$et_work_contact = wp_strip_all_tags( $_POST['et_work_contact'] );

		$et_work1_company = wp_strip_all_tags( $_POST['et_work1_company'] );
		$et_work1_fromto = wp_strip_all_tags( $_POST['et_work1_fromto'] );
		$et_work1_title = wp_strip_all_tags( $_POST['et_work1_title'] );
		$et_work1_reasonleft = wp_strip_all_tags( $_POST['et_work1_reasonleft'] );
		$et_work1_duties = wp_strip_all_tags( $_POST['et_work1_duties'] );
		$et_work1_supervisor = wp_strip_all_tags( $_POST['et_work1_supervisor'] );

		$et_work2_company = wp_strip_all_tags( $_POST['et_work2_company'] );
		$et_work2_fromto = wp_strip_all_tags( $_POST['et_work2_fromto'] );
		$et_work2_title = wp_strip_all_tags( $_POST['et_work2_title'] );
		$et_work2_reasonleft = wp_strip_all_tags( $_POST['et_work2_reasonleft'] );
		$et_work2_duties = wp_strip_all_tags( $_POST['et_work2_duties'] );
		$et_work2_supervisor = wp_strip_all_tags( $_POST['et_work2_supervisor'] );

		$et_work3_company = wp_strip_all_tags( $_POST['et_work3_company'] );
		$et_work3_fromto = wp_strip_all_tags( $_POST['et_work3_fromto'] );
		$et_work3_title = wp_strip_all_tags( $_POST['et_work3_title'] );
		$et_work3_reasonleft = wp_strip_all_tags( $_POST['et_work3_reasonleft'] );
		$et_work3_duties = wp_strip_all_tags( $_POST['et_work3_duties'] );
		$et_work3_supervisor = wp_strip_all_tags( $_POST['et_work3_supervisor'] );

		$et_work4_company = wp_strip_all_tags( $_POST['et_work4_company'] );
		$et_work4_fromto = wp_strip_all_tags( $_POST['et_work4_fromto'] );
		$et_work4_title = wp_strip_all_tags( $_POST['et_work4_title'] );
		$et_work4_reasonleft = wp_strip_all_tags( $_POST['et_work4_reasonleft'] );
		$et_work4_duties = wp_strip_all_tags( $_POST['et_work4_duties'] );
		$et_work4_supervisor = wp_strip_all_tags( $_POST['et_work4_supervisor'] );

		$et_bizref1_name = wp_strip_all_tags( $_POST['et_bizref1_name'] );
		$et_bizref1_address = wp_strip_all_tags( $_POST['et_bizref1_address'] );
		$et_bizref1_rel = wp_strip_all_tags( $_POST['et_bizref1_rel'] );
		$et_bizref1_phone = wp_strip_all_tags( $_POST['et_bizref1_phone'] );

		$et_bizref2_name = wp_strip_all_tags( $_POST['et_bizref2_name'] );
		$et_bizref2_address = wp_strip_all_tags( $_POST['et_bizref2_address'] );
		$et_bizref2_rel = wp_strip_all_tags( $_POST['et_bizref2_rel'] );
		$et_bizref2_phone = wp_strip_all_tags( $_POST['et_bizref2_phone'] );

		$et_bizref3_name = wp_strip_all_tags( $_POST['et_bizref3_name'] );
		$et_bizref3_address = wp_strip_all_tags( $_POST['et_bizref3_address'] );
		$et_bizref3_rel = wp_strip_all_tags( $_POST['et_bizref3_rel'] );
		$et_bizref3_phone = wp_strip_all_tags( $_POST['et_bizref3_phone'] );

		$et_ref1_name = wp_strip_all_tags( $_POST['et_ref1_name'] );
		$et_ref1_address = wp_strip_all_tags( $_POST['et_ref1_address'] );
		$et_ref1_rel = wp_strip_all_tags( $_POST['et_ref1_rel'] );
		$et_ref1_phone = wp_strip_all_tags( $_POST['et_ref1_phone'] );

		$et_ref2_name = wp_strip_all_tags( $_POST['et_ref2_name'] );
		$et_ref2_address = wp_strip_all_tags( $_POST['et_ref2_address'] );
		$et_ref2_rel = wp_strip_all_tags( $_POST['et_ref2_rel'] );
		$et_ref2_phone = wp_strip_all_tags( $_POST['et_ref2_phone'] );

		$et_heard = wp_strip_all_tags( $_POST['et_heard'] );
		$et_heard_name = wp_strip_all_tags( $_POST['et_heard_name'] );

		$et_signature = wp_strip_all_tags( $_POST['et_signature'] );

		$et_contact_captcha = wp_strip_all_tags( $_POST['et_contact_captcha'] );
		
		
		
		$et_app_message =  "Application for Employment from $contact_name\n---\n";
		$et_app_message .= "Name: $contact_name\n"; 
		$et_app_message .= "Date: ".date('M j, Y')."\n";
		$et_app_message .= "Street Address: $et_contact_address\n";
		$et_app_message .= "City: $et_contact_city | State: $et_contact_state | Zip: $et_contact_zip\n---\n";
		
		$et_app_message .= "Emergency Contact\n";
		$et_app_message .= "Name: $et_contact_em_name\n";
		$et_app_message .= "Phone $et_contact_em_phone\n";
		$et_app_message .= "Address: $et_contact_em_address\n";
		$et_app_message .= "Relationship: $et_contact_em_rel\n---\n";
		
		$et_app_message .= "Applying for position as: $et_contact_position\n";
		$et_app_message .= "Convicted of felony? $et_contact_felony\n";
		$et_app_message .= "If yes, details: $et_contact_felony_yes\n---\n";
		
		$et_app_message .= "Transportation\n";
		$et_app_message .= "Dependable transportation? $et_contact_transportation\n";
		$et_app_message .= "Make and model of car $et_contact_makemodel\n";
		$et_app_message .= "Can provide proof of Drirer License and Auto Insurance: $et_contact_license\n---\n";
		
		$et_app_message .= "Availability\n";
		$et_app_message .= "Number of hours: $et_contact_hours\n";
		$et_app_message .= "Times available: $et_contact_times\n";
		$et_app_message .= "Times not available: $et_contact_timesno\n";
		$et_app_message .= "Last minute calls: $et_contact_emergencycall\n";
		$et_app_message .= "Comments: $et_contact_avail_comments\n---\n";
		
		$et_app_message .= "Education\n";
		$et_app_message .= "High School: $et_contact_highschool\n";
		$et_app_message .= "City/State: $et_contact_highschool_city\n";
		$et_app_message .= "Graduated? $et_contact_highschool_grad\n---\n";
		
		$et_app_message .= "College: $et_contact_colledge\n";
		$et_app_message .= "City/State: $et_contact_colledge_city\n";
		$et_app_message .= "Degree/Major: $et_contact_colledge_degree\n---\n";
		
		$et_app_message .= "Other School: $et_contact_scholother\n";
		$et_app_message .= "City/State: $et_contact_scholother_city\n";
		$et_app_message .= "Field of study: $et_contact_scholother_field\n";
		$et_app_message .= "Degrees/Certificates: $et_contact_degrees\n";
		$et_app_message .= "Special skills or courses: $et_contact_skills\n---\n";
		
		$et_app_message .= "Foreign Language\n";
		$et_app_message .= "Languages: $et_contact_language\n---\n";
		
		$et_app_message .= "Experience\n";
		$et_app_message .= "Training/Experience working with the elderly: $et_contact_experience\n";
		$et_app_message .= "Like most about working with the elderly: $et_contact_like\n";
		$et_app_message .= "Likes least about working with the elderly: $et_contact_dislike\n---\n";
		
		$et_app_message .= "Skills\n";
		$et_app_message .= "Companionship: $et_task_companionship\n";
		$et_app_message .= "Bathing/dressing: $et_task_bathing\n";
		$et_app_message .= "Grooming: $et_task_grooming\n";
		$et_app_message .= "Incontinence: $et_task_incontinence\n";
		$et_app_message .= "Transfer assist: $et_task_transfer\n";
		$et_app_message .= "Vaccuming: $et_task_vacuuming\n";
		$et_app_message .= "Dusting: $et_task_dusting\n";
		$et_app_message .= "Clean bathrooms: $et_task_cleanbathroom\n";
		$et_app_message .= "Clean kitchen: $et_task_cleankitchen\n";
		$et_app_message .= "Bed linen changes $et_task_changebed\n";
		$et_app_message .= "Laundry: $et_task_laundry\n";
		$et_app_message .= "Grocery shopping: $et_task_grocery\n";
		$et_app_message .= "Cooking: $et_task_cooking\n";
		$et_app_message .= "Driving: $et_task_driving\n";
		$et_app_message .= "Medication reminders: $et_task_meds\n---\n";
		
		$et_app_message .= "Employment History\n";
		$et_app_message .= "Can the current employer be contacted? $et_work_contact\n---\n";
		
		$et_app_message .= "Company: $et_work1_company\n";
		$et_app_message .= "From - To: $et_work1_fromto\n";
		$et_app_message .= "Title: $et_work1_title\n";
		$et_app_message .= "Reason left: $et_work1_reasonleft\n";
		$et_app_message .= "Duties: $et_work1_duties\n";
		$et_app_message .= "Supervisor & Phone: $et_work1_supervisor\n---\n";
		
		$et_app_message .= "Company: $et_work2_company\n";
		$et_app_message .= "From - To: $et_work2_fromto\n";
		$et_app_message .= "Title: $et_work2_title\n";
		$et_app_message .= "Reason left: $et_work2_reasonleft\n";
		$et_app_message .= "Duties: $et_work2_duties\n";
		$et_app_message .= "Supervisor & Phone: $et_work2_supervisor\n---\n";
		
		$et_app_message .= "Company: $et_work3_company\n";
		$et_app_message .= "From - To: $et_work3_fromto\n";
		$et_app_message .= "Title: $et_work3_title\n";
		$et_app_message .= "Reason left: $et_work3_reasonleft\n";
		$et_app_message .= "Duties: $et_work3_duties\n";
		$et_app_message .= "Supervisor & Phone: $et_work3_supervisor\n---\n";
		
		$et_app_message .= "Company: $et_work4_company\n";
		$et_app_message .= "From - To: $et_work4_fromto\n";
		$et_app_message .= "Title: $et_work4_title\n";
		$et_app_message .= "Reason left: $et_work4_reasonleft\n";
		$et_app_message .= "Duties: $et_work4_duties\n";
		$et_app_message .= "Supervisor & Phone: $et_work4_supervisor\n---\n";	
		
		$et_app_message .= "Business References\n";		
		$et_app_message .= "Name: $et_bizref1_name\n";		
		$et_app_message .= "Address: $et_bizref1_address\n";		
		$et_app_message .= "Relationship/Years known: $et_bizref1_rel\n";		
		$et_app_message .= "Local Phone: $et_bizref1_phone\n---\n";	
		
		$et_app_message .= "Name: $et_bizref2_name\n";		
		$et_app_message .= "Address: $et_bizref2_address\n";		
		$et_app_message .= "Relationship/Years known: $et_bizref2_rel\n";		
		$et_app_message .= "Local Phone: $et_bizref2_phone\n---\n";	
		
		$et_app_message .= "Name: $et_bizref3_name\n";		
		$et_app_message .= "Address: $et_bizref3_address\n";		
		$et_app_message .= "Relationship/Years known: $et_bizref3_rel\n";		
		$et_app_message .= "Local Phone: $et_bizref3_phone\n---\n";	
		
		$et_app_message .= "Personal References\n";		
		$et_app_message .= "Name: $et_ref1_name\n";		
		$et_app_message .= "Address: $et_ref1_address\n";		
		$et_app_message .= "Relationship/Years known: $et_ref1_rel\n";		
		$et_app_message .= "Local Phone: $et_ref1_phone\n---\n";	
		
		$et_app_message .= "Name: $et_ref2_name\n";		
		$et_app_message .= "Address: $et_ref2_address\n";		
		$et_app_message .= "Relationship/Years known: $et_ref2_rel\n";		
		$et_app_message .= "Local Phone: $et_ref2_phone\n---\n";
		
		$et_app_message .= "For our recruitment purposes\n";		
		$et_app_message .= "How did you hear of this position? $et_heard\n";		
		$et_app_message .= "Specific name of entity: $et_heard_name\n---\n";
		
		$et_app_message .= "Signature: $et_signature\n";
		

		wp_mail( apply_filters( 'et_contact_page_email_to', $et_email_to ), 'Application for Employment',$et_app_message, apply_filters( 'et_contact_page_headers', $headers, $contact_name, $contact_email ) );
		
		$et_error_message = '<p><span style="color:#060;">Thanks for contacting us</span></p>';
	}
	
	
	
	
get_header(); ?>

<script language="javaScript">

function scrolltotop() {
	window.scrollTo(0,0);
}

</script>

<div id="main-area">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
				
                
                
                <div id="et-contact" class="responsive">
					<div id="et-contact-message" style="margin:0 0 50px 0;color:#f00;line-height:22px;"><?php echo($et_error_message); ?> </div>
					
					<form action="<?php echo(get_permalink($post->ID)); ?>" method="post" id="et_contact_form">
						
                        <div id="et_contact_left" style="width:100%;">
                        
                        <h1 style="margin:0 0 20px 0;">Application for Employment</h1>
                        
                        	<p>We are an equal opportunity employer, dedicated to a policy of non-discrimination in employment on any basis including race, color, age sex, religion, disability, medical condition, national origin, or marital status.</p>
                        
							<p class="clearfix">
								<label for="et_contact_name" class="et_contact_form_label"><?php esc_html_e('Name','Nimble'); ?></label>
								<input type="text" name="et_contact_name" value="<?php if ( isset($_POST['et_contact_name']) ) echo esc_attr($_POST['et_contact_name']); else esc_attr_e('Name','Nimble'); ?>" id="et_contact_name" class="input" />
							</p>
                            
							<p class="clearfix">
								<label for="et_contact_address" class="et_contact_form_label"><?php esc_html_e('Street Address','Nimble'); ?></label>
								<input type="text" name="et_contact_address" value="<?php if ( isset($_POST['et_contact_address']) ) echo esc_attr($_POST['et_contact_address']); else esc_attr_e('Street Address','Nimble'); ?>" id="et_contact_address" class="input" />
							</p>
                            
							<p class="clearfix">
								<label for="et_contact_city" class="et_contact_form_label"><?php esc_html_e('City','Nimble'); ?></label>
								<input type="text" name="et_contact_city" value="<?php if ( isset($_POST['et_contact_city']) ) echo esc_attr($_POST['et_contact_city']); else esc_attr_e('City','Nimble'); ?>" id="et_contact_city" class="input" />
							</p>
                            
                    	   
							<p>
								<label for="et_contact_state" class="et_contact_form_label"><?php esc_html_e('State','Nimble'); ?></label>
								<input type="text" name="et_contact_state" value="<?php if ( isset($_POST['et_contact_state']) ) echo esc_attr($_POST['et_contact_state']); else esc_attr_e('State','Nimble'); ?>" id="et_contact_state" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_zip" class="et_contact_form_label"><?php esc_html_e('Zip','Nimble'); ?></label>
								<input type="text" name="et_contact_zip" value="<?php if ( isset($_POST['et_contact_zip']) ) echo esc_attr($_POST['et_contact_zip']); else esc_attr_e('Zip','Nimble'); ?>" id="et_contact_zip" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_phone" class="et_contact_form_label"><?php esc_html_e('Phone','Nimble'); ?></label>
								<input type="text" name="et_contact_phone" value="<?php if ( isset($_POST['et_contact_phone']) ) echo esc_attr($_POST['et_contact_phone']); else esc_attr_e('Phone','Nimble'); ?>" id="et_contact_phone" class="input" />
							</p>
							
							<p>
								<label for="et_contact_email" class="et_contact_form_label"><?php esc_html_e('Email Address','Nimble'); ?></label>
								<input type="text" name="et_contact_email" value="<?php if ( isset($_POST['et_contact_email']) ) echo esc_attr($_POST['et_contact_email']); else esc_attr_e('Email Address','Nimble'); ?>" id="et_contact_email" class="input" />
							</p>
                            
                            <h3 style="margin:30px 0 20px 0;">Emergency Contact</h3>
                            
							<p>
								<label for="et_contact_em_name" class="et_contact_form_label"><?php esc_html_e('Name','Nimble'); ?></label>
								<input type="text" name="et_contact_em_name" value="<?php if ( isset($_POST['et_contact_em_name']) ) echo esc_attr($_POST['et_contact_em_name']); else esc_attr_e('Name','Nimble'); ?>" id="et_contact_em_name" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_em_phone" class="et_contact_form_label"><?php esc_html_e('Phone','Nimble'); ?></label>
								<input type="text" name="et_contact_em_phone" value="<?php if ( isset($_POST['et_contact_em_phone']) ) echo esc_attr($_POST['et_contact_em_phone']); else esc_attr_e('Phone','Nimble'); ?>" id="et_contact_em_phone" class="input" />
							</p>
							
							<p>
								<label for="et_contact_em_address" class="et_contact_form_label"><?php esc_html_e('Address','Nimble'); ?></label>
								<input type="text" name="et_contact_em_address" value="<?php if ( isset($_POST['et_contact_em_address']) ) echo esc_attr($_POST['et_contact_em_address']); else esc_attr_e('Address','Nimble'); ?>" id="et_contact_em_address" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_em_rel" class="et_contact_form_label"><?php esc_html_e('Relationship','Nimble'); ?></label>
								<input type="text" name="et_contact_em_rel" value="<?php if ( isset($_POST['et_contact_em_rel']) ) echo esc_attr($_POST['et_contact_em_rel']); else esc_attr_e('Relationship','Nimble'); ?>" id="et_contact_em_rel" class="input" />
							</p>
                            
                            <h3 style="margin:30px 0 20px 0;">About You</h3>
                            
							<p>
								<label for="et_contact_position" class="et_contact_form_label"><?php esc_html_e('I am applying for a position as a','Nimble'); ?></label>
								<input type="text" name="et_contact_position" value="<?php if ( isset($_POST['et_contact_position']) ) echo esc_attr($_POST['et_contact_position']); else esc_attr_e('I am applying for a position as a','Nimble'); ?>" id="et_contact_position" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_felony" class="et_contact_form_label"><?php esc_html_e('Have you ever been convicted of a felony?','Nimble'); ?></label>
                                <input type="text" name="et_contact_felony" value="<?php if ( isset($_POST['et_contact_felony']) ) echo esc_attr($_POST['et_contact_felony']); else esc_attr_e('Have you ever been convicted of a felony?','Nimble'); ?>" id="et_contact_felony" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_felony_yes" class="et_contact_form_label"><?php esc_html_e('If yes, please provide details. Enter NA if not applicable.','Nimble'); ?></label>
								<input type="text" name="et_contact_felony_yes" value="<?php if ( isset($_POST['et_contact_felony_yes']) ) echo esc_attr($_POST['et_contact_felony_yes']); else esc_attr_e('If yes, please provide details. Enter NA if not applicable.','Nimble'); ?>" id="et_contact_felony_yes" class="input" />
							</p>
                            
                            
                            <h3 style="margin:30px 0 20px 0;">Transportation</h3>
                            
                            <p>Many caregiver positions require the caregiver to transport a client.</p>
                            
							<p>
								<label for="et_contact_transportation" class="et_contact_form_label"><?php esc_html_e('Do you have dependable transportation?','Nimble'); ?></label>
								<input type="text" name="et_contact_transportation" value="<?php if ( isset($_POST['et_contact_transportation']) ) echo esc_attr($_POST['et_contact_transportation']); else esc_attr_e('Do you have dependable transportation?','Nimble'); ?>" id="et_contact_transportation" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_makemodel" class="et_contact_form_label"><?php esc_html_e('Make and model of car','Nimble'); ?></label>
								<input type="text" name="et_contact_makemodel" value="<?php if ( isset($_POST['et_contact_makemodel']) ) echo esc_attr($_POST['et_contact_makemodel']); else esc_attr_e('Make and model of car','Nimble'); ?>" id="et_contact_makemodel" class="input" />
							</p>
                            
                            <p>A driver license and proof of auto insurance will be required at time of hire.</p>
                            
							<p>
								<label for="et_contact_license" class="et_contact_form_label"><?php esc_html_e('Are you able to provide these?','Nimble'); ?></label>
								<input type="text" name="et_contact_license" value="<?php if ( isset($_POST['et_contact_license']) ) echo esc_attr($_POST['et_contact_license']); else esc_attr_e('Are you able to provide these?','Nimble'); ?>" id="et_contact_license" class="input" />
							</p>
                            
                            
                            <h3 style="margin:30px 0 20px 0;">Availability</h3>
                            
							<p>
								<label for="et_contact_hours" class="et_contact_form_label"><?php esc_html_e('Number of hours you would like to work','Nimble'); ?></label>
								<input type="text" name="et_contact_hours" value="<?php if ( isset($_POST['et_contact_hours']) ) echo esc_attr($_POST['et_contact_hours']); else esc_attr_e('Number of hours you would like to work','Nimble'); ?>" id="et_contact_hours" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_times" class="et_contact_form_label"><?php esc_html_e('Times you are available to work','Nimble'); ?></label>
								<input type="text" name="et_contact_times" value="<?php if ( isset($_POST['et_contact_times']) ) echo esc_attr($_POST['et_contact_times']); else esc_attr_e('Times you are available to work','Nimble'); ?>" id="et_contact_times" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_timesno" class="et_contact_form_label"><?php esc_html_e('Times you are not available to work','Nimble'); ?></label>
								<input type="text" name="et_contact_timesno" value="<?php if ( isset($_POST['et_contact_timesno']) ) echo esc_attr($_POST['et_contact_timesno']); else esc_attr_e('Times you are not available to work','Nimble'); ?>" id="et_contact_timesno" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_emergencycall" class="et_contact_form_label"><?php esc_html_e('Can you be called at the last minute in case of emergency?','Nimble'); ?></label>
								<input type="text" name="et_contact_emergencycall" value="<?php if ( isset($_POST['et_contact_emergencycall']) ) echo esc_attr($_POST['et_contact_emergencycall']); else esc_attr_e('Can you be called at the last minute in case of emergency?','Nimble'); ?>" id="et_contact_emergencycall" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_avail_comments" class="et_contact_form_label"><?php esc_html_e('Comments','Nimble'); ?></label>
								<input type="text" name="et_contact_avail_comments" value="<?php if ( isset($_POST['et_contact_avail_comments']) ) echo esc_attr($_POST['et_contact_avail_comments']); else esc_attr_e('Comments','Nimble'); ?>" id="et_contact_avail_comments" class="input" />
							</p>
                            
                            
                            <h3 style="margin:30px 0 20px 0;">Education</h3>
                            
                            <p>Enter NA if not applicable.</p>
                            
                            
							<p>
								<label for="et_contact_highschool" class="et_contact_form_label"><?php esc_html_e('High school','Nimble'); ?></label>
								<input type="text" name="et_contact_highschool" value="<?php if ( isset($_POST['et_contact_highschool']) ) echo esc_attr($_POST['et_contact_highschool']); else esc_attr_e('High school','Nimble'); ?>" id="et_contact_highschool" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_highschool_city" class="et_contact_form_label"><?php esc_html_e('High school city/state','Nimble'); ?></label>
								<input type="text" name="et_contact_highschool_city" value="<?php if ( isset($_POST['et_contact_highschool_city']) ) echo esc_attr($_POST['et_contact_highschool_city']); else esc_attr_e('High school city/state','Nimble'); ?>" id="et_contact_highschool_city" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_highschool_grad" class="et_contact_form_label"><?php esc_html_e('Did you graduate high school?','Nimble'); ?></label>
								<input type="text" name="et_contact_highschool_grad" value="<?php if ( isset($_POST['et_contact_highschool_grad']) ) echo esc_attr($_POST['et_contact_highschool_grad']); else esc_attr_e('Did you graduate high school?','Nimble'); ?>" id="et_contact_highschool_grad" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_colledge" class="et_contact_form_label"><?php esc_html_e('College','Nimble'); ?></label>
								<input type="text" name="et_contact_colledge" value="<?php if ( isset($_POST['et_contact_colledge']) ) echo esc_attr($_POST['et_contact_colledge']); else esc_attr_e('College','Nimble'); ?>" id="et_contact_colledge" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_colledge_city" class="et_contact_form_label"><?php esc_html_e('College city/state','Nimble'); ?></label>
								<input type="text" name="et_contact_colledge_city" value="<?php if ( isset($_POST['et_contact_colledge_city']) ) echo esc_attr($_POST['et_contact_colledge_city']); else esc_attr_e('College city/state','Nimble'); ?>" id="et_contact_colledge_city" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_colledge_degree" class="et_contact_form_label"><?php esc_html_e('College degree/major','Nimble'); ?></label>
								<input type="text" name="et_contact_colledge_degree" value="<?php if ( isset($_POST['et_contact_colledge_degree']) ) echo esc_attr($_POST['et_contact_colledge_degree']); else esc_attr_e('College degree/major','Nimble'); ?>" id="et_contact_colledge_degree" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_scholother" class="et_contact_form_label"><?php esc_html_e('Other School','Nimble'); ?></label>
								<input type="text" name="et_contact_scholother" value="<?php if ( isset($_POST['et_contact_scholother']) ) echo esc_attr($_POST['et_contact_scholother']); else esc_attr_e('Other School','Nimble'); ?>" id="et_contact_scholother" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_scholother_city" class="et_contact_form_label"><?php esc_html_e('Other school city/state','Nimble'); ?></label>
								<input type="text" name="et_contact_scholother_city" value="<?php if ( isset($_POST['et_contact_scholother_city']) ) echo esc_attr($_POST['et_contact_scholother_city']); else esc_attr_e('Other school city/state','Nimble'); ?>" id="et_contact_scholother_city" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_scholother_field" class="et_contact_form_label"><?php esc_html_e('Field of study','Nimble'); ?></label>
								<input type="text" name="et_contact_scholother_field" value="<?php if ( isset($_POST['et_contact_scholother_field']) ) echo esc_attr($_POST['et_contact_scholother_field']); else esc_attr_e('Field of study','Nimble'); ?>" id="et_contact_scholother_field" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_degrees" class="et_contact_form_label"><?php esc_html_e('Other degrees/certificates','Nimble'); ?></label>
								<input type="text" name="et_contact_degrees" value="<?php if ( isset($_POST['et_contact_degrees']) ) echo esc_attr($_POST['et_contact_degrees']); else esc_attr_e('Other degrees/certificates','Nimble'); ?>" id="et_contact_degrees" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_skills" class="et_contact_form_label"><?php esc_html_e('Special skills or courses','Nimble'); ?></label>
								<input type="text" name="et_contact_skills" value="<?php if ( isset($_POST['et_contact_skills']) ) echo esc_attr($_POST['et_contact_skills']); else esc_attr_e('Special skills or courses','Nimble'); ?>" id="et_contact_skills" class="input" />
							</p>
                            
                            
                            
                            <h3 style="margin:30px 0 20px 0;">Foreign Language</h3>
                            
                            
							<p>
								<label for="et_contact_language" class="et_contact_form_label"><?php esc_html_e('In what foreign languages, if any, are you proficient to speak, read or write?','Nimble'); ?></label>
								<input type="text" name="et_contact_language" value="<?php if ( isset($_POST['et_contact_language']) ) echo esc_attr($_POST['et_contact_language']); else esc_attr_e('In what foreign languages, if any, are you proficient to speak, read or write?','Nimble'); ?>" id="et_contact_language" class="input" />
							</p>
                            
                            
                            
                            <h3 style="margin:30px 0 20px 0;">Experience</h3>
                            
                            
							<p>
								<label for="et_contact_experience" class="et_contact_form_label"><?php esc_html_e('Discuss any training or experience working with the elderly','Nimble'); ?></label>
								<input type="text" name="et_contact_experience" value="<?php if ( isset($_POST['et_contact_experience']) ) echo esc_attr($_POST['et_contact_experience']); else esc_attr_e('Discuss any training or experience working with the elderly','Nimble'); ?>" id="et_contact_experience" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_like" class="et_contact_form_label"><?php esc_html_e('What would you like most about working with the elderly?','Nimble'); ?></label>
								<input type="text" name="et_contact_like" value="<?php if ( isset($_POST['et_contact_like']) ) echo esc_attr($_POST['et_contact_like']); else esc_attr_e('What would you like most about working with the elderly?','Nimble'); ?>" id="et_contact_like" class="input" />
							</p>
                            
							<p>
								<label for="et_contact_dislike" class="et_contact_form_label"><?php esc_html_e('What would you like least about working with the elderly?','Nimble'); ?></label>
								<input type="text" name="et_contact_dislike" value="<?php if ( isset($_POST['et_contact_dislike']) ) echo esc_attr($_POST['et_contact_dislike']); else esc_attr_e('What would you like least about working with the elderly?','Nimble'); ?>" id="et_contact_dislike" class="input" />
							</p>
                            
                            
                            <h3 style="margin:30px 0 20px 0;">Skills</h3>
                            
                            <p>Please indicate whether you have assisted with or performed the following tasks for seniors.</p>
                            
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                            
                            	<tr>
                                	<td width="30%">
                                	Companionship</td><td width="20%"><input type="radio" name="et_task_companionship" value="yes"/> Yes 
                                    				<input type="radio" name="et_task_companionship" value="no" checked/> No</td>
                                	<td width="30%">
                                	Bathing/dressing</td><td width="20%"><input type="radio" name="et_task_bathing" value="yes"/> Yes 
                                    				<input type="radio" name="et_task_bathing" value="no" checked/> No</td>
                                </tr>
                            	<tr>
                                	<td>
                                	Grooming</td><td><input type="radio" name="et_task_grooming" value="yes"/> Yes 
                                    				<input type="radio" name="et_task_grooming" value="no" checked/> No</td>
                                	<td>
                                	Incontinence</td><td><input type="radio" name="et_task_incontinence" value="yes"/> Yes 
                                    				<input type="radio" name="et_task_incontinence" value="no" checked/> No</td>
                                </tr>
                            	<tr>
                                	<td>
                                	Transfer assist</td><td><input type="radio" name="et_task_transfer" value="yes"/> Yes 
                                    				<input type="radio" name="et_task_transfer" value="no" checked/> No</td>
                                	<td>
                                	Vacuuming</td><td><input type="radio" name="et_task_vacuuming" value="yes"/> Yes 
                                    				<input type="radio" name="et_task_vacuuming" value="no" checked/> No</td>
                                </tr>
                            	<tr>
                                	<td>
                                	Dusting</td><td><input type="radio" name="et_task_dusting" value="yes"/> Yes 
                                    				<input type="radio" name="et_task_dusting" value="no" checked/> No</td>
                                	<td>
                                	Clean bathrooms</td><td><input type="radio" name="et_task_cleanbathroom" value="yes"/> Yes 
                                    				<input type="radio" name="et_task_cleanbathroom" value="no" checked/> No</td>
                                </tr>
                            	<tr>
                                	<td>
                                	Clean kitchen</td><td><input type="radio" name="et_task_cleankitchen" value="yes"/> Yes 
                                    				<input type="radio" name="et_task_cleankitchen" value="no" checked/> No</td>
                                	<td>
                                	Bed linen changes</td><td><input type="radio" name="et_task_changebed" value="yes"/> Yes 
                                    				<input type="radio" name="et_task_changebed" value="no" checked/> No</td>
                                </tr>
                            	<tr>
                                	<td>
                                	Laundry</td><td><input type="radio" name="et_task_laundry" value="yes"/> Yes 
                                    				<input type="radio" name="et_task_laundry" value="no" checked/> No</td>
                                	<td>
                                	Grocery shopping</td><td><input type="radio" name="et_task_grocery" value="yes"/> Yes 
                                    				<input type="radio" name="et_task_grocery" value="no" checked/> No</td>
                                </tr>
                            	<tr>
                                	<td>
                                	Cooking</td><td><input type="radio" name="et_task_cooking" value="yes"/> Yes 
                                    				<input type="radio" name="et_task_cooking" value="no" checked/> No</td>
                                	<td>
                                	Driving</td><td><input type="radio" name="et_task_driving" value="yes"/> Yes 
                                    				<input type="radio" name="et_task_driving" value="no" checked/> No</td>
                                </tr>
                            	<tr>
                                	<td>
                                	Medication reminders</td><td><input type="radio" name="et_task_meds" value="yes"/> Yes 
                                    				<input type="radio" name="et_task_meds" value="no" checked/> No</td>
                                	<td></td><td></td>
                                </tr>
                            
                            </table>
                            
                            
                            
                            <h3 style="margin:30px 0 20px 0;">Employment History</h3>
                            
                            <p>Please go back at least five years and tell us about your work history. Enter NA if not applicable.</p>
                            
                            <p>
								<label for="et_work_contact" class="et_contact_form_label"><?php esc_html_e('May we contact your current employer?','Nimble'); ?></label>
								<input type="text" name="et_work_contact" value="<?php if ( isset($_POST['et_work_contact']) ) echo esc_attr($_POST['et_work_contact']); else esc_attr_e('May we contact your current employer?','Nimble'); ?>" id="et_work_contact" class="input" />
							</p>
                            
                            
                            <p>&nbsp;</p>
                            
                            <p>
								<label for="et_work1_company" class="et_contact_form_label"><?php esc_html_e('Company','Nimble'); ?></label>
								<input type="text" name="et_work1_company" value="<?php if ( isset($_POST['et_work1_company']) ) echo esc_attr($_POST['et_work1_company']); else esc_attr_e('Company','Nimble'); ?>" id="et_work1_company" class="input" />
							</p>
                            
                            <p>
								<label for="et_work1_fromto" class="et_contact_form_label"><?php esc_html_e('From - To','Nimble'); ?></label>
								<input type="text" name="et_work1_fromto" value="<?php if ( isset($_POST['et_work1_fromto']) ) echo esc_attr($_POST['et_work1_fromto']); else esc_attr_e('From - To','Nimble'); ?>" id="et_work1_fromto" class="input" />
							</p>
                            
                            <p>
								<label for="et_work1_title" class="et_contact_form_label"><?php esc_html_e('Job title','Nimble'); ?></label>
								<input type="text" name="et_work1_title" value="<?php if ( isset($_POST['et_work1_title']) ) echo esc_attr($_POST['et_work1_title']); else esc_attr_e('Job title','Nimble'); ?>" id="et_work1_title" class="input" />
							</p>
                            
                            <p>
								<label for="et_work1_reasonleft" class="et_contact_form_label"><?php esc_html_e('Reason left','Nimble'); ?></label>
								<input type="text" name="et_work1_reasonleft" value="<?php if ( isset($_POST['et_work1_reasonleft']) ) echo esc_attr($_POST['et_work1_reasonleft']); else esc_attr_e('Reason left','Nimble'); ?>" id="et_work1_reasonleft" class="input" />
							</p>
                            
                            <p>
								<label for="et_work1_duties" class="et_contact_form_label"><?php esc_html_e('Duties','Nimble'); ?></label>
								<input type="text" name="et_work1_duties" value="<?php if ( isset($_POST['et_work1_duties']) ) echo esc_attr($_POST['et_work1_duties']); else esc_attr_e('Duties','Nimble'); ?>" id="et_work1_duties" class="input" />
							</p>
                            
                            <p>
								<label for="et_work1_supervisor" class="et_contact_form_label"><?php esc_html_e('Supervisor name & phone','Nimble'); ?></label>
								<input type="text" name="et_work1_supervisor" value="<?php if ( isset($_POST['et_work1_supervisor']) ) echo esc_attr($_POST['et_work1_supervisor']); else esc_attr_e('Supervisor name & phone','Nimble'); ?>" id="et_work1_supervisor" class="input" />
							</p>
                            
                            <p>&nbsp;</p>
                            
                            
                            <p>
								<label for="et_work2_company" class="et_contact_form_label"><?php esc_html_e('Company','Nimble'); ?></label>
								<input type="text" name="et_work2_company" value="<?php if ( isset($_POST['et_work2_company']) ) echo esc_attr($_POST['et_work2_company']); else esc_attr_e('Company','Nimble'); ?>" id="et_work2_company" class="input" />
							</p>
                            
                            <p>
								<label for="et_work2_fromto" class="et_contact_form_label"><?php esc_html_e('From - To','Nimble'); ?></label>
								<input type="text" name="et_work2_fromto" value="<?php if ( isset($_POST['et_work2_fromto']) ) echo esc_attr($_POST['et_work2_fromto']); else esc_attr_e('From - To','Nimble'); ?>" id="et_work2_fromto" class="input" />
							</p>
                            
                            <p>
								<label for="et_work2_title" class="et_contact_form_label"><?php esc_html_e('Job title','Nimble'); ?></label>
								<input type="text" name="et_work2_title" value="<?php if ( isset($_POST['et_work2_title']) ) echo esc_attr($_POST['et_work2_title']); else esc_attr_e('Job title','Nimble'); ?>" id="et_work2_title" class="input" />
							</p>
                            
                            <p>
								<label for="et_work2_reasonleft" class="et_contact_form_label"><?php esc_html_e('Reason left','Nimble'); ?></label>
								<input type="text" name="et_work2_reasonleft" value="<?php if ( isset($_POST['et_work2_reasonleft']) ) echo esc_attr($_POST['et_work2_reasonleft']); else esc_attr_e('Reason left','Nimble'); ?>" id="et_work2_reasonleft" class="input" />
							</p>
                            
                            <p>
								<label for="et_work2_duties" class="et_contact_form_label"><?php esc_html_e('Duties','Nimble'); ?></label>
								<input type="text" name="et_work2_duties" value="<?php if ( isset($_POST['et_work2_duties']) ) echo esc_attr($_POST['et_work2_duties']); else esc_attr_e('Duties','Nimble'); ?>" id="et_work2_duties" class="input" />
							</p>
                            
                            <p>
								<label for="et_work2_supervisor" class="et_contact_form_label"><?php esc_html_e('Supervisor name & phone','Nimble'); ?></label>
								<input type="text" name="et_work2_supervisor" value="<?php if ( isset($_POST['et_work2_supervisor']) ) echo esc_attr($_POST['et_work2_supervisor']); else esc_attr_e('Supervisor name & phone','Nimble'); ?>" id="et_work2_supervisor" class="input" />
							</p>
                            
                            <p>&nbsp;</p>
                            
                            
                            <p>
								<label for="et_work3_company" class="et_contact_form_label"><?php esc_html_e('Company','Nimble'); ?></label>
								<input type="text" name="et_work3_company" value="<?php if ( isset($_POST['et_work3_company']) ) echo esc_attr($_POST['et_work3_company']); else esc_attr_e('Company','Nimble'); ?>" id="et_work3_company" class="input" />
							</p>
                            
                            <p>
								<label for="et_work3_fromto" class="et_contact_form_label"><?php esc_html_e('From - To','Nimble'); ?></label>
								<input type="text" name="et_work3_fromto" value="<?php if ( isset($_POST['et_work3_fromto']) ) echo esc_attr($_POST['et_work3_fromto']); else esc_attr_e('From - To','Nimble'); ?>" id="et_work3_fromto" class="input" />
							</p>
                            
                            <p>
								<label for="et_work3_title" class="et_contact_form_label"><?php esc_html_e('Job title','Nimble'); ?></label>
								<input type="text" name="et_work3_title" value="<?php if ( isset($_POST['et_work3_title']) ) echo esc_attr($_POST['et_work3_title']); else esc_attr_e('Job title','Nimble'); ?>" id="et_work3_title" class="input" />
							</p>
                            
                            <p>
								<label for="et_work3_reasonleft" class="et_contact_form_label"><?php esc_html_e('Reason left','Nimble'); ?></label>
								<input type="text" name="et_work3_reasonleft" value="<?php if ( isset($_POST['et_work3_reasonleft']) ) echo esc_attr($_POST['et_work3_reasonleft']); else esc_attr_e('Reason left','Nimble'); ?>" id="et_work3_reasonleft" class="input" />
							</p>
                            
                            <p>
								<label for="et_work3_duties" class="et_contact_form_label"><?php esc_html_e('Duties','Nimble'); ?></label>
								<input type="text" name="et_work3_duties" value="<?php if ( isset($_POST['et_work3_duties']) ) echo esc_attr($_POST['et_work3_duties']); else esc_attr_e('Duties','Nimble'); ?>" id="et_work3_duties" class="input" />
							</p>
                            
                            <p>
								<label for="et_work3_supervisor" class="et_contact_form_label"><?php esc_html_e('Supervisor name & phone','Nimble'); ?></label>
								<input type="text" name="et_work3_supervisor" value="<?php if ( isset($_POST['et_work3_supervisor']) ) echo esc_attr($_POST['et_work3_supervisor']); else esc_attr_e('Supervisor name & phone','Nimble'); ?>" id="et_work3_supervisor" class="input" />
							</p>
                            
                            <p>&nbsp;</p>
                            
                            
                            <p>
								<label for="et_work4_company" class="et_contact_form_label"><?php esc_html_e('Company','Nimble'); ?></label>
								<input type="text" name="et_work4_company" value="<?php if ( isset($_POST['et_work4_company']) ) echo esc_attr($_POST['et_work4_company']); else esc_attr_e('Company','Nimble'); ?>" id="et_work4_company" class="input" />
							</p>
                            
                            <p>
								<label for="et_work4_fromto" class="et_contact_form_label"><?php esc_html_e('From - To','Nimble'); ?></label>
								<input type="text" name="et_work4_fromto" value="<?php if ( isset($_POST['et_work4_fromto']) ) echo esc_attr($_POST['et_work4_fromto']); else esc_attr_e('From - To','Nimble'); ?>" id="et_work4_fromto" class="input" />
							</p>
                            
                            <p>
								<label for="et_work4_title" class="et_contact_form_label"><?php esc_html_e('Job title','Nimble'); ?></label>
								<input type="text" name="et_work4_title" value="<?php if ( isset($_POST['et_work4_title']) ) echo esc_attr($_POST['et_work4_title']); else esc_attr_e('Job title','Nimble'); ?>" id="et_work4_title" class="input" />
							</p>
                            
                            <p>
								<label for="et_work4_reasonleft" class="et_contact_form_label"><?php esc_html_e('Reason left','Nimble'); ?></label>
								<input type="text" name="et_work4_reasonleft" value="<?php if ( isset($_POST['et_work4_reasonleft']) ) echo esc_attr($_POST['et_work4_reasonleft']); else esc_attr_e('Reason left','Nimble'); ?>" id="et_work4_reasonleft" class="input" />
							</p>
                            
                            <p>
								<label for="et_work4_duties" class="et_contact_form_label"><?php esc_html_e('Duties','Nimble'); ?></label>
								<input type="text" name="et_work4_duties" value="<?php if ( isset($_POST['et_work4_duties']) ) echo esc_attr($_POST['et_work4_duties']); else esc_attr_e('Duties','Nimble'); ?>" id="et_work4_duties" class="input" />
							</p>
                            
                            <p>
								<label for="et_work4_supervisor" class="et_contact_form_label"><?php esc_html_e('Supervisor name & phone','Nimble'); ?></label>
								<input type="text" name="et_work4_supervisor" value="<?php if ( isset($_POST['et_work4_supervisor']) ) echo esc_attr($_POST['et_work4_supervisor']); else esc_attr_e('Supervisor name & phone','Nimble'); ?>" id="et_work4_supervisor" class="input" />
							</p>
                            
                           
                            <h3 style="margin:30px 0 20px 0;">Business References</h3>
                            
                            
                            
                            <p>
								<label for="et_bizref1_name" class="et_contact_form_label"><?php esc_html_e('Name','Nimble'); ?></label>
								<input type="text" name="et_bizref1_name" value="<?php if ( isset($_POST['et_bizref1_name']) ) echo esc_attr($_POST['et_bizref1_name']); else esc_attr_e('Name','Nimble'); ?>" id="et_bizref1_name" class="input" />
							</p>
                            
                            <p>
								<label for="et_bizref1_address" class="et_contact_form_label"><?php esc_html_e('Address','Nimble'); ?></label>
								<input type="text" name="et_bizref1_address" value="<?php if ( isset($_POST['et_bizref1_address']) ) echo esc_attr($_POST['et_bizref1_address']); else esc_attr_e('Address','Nimble'); ?>" id="et_bizref1_address" class="input" />
							</p>
                            
                            <p>
								<label for="et_bizref1_rel" class="et_contact_form_label"><?php esc_html_e('Relationship/Years known','Nimble'); ?></label>
								<input type="text" name="et_bizref1_rel" value="<?php if ( isset($_POST['et_bizref1_rel']) ) echo esc_attr($_POST['et_bizref1_rel']); else esc_attr_e('Relationship/Years known','Nimble'); ?>" id="et_bizref1_rel" class="input" />
							</p>
                            
                            <p>
								<label for="et_bizref1_phone" class="et_contact_form_label"><?php esc_html_e('Local Phone #','Nimble'); ?></label>
								<input type="text" name="et_bizref1_phone" value="<?php if ( isset($_POST['et_bizref1_phone']) ) echo esc_attr($_POST['et_bizref1_phone']); else esc_attr_e('Local Phone #','Nimble'); ?>" id="et_bizref1_phone" class="input" />
							</p>
                            
                            <p>&nbsp;</p>
                            
                            <p>
								<label for="et_bizref2_name" class="et_contact_form_label"><?php esc_html_e('Name','Nimble'); ?></label>
								<input type="text" name="et_bizref2_name" value="<?php if ( isset($_POST['et_bizref2_name']) ) echo esc_attr($_POST['et_bizref2_name']); else esc_attr_e('Name','Nimble'); ?>" id="et_bizref2_name" class="input" />
							</p>
                            
                            <p>
								<label for="et_bizref2_address" class="et_contact_form_label"><?php esc_html_e('Address','Nimble'); ?></label>
								<input type="text" name="et_bizref2_address" value="<?php if ( isset($_POST['et_bizref2_address']) ) echo esc_attr($_POST['et_bizref2_address']); else esc_attr_e('Address','Nimble'); ?>" id="et_bizref2_address" class="input" />
							</p>
                            
                            <p>
								<label for="et_bizref2_rel" class="et_contact_form_label"><?php esc_html_e('Relationship/Years known','Nimble'); ?></label>
								<input type="text" name="et_bizref2_rel" value="<?php if ( isset($_POST['et_bizref2_rel']) ) echo esc_attr($_POST['et_bizref2_rel']); else esc_attr_e('Relationship/Years known','Nimble'); ?>" id="et_bizref2_rel" class="input" />
							</p>
                            
                            <p>
								<label for="et_bizref2_phone" class="et_contact_form_label"><?php esc_html_e('Local Phone #','Nimble'); ?></label>
								<input type="text" name="et_bizref2_phone" value="<?php if ( isset($_POST['et_bizref2_phone']) ) echo esc_attr($_POST['et_bizref2_phone']); else esc_attr_e('Local Phone #','Nimble'); ?>" id="et_bizref2_phone" class="input" />
							</p>
                            
                            <p>&nbsp;</p>
                            
                            <p>
								<label for="et_bizref3_name" class="et_contact_form_label"><?php esc_html_e('Name','Nimble'); ?></label>
								<input type="text" name="et_bizref3_name" value="<?php if ( isset($_POST['et_bizref3_name']) ) echo esc_attr($_POST['et_bizref3_name']); else esc_attr_e('Name','Nimble'); ?>" id="et_bizref3_name" class="input" />
							</p>
                            
                            <p>
								<label for="et_bizref3_address" class="et_contact_form_label"><?php esc_html_e('Address','Nimble'); ?></label>
								<input type="text" name="et_bizref3_address" value="<?php if ( isset($_POST['et_bizref3_address']) ) echo esc_attr($_POST['et_bizref3_address']); else esc_attr_e('Address','Nimble'); ?>" id="et_bizref3_address" class="input" />
							</p>
                            
                            <p>
								<label for="et_bizref3_rel" class="et_contact_form_label"><?php esc_html_e('Relationship/Years known','Nimble'); ?></label>
								<input type="text" name="et_bizref3_rel" value="<?php if ( isset($_POST['et_bizref3_rel']) ) echo esc_attr($_POST['et_bizref3_rel']); else esc_attr_e('Relationship/Years known','Nimble'); ?>" id="et_bizref3_rel" class="input" />
							</p>
                            
                            <p>
								<label for="et_bizref3_phone" class="et_contact_form_label"><?php esc_html_e('Local Phone #','Nimble'); ?></label>
								<input type="text" name="et_bizref3_phone" value="<?php if ( isset($_POST['et_bizref3_phone']) ) echo esc_attr($_POST['et_bizref3_phone']); else esc_attr_e('Local Phone #','Nimble'); ?>" id="et_bizref3_phone" class="input" />
							</p>
                            
                           
                            <h3 style="margin:30px 0 20px 0;">Personal References</h3>
                            
                            
                            
                            <p>
								<label for="et_ref1_name" class="et_contact_form_label"><?php esc_html_e('Name','Nimble'); ?></label>
								<input type="text" name="et_ref1_name" value="<?php if ( isset($_POST['et_ref1_name']) ) echo esc_attr($_POST['et_ref1_name']); else esc_attr_e('Name','Nimble'); ?>" id="et_ref1_name" class="input" />
							</p>
                            
                            <p>
								<label for="et_ref1_address" class="et_contact_form_label"><?php esc_html_e('Address','Nimble'); ?></label>
								<input type="text" name="et_ref1_address" value="<?php if ( isset($_POST['et_ref1_address']) ) echo esc_attr($_POST['et_ref1_address']); else esc_attr_e('Address','Nimble'); ?>" id="et_ref1_address" class="input" />
							</p>
                            
                            <p>
								<label for="et_ref1_rel" class="et_contact_form_label"><?php esc_html_e('Relationship/Years known','Nimble'); ?></label>
								<input type="text" name="et_ref1_rel" value="<?php if ( isset($_POST['et_ref1_rel']) ) echo esc_attr($_POST['et_ref1_rel']); else esc_attr_e('Relationship/Years known','Nimble'); ?>" id="et_ref1_rel" class="input" />
							</p>
                            
                            <p>
								<label for="et_ref1_phone" class="et_contact_form_label"><?php esc_html_e('Local Phone #','Nimble'); ?></label>
								<input type="text" name="et_ref1_phone" value="<?php if ( isset($_POST['et_ref1_phone']) ) echo esc_attr($_POST['et_ref1_phone']); else esc_attr_e('Local Phone #','Nimble'); ?>" id="et_ref1_phone" class="input" />
							</p>
                            
                            <p>&nbsp;</p>
                            
                            <p>
								<label for="et_ref2_name" class="et_contact_form_label"><?php esc_html_e('Name','Nimble'); ?></label>
								<input type="text" name="et_ref2_name" value="<?php if ( isset($_POST['et_ref2_name']) ) echo esc_attr($_POST['et_ref2_name']); else esc_attr_e('Name','Nimble'); ?>" id="et_ref2_name" class="input" />
							</p>
                            
                            <p>
								<label for="et_ref2_address" class="et_contact_form_label"><?php esc_html_e('Address','Nimble'); ?></label>
								<input type="text" name="et_ref2_address" value="<?php if ( isset($_POST['et_ref2_address']) ) echo esc_attr($_POST['et_ref2_address']); else esc_attr_e('Address','Nimble'); ?>" id="et_ref2_address" class="input" />
							</p>
                            
                            <p>
								<label for="et_ref2_rel" class="et_contact_form_label"><?php esc_html_e('Relationship/Years known','Nimble'); ?></label>
								<input type="text" name="et_ref2_rel" value="<?php if ( isset($_POST['et_ref2_rel']) ) echo esc_attr($_POST['et_ref2_rel']); else esc_attr_e('Relationship/Years known','Nimble'); ?>" id="et_ref2_rel" class="input" />
							</p>
                            
                            <p>
								<label for="et_ref2_phone" class="et_contact_form_label"><?php esc_html_e('Local Phone #','Nimble'); ?></label>
								<input type="text" name="et_ref2_phone" value="<?php if ( isset($_POST['et_ref2_phone']) ) echo esc_attr($_POST['et_ref2_phone']); else esc_attr_e('Local Phone #','Nimble'); ?>" id="et_ref2_phone" class="input" />
							</p>
                            
                            <h3 style="margin:30px 0 20px 0;">For our recruitment purposes</h3>
                            
                            
                            
                            <p>How did you hear about this position?</p>
                            
                             <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:10px;">
                            
                            	<tr>
                                	<td><input type="radio" name="et_heard" value="Internet"/> Internet 
                                    				<input type="radio" name="et_heard" value="Newspaper"/> Newspaper
                                    				<input type="radio" name="et_heard" value="Job_Board"/> Job Board
                                    				<input type="radio" name="et_heard" value="Employment_Office"/> Employment Office
                                    				<input type="radio" name="et_heard" value="Current_Employee"/> Current Employee
                                    </td>
                                </tr>
                                <tr><td><input type="radio" name="et_heard" value="Other"/> Other</td></tr>
							</table>
                            
                            
                            <p>
								<label for="et_heard_name" class="et_contact_form_label"><?php esc_html_e('Please provide specific name of entity checked above','Nimble'); ?></label>
								<input type="text" name="et_heard_name" value="<?php if ( isset($_POST['et_heard_name']) ) echo esc_attr($_POST['et_heard_name']); else esc_attr_e('Please provide specific name of entity checked above','Nimble'); ?>" id="et_heard_name" class="input" />
							</p>
                            
                            <p>&nbsp;</p>
                            
                            <p><strong>CERTIFICATION AND RELEASE:</strong> I certify that I have read and understand the application note on page one of this form and that the answers given by me to the foregoing questions and the statements made by me are complete and true to the best of my knowledge and belief. I understand that any false information, omissions, or misrepresentation of facts called for in this application may result in rejection of my application or discharge at any time during my employment. I authorize the company and/or its agents, including consumer reporting bureaus, to verify any information including, but not limited to, criminal history and motor vehicle driving records. I authorize all persons, schools, companies, and law enforcement authorities to release any information concerning my background and hereby release any said persons, schools, companies, and law enforcement authorities from any liability for any damage whatsoever for issuing this information. I also understand that the use of illegal drugs is prohibited during employment. If company policy requires, I am willing to submit to drug testing to detect the use of illegal drugs prior to and during employment.</p>
                            
                             <p>
								<label for="et_signature" class="et_contact_form_label"><?php esc_html_e('Signature (Enter your full name)','Nimble'); ?></label>
								<input type="text" name="et_signature" value="<?php if ( isset($_POST['et_heard_other']) ) echo esc_attr($_POST['et_signature']); else esc_attr_e('Signature (Enter your full name)','Nimble'); ?>" id="et_signature" class="input" />
							</p>
                            
						
						<h3 style="margin:30px 0 20px 0;">Security check</h3>
                        
                        <p class="clearfix">
								<?php 
									esc_html_e('Please enter the answer below: ','Nimble');	
									echo '<br/>';
									echo esc_attr($et_first_digit) . ' + ' . esc_attr($et_second_digit) . ' = ';
								?>
								<input type="text" name="et_contact_captcha" value="<?php if ( isset($_POST['et_contact_captcha']) ) echo esc_attr($_POST['et_contact_captcha']); ?>" id="et_contact_captcha" class="input" size="2" />
							</p>
                            
                            
						</div> <!-- #et_contact_left -->
						
						
						<div class="clear"></div>
							
						<input type="hidden" name="et_contactform_submit" value="et_contact_proccess" />
						
						<input type="reset" id="et_contact_reset" value="<?php esc_attr_e('Reset','Nimble'); ?>" />
						<input class="et_contact_submit" type="submit" value="<?php esc_attr_e('Submit','Nimble'); ?>" id="et_contact_submit" onclick="scrolltotop()" />
					</form>
				</div> <!-- end #et-contact -->
                
				
                
			</div> <!-- end #left-area -->	
			
			<?php get_sidebar(); ?>
		</div> <!-- end #content-area -->
	</div> <!-- end .container -->
</div> <!-- end #main-area -->
	
<?php get_footer(); ?>