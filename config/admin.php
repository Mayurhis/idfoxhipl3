<?php
   
return [
    'approval_method'       => [
        'automatic'             => 'Automatic',
        'manual'                => 'Manual',
        'zignsec'               => 'Zignsec'
    ],
    'upload_option_type'    => [
        'photo_id_image'        => 'Photo Id Image',
        // 'liveliness_image'      => 'Liveliness Image',
        'address_proof_image'   => 'Address Proof Image'
    ],

    'customer_status'       => [
        'pending'               => 'Pending',
        'approved'              => 'Approved',
        'rejected'              => 'Rejected'
    ],
    'gender'                => [
        'male'                  =>  'Male',
        'female'                =>  'Female',
        'not_specified'         =>  'Not Specified'
    ],
    'email_template_status' => [
        'Active'                  =>  '1',
        'In-active'                =>  '0'
    ],
    'kyc_configuration_status' => [
        '1'     =>  'Active',
        '0'     =>  'In-active'
    ],
    'kyc_configurations' => [
        'basic_details'         =>  'Basic Details',
        'photo_id_image'        =>  'Photo ID',
        'liveliness_image'      =>  'Liveliness Image',
        'address_image'         =>  'Address Image'
    ]
    
];
