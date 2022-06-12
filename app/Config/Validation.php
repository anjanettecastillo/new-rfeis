<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
		\App\Validation\UserRules::class
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $users = [
        'first_name' => [
			'rules' => 'required|min_length[2]|max_length[100]',
			'label' => 'First name'
		],
        'last_name' => [
			'rules' => 'required|min_length[2]|max_length[100]',
			'label' => 'Last name'
		],
        'email_address' => [
			'rules' => 'required|min_length[5]|max_length[100]|valid_email',
			'label' => 'Email Address'
		],
        'username' => [
			'rules' => 'required|min_length[5]|max_length[100]|is_unique[frbs_users.username,id,{userID}]',
			'label' => 'Username'
		],
        'password' => [
			'rules' => 'required|min_length[8]|max_length[100]',
			'label' => 'Password'
		],
        'confirm_password' => [
			'rules' => 'matches[password]',
			'label' => 'Confirm Password'
		],
        'role_id' => [
			'rules' => 'required|numeric',
			'label' => 'Role',
			'errors' => [
				'numeric' => '{field} field is required.'
			]
		]    
	];

	public $roles = [
		'role_name' => [
			'rules' => 'required|min_length[3]|max_length[50]|is_unique[frbs_roles.role_name,id,{roleID}]',
			'label' => 'Role name',
			'errors' => [
                'is_unique' => 'Role already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description'
		]
	];

	public $modules = [
		'module' => [
			'rules' => 'required|min_length[5]|max_length[50]|is_unique[frbs_modules.module,id,{moduleID}]',
			'label' => 'Module',
			'errors' => [
                'is_unique' => 'Module already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description'
		]
	];

	public $tasks = [
		'task' => [
			'rules' => 'required|min_length[5]|max_length[50]|is_unique[frbs_tasks.task]',
			'label' => 'Task',
			'errors' => [
                'is_unique' => 'Task already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description'
		],

		'module_id' => [
			'rules' => 'required|numeric',
			'label' => 'Module',
			'errors' => [
				'numeric' => '{field} field is required.'
			]
		]  
	];

	public $departments = [
		'department' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Department',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description'
		],
	];

	public $eventTypes = [
		'event_type' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Event Types',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description'
		],
	];

	public $extensions = [
		'extension_name' => [
			'rules' => 'required|min_length[1]|max_length[10]',
			'label' => 'Extension Name',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description'
		],
	];

	public $levels = [
		'year' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Year',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description'
		],
	];

	public $organizationTypes = [
		'organization_type' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Organization Type',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description'
		],
	];

	public $positions = [
		'position' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Position',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description'
		],
	];

	public $remarks = [
		'reservation_remarks' => [
			'rules' => 'required|min_length[3]|max_length[50]',
			'label' => 'Reservation Remarks',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[3]|max_length[50]',
			'label' => 'Description'
		],
	];

	public $courses = [
		'course_name' => [
			'rules' => 'required|min_length[3]|max_length[100]',
			'label' => 'Course',
		],
		'description' => [
			'rules' => 'required|min_length[6]|max_length[100]',
			'label' => 'Description'
		],
	];

	public $organizations = [
		'organization_name' => [
			'rules' => 'required|min_length[2]|max_length[100]',
			'label' => 'Organization Name',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[6]|max_length[100]',
			'label' => 'Description'
		],
		'organization_type_id' => [
			'rules' => 'required|numeric',
			'label' => 'Organization Type',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
	];

	public $students = [
		'student_number' => [
			'rules' => 'required|max_length[15]|is_unique[frbs_students.student_number,id,{studentID}]',
			'label' => 'Student Number',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'last_name' => [
			'rules' => 'required|min_length[2]|max_length[50]',
			'label' => 'Last Name'
		],

		'first_name' => [
			'rules' => 'required|min_length[3]|max_length[50]',
			'label' => 'First Name'
		],

		'middle_name' => [
			'rules' => 'max_length[50]',
			'label' => 'Middle Name'
		],

		'email_address' => [
			'rules' => 'required|min_length[5]|max_length[50]|valid_email',
			'label' => 'Email Address'
		],

		'contact_number' => [
			'rules' => 'required|min_length[9]|max_length[50]|numeric',
			'label' => 'Contact Number'
		],

		'facebook_account' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Facebook Account'
		],

		'extension_name_id' => [
			'rules' => 'numeric',
			'label' => 'Extension Name',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],

		'year_id' => [
			'rules' => 'required|numeric',
			'label' => 'Year Level',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
		
		'course_id' => [
			'rules' => 'required|numeric',
			'label' => 'Course',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],

		'organization_id' => [
			'rules' => 'required|numeric',
			'label' => 'Course',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
	];

	public $faculties = [
		'employee_number' => [
			'rules' => 'required|min_length[7]|max_length[50]|is_unique[frbs_faculties.employee_number,id,{facultyID}]',
			'label' => 'Employee Number',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'last_name' => [
			'rules' => 'required|min_length[2]|max_length[50]',
			'label' => 'Last Name'
		],

		'first_name' => [
			'rules' => 'required|min_length[3]|max_length[50]',
			'label' => 'First Name'
		],

		'middle_name' => [
			'rules' => 'max_length[50]',
			'label' => 'Middle Name'
		],

		'email_address' => [
			'rules' => 'required|min_length[5]|max_length[50]|valid_email',
			'label' => 'Email Address'
		],

		'contact_number' => [
			'rules' => 'required|min_length[9]|max_length[50]|numeric',
			'label' => 'Contact Number'
		],

		'extension_name_id' => [
			'rules' => 'numeric',
			'label' => 'Extension Name',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],

		'position_id' => [
			'rules' => 'numeric',
			'label' => 'Position',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],

		'department_id' => [
			'rules' => 'numeric',
			'label' => 'Department',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
	];

	public $facilities = [
		'facility_code' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Facility Code',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'facility_name' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Facility Name',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'image' => [
			'rules' => 'uploaded[image]|max_size[image, 10240]|ext_in[image,png,jpg,gif]|is_image[image]', 
			'label' => 'Image'
		],
		'facility_status_id' => [
			'rules' => 'numeric',
			'label' => 'Facility Status',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
		'facility_fee' => [
			'rules' => 'numeric',
			'label' => 'Facility Fee',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
		'capacity' => [
			'rules' => 'numeric',
			'label' => 'Capacity',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
		'description' => [
			'rules' => 'required|min_length[6]|max_length[50]',
			'label' => 'Description',
		],
	];
	public $facilitiesEdit = [
		'facility_code' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Facility Code',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'facility_name' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Facility Name',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'facility_status_id' => [
			'rules' => 'numeric',
			'label' => 'Facility Status',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
		'facility_fee' => [
			'rules' => 'numeric',
			'label' => 'Facility Fee',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
		'capacity' => [
			'rules' => 'numeric',
			'label' => 'Capacity',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
		'description' => [
			'rules' => 'required|min_length[6]|max_length[50]',
			'label' => 'Description',
		],
	];

	public $reservations = [
		'reservation_code' => [
			'rules'  => 'required',
			'label' => 'Reservation Code',
		],
		'event_name' => [
			'rules'  => 'required|max_length[100]',
			'label' => 'Event Name',
		],
		'budget' => [
			'rules' => 'min_length[0]|max_length[50]|numeric|greater_than_equal_to[{initialFee}]',
			'label' => 'Budget',
			'errors' => [
                'greater_than_equal_to' => '{field} is not enough to cover the fees of the chosen facility.'      
            ]
		],
		'participants_count' => [
			'rules' => 'required|numeric|less_than_equal_to[{size}]',
			'label' => 'Number of Participants',
			'errors' => [
                'less_than_equal_to' => '{field} exceeds the maximum capacity of the chosen facility.'      
            ]
		],
		'reservation_date' => [
			'rules' => 'required',
			'label' => 'Reservation Date',
		],
		'reservation_starting_time' => [
			'rules' => 'required',
			'label' => 'Reservation starting time',
		],
		'reservation_end_time' => [
			'rules' => 'required',
			'label' => 'Reservation end time',
		],
		'organization_id' => [
			'rules' => 'numeric',
			'label' => 'Organization',
			'errors' => [
                'numeric' => '{field} field is required'      
            ]
		],
		'course_id' => [
			'rules' => 'numeric',
			'label' => 'Course',
			'errors' => [
                'numeric' => '{field} field is required'      
            ]
		],
		'event_type_id' => [
			'rules' => 'numeric',
			'label' => 'Event Type',
			'errors' => [
                'numeric' => '{field} field is required'      
            ]
		],
		'facility_id' => [
			'rules' => 'numeric',
			'label' => 'Facility',
			'errors' => [
                'numeric' => '{field} field is required'      
            ]
		],
		'faculty_id' => [
			'rules' => 'numeric',
			'label' => 'Faculty',
			'errors' => [
                'numeric' => '{field} field is required'      
            ]
		],
	];

	public $facilityStatus = [
		'facility_status' => [
			'rules' => 'required|min_length[3]|max_length[50]',
			'label' => 'Facility Status',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[3]|max_length[50]',
			'label' => 'Description'
		],
	];
	public $equipmentStatus = [
		'equipment_status' => [
			'rules' => 'required|min_length[3]|max_length[50]',
			'label' => 'Equipment Status',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[3]|max_length[50]',
			'label' => 'Description'
		],
	];
	public $equipmentConditions = [
		'equipment_condition' => [
			'rules' => 'required|min_length[3]|max_length[50]',
			'label' => 'Equipment Condition',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[3]|max_length[50]',
			'label' => 'Description'
		],
	];

	public $equipments = [
		'equipment_code' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Equipment Code',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'equipment_name' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Equipment Name',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'image' => [
			'rules' => 'uploaded[image]|max_size[image, 10240]|ext_in[image,png,jpg,gif]|is_image[image]', 
			'label' => 'Image'
		],
		'status_id' => [
			'rules' => 'numeric',
			'label' => 'Equipment Status',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
		'condition_id' => [
			'rules' => 'numeric',
			'label' => 'Equipment Condition',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
		'quantity' => [
			'rules' => 'numeric',
			'label' => 'Quantity',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description',
		],
	];
	public $equipmentsEdit = [
		'equipment_code' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Equipment Code',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'equipment_name' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Equipment Name',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'status_id' => [
			'rules' => 'numeric',
			'label' => 'Equipment Status',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
		'condition_id' => [
			'rules' => 'numeric',
			'label' => 'Equipment Condition',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
		'quantity' => [
			'rules' => 'numeric',
			'label' => 'Quantity',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description',
		],
	];
	public $borrowedEquipments = [
		'reservation_id' => [
			'rules' => 'required|numeric',
			'label' => 'Reserved Event'
		],
		'equipments' => [
			'rules' => 'required|numeric',
			'label' => 'Equipment'
		]
	];

	public $permissionTypes = [
		'type' => [
			'rules' => 'required',
			'label' => 'Permission Type'
		],
		'slug' => [
			'rules' => 'required',
			'label' => 'Slug'
		]
	];

	public $permissions = [
		'module_id' => [
			'rules' => 'required|numeric',
			'label' => 'Module',
			'errors' => [
				'numeric' => '{field} is required.'
			]
		],
		'permission_type' => [
			'rules' => 'required|numeric',
			'label' => 'Permission Type',
			'errors' => [
				'numeric' => '{field} is required.'
			]
		],
		'permission' => [
			'rules' => 'required',
			'label' => 'Permission'
		],
		'slug' => [
			'rules' => 'required',
			'label' => 'Slug'
		],
		'icon' => [
			'rules' => 'required',
			'label' => 'Icon'
		]
	];

	public $image = [
		'receipt' => [
			'rules' => 'uploaded[receipt]|max_size[receipt, 10240]', 
			'label' => 'receipt'
		],
	];

	public $report = [
		'facility_id' => [
			'rules' => 'numeric',
			'label' => 'Facility'
		],
		'starting_date' => [
			'rules' => 'required',
			'label' => 'Start Date'
		],
		'ending_date' => [
			'rules' => 'required',
			'label' => 'End Date'
		],
	];

	public $officers = [
		'student_number' => [
			'rules' => 'required|max_length[15]|is_unique[frbs_students.student_number,id,{studentID}]',
			'label' => 'Student Number',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'last_name' => [
			'rules' => 'required|min_length[2]|max_length[50]',
			'label' => 'Last Name'
		],

		'first_name' => [
			'rules' => 'required|min_length[3]|max_length[50]',
			'label' => 'First Name'
		],

		'middle_name' => [
			'rules' => 'max_length[50]',
			'label' => 'Middle Name'
		],

		'position' => [
			'rules' => 'required|min_length[2]|max_length[50]',
			'label' => 'Position'
		],
	];
}
