<?php
return [ 
		'menu' => [ 
				'Dashboard' => '#',
				'CV and Cover Letters' => [ 
						'Create a CV' => \URL::route ( 'candidate.cv.create' ),
						'My CV' => \URL::route ( 'candidate.cvs' ),
						'Create a Cover Letter' => '#',
						'My Cover Letter' => '#' 
				],
				'Jobs' => [ 
						'Recommended Jobs' => '#',
						'Job Alert' => '#',
						'Saved Jobs' => '#',
						'Application History' => '#' 
				],
				'Career Guide' => [ 
						'How to write CV' => '#',
						'How to write Cover letter' => '#',
						'How to apply job' => '#' 
				],
				'Feature' => [ 
						'Companies' => '#',
						'Agencies' => '#' 
				],
				'Account Setting' => [ 
						'My Profile' => URL::route ( 'candidate.cv.profile' ),
						'Change Email' => '#',
						'Change Password' => '#',
						'Logout' => \URL::route ( 'user.logout' ) 
				] 
		] 
];

?>