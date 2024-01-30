<?php

return [
    'upload-options'     => [
        'title'          => 'Upload Option',
        'sidebar_title'  => 'Upload Options',
        'list_name'      => 'Upload Option List',
        'fields'         => [
            'title'             => 'Title',
            'upload_type'       => 'Upload Type',
            'default_document'  => 'Default Document',
            'country_residence' => 'Country of Residence',
        ],
    ],
    'customer'     => [
        'title'          => 'Customers',
        'title_singular' => 'Customer',
        'fields'         => [
            'dob'                               => 'Date of Birth',
            'address'                           => 'Address',
            'address_line_1'                    => 'Address Line 1',
            'address_line_2'                    => 'Address Line 2',
            'city'                              => 'City',
            'post_code'                         => 'Post Code',
            'email'                             => 'Email',
            'mobile_number'                     => 'Mobile Number',
            'mobile-sms'                        => 'Mobile - SMS',
            'status'                            => 'Status',
            'kyc_status'                        => 'KYC Status',
            'first_name'                        => 'First Name - Legal',
            'middle_name'                       => 'Middle Name - Legal',
            'prefix'                            => 'Name Prefix',
            'suffix'                            => 'Name Suffix',
            'gender'                            => 'Gender',
            'last_name'                         => 'Last Name - Legal',
            'country_residence'                 => 'Country of Residence',
            'approval_type'                     => 'Approval Type',
            'region'                            => 'Region',
            'prefix_placeholder'                => 'Prefix',
            'first_name_placeholder'            => 'First Name',
            'middle_name_placeholder'           => 'Middle Name',
            'suffix_placeholder'                => 'Suffix',
            'last_name_placeholder'             => 'Last Name',
            'dob_placeholder'                   => 'YYYY-MM-DD',  
        ],
        'id_photograph_heading' => 'Photo of ID Photograph any of these',
        'address_proof_heading' => 'Address proof any of these',
        'live_photo'            => 'Live Photo'

    ],
    'brand'     => [
        'title'          => 'Brands',
        'title_singular' => 'Brand',
        'fields'         => [
            'domain_name'               => 'Domain Name',
            'company_name'              => 'Company Name',
            'company_name_heading'      => 'The name you would like to show at the top of your KYC module',
            'display_company'           => 'Display Company',
            'display_company_heading'   => 'Would you like to include your Company in the module?',
            'company_logo'              => 'Company Logo',
            'company_logo_heading'      => 'Would you like to include your logo in the module?',
            'upload_logo'               => 'Upload Logo',
            'upload_logo_note'          => 'We accept PNG with transparent backgrounds or preferably SVG file types. A square logo 1:1 fits the frame best. The logo should not be greater than 70 * 70px.',
            'theme'                     => 'Theme',
            'theme_heading'             => 'Choose a theme that works and compliments your brand',
            'theme_note'                => "The KYC interface is designed and styled to use psychological triggers and urgency programming to draw the customer's attention, speed up the KYC process and encourage completion. Each theme achieves this goal",
            'accent_colour'             => 'Accent Colour',
            'apply_hex_colour'          => 'Apply HEX colour code',
            'accent_colour_heading'     => 'Your brand colour distinguishes your unique identity. Enter your HEX colour code below',
            'select_other_color'        => 'Or select a popular colour from the options below that matches your brand colour',
            'button_colour'             => 'Button Colour',
            'button_colour_heading'     => 'Choose a main button colour that compliments your accent colour',
            'default_language'          => 'Default Language',
            'default_language_heading'  => 'If most of your customers are from a specific region, 
            select a default language from the list below. Customers will always be able to change the language setting as needed',
            'approval_method'           => 'Approval Method',
            'approval_method_heading'   => 'select a approval method from the list below. Customers will always be able to change the approval method  as needed',
        ],
    ],
    'kyc_request'     => [
        'title'                         => 'KYC Requests',
        'title_singular'                => 'KYC Request',
        'last7daysKYC'                  => 'Last 7 days KYC',
        'kyc_theme'                     => 'KYC Theme',   
        'kyc_theme_configurator'        => 'KYC Theme Configurator',   
        'kyc_subtitle_1'                => 'The idFOX configurator helps you design a solution that feels unique and compliments your brand. Please use the configurable elements, colour settings and options to style and customise the KYC module',
        'kyc_subtitle_2'                => 'The sample modules to the right will help guide you in creating and customising a specialised aesthetic and on-brand solution',
    ],
    'email-templates'     => [
        'title'          => 'Email Template',
        'sidebar_title'  => 'Email Templates',
        'list_name'      => 'Email Template List',
        'fields'         => [
            'title'       => 'Title',
            'subject'     => 'Subject',
            'email_body'  => 'Email Body',
            'short_codes' => 'Short Codes',
            'status'      => 'Status'
        ],
    ],
    'customer-front-form'     => [
        'continue'                              => 'Continue',
        'to_agree_to_the'                       =>   'to agree to the',
        'terms_n_conditions'                    => 'Terms & Conditions',
        'verify_identity'                       => 'so we can verify your identity',
        'cancel_verification'                   => 'Cancel Identity Verification',
        'born_on'                               => 'Born on',
        'is_this_you'                           => 'Is this you?',
        'yes_correct'                           => 'Yes, correct',
        'any_clear_photo'                       => 'clear photo',
        'photo_of_id'                           => 'Photo of ID',
        'any_photograph'                        => ' Photograph any of these',
        'clear_photo'                           => 'clear photo',
        'upload_id_pic'                         => 'Upload ID Pic',
        'default_pic_name'                      => 'abcd.jpg',
        'no_camera_access'                      => 'No camera access?',
        'we_highly_recommend'                   => 'We HIGHLY recommend',
        'switching_devices'                     => 'switching devices',
        'successfull_id_verification'           => 'to ensure successful ID verification',
        'upload_photo_from_device'              => 'ALTERNATIVELY,  upload a photo from this device to continue',
        'our_verification_system_supports'      => 'Our verification system supports',
        'liveness_photo'                        => 'Liveness Photo',
        'face_pic'                              => 'Next, a face pic',
        'take_photo'                            => 'Take Photo',
        'face_pic'                              => 'Upload Face Pic',
        'upload_face_pic'                       => 'Please upload a photo of your face to continue',
        'proof_of_address'                      => 'Proof of Address',
        'upload_any_of_these'                   => 'Upload any of these',
        'upload_image'                          => 'Upload Image',
        'address_proof_following_part_1'        => 'The following documents are acceptable as proof of address. They need to show your',
        'address_proof_following_part_2'        => 'Full Name, Address, Issue Date and Account Number',
        'bank_statement'                        => 'Bank Statement',
        'utility_bill'                          => 'Utility Bill',
        'gas_water_phone'                       => '(gas, electricity, water, phone)', 
        'photographic_id'                       => 'Photographic ID showing Address',
        'tax_assessment'                        => 'Tax Assessment',
        'mortgage_statement'                    => 'Mortgage Statement',
        'voter_registration_document'           => 'Voter Registration Document',
        'receipt_of_benefits'                   => 'Receipt of Benefits Government Document',
        'pension_unemployment'                  => '(pension, unemployment, housing benefits, etc)',
        'id_verification_complete'              => 'ID Verification Complete',
        'id_verificaton_complete_heading_1'     => 'We have everything we need',
        'id_verificaton_complete_heading_2'     => 'You will be notified once your Identity is Verified',
        'name_of_merchant'                      => 'Name of Merchant',
        'one_time_id_verification'              => 'One-time ID Verification',
        
        

    ],
    'cancel-verification'=>[
        'cancel_verification'       => 'Cancel ID Verification',
        'warning'                   => 'WARNING!',
        'heading_1'                 => 'If you cancel this verification, you will need to start over again',
        'heading_2'                 => 'Legal regulations require us to verify your identity. This is to prevent fraudulent transactions or money laundering',
        'heading_3'                 => 'Identity verification allows merchants to transact with you, knowing it is actually you making the transaction',
        'heading_4'                 => 'Identity verification takes less than 2 minutes. You only ever have to verify ONCE!',
        'heading_5'                 => 'It\'s easy, verify NOW...',
        'verify_your_id'            => 'Verify your ID',
    ],
    'terms-n-conditions' =>[
        'heading_1'                 => '2 minutes to verify information!',
        'heading_2'                 => 'Instant one-time ID verification is a legally required regulatory step of the merchant gateway.',
        'heading_3'                 => 'This identity verification is directed by idFOX on behalf of the merchant gateway, ensuring a seamless exchange. idFOX carefully safeguards your personal information and privacy.',
        'heading_4'                 => 'A safe, secure, fast and efficient verification!',
        'heading_5'                 => 'Should you want more details or legal speak, please review our',
        'easy_fast'                 => 'Easy, Fast, Once!',    
        'legal_centre'              => 'legal_centre'


    ],
];