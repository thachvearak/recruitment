<?php
return [ 
		'menu' => [ 
				'Dashboard' => \URL::route ( 'employer' ),
				'Manage Jobs' => [ 
						'Post New Job' => \URL::route ( 'employer.job-post', Auth::user ()->id ),
						'Jobs List' => \URL::route ( 'employer.job-list', Auth::user ()->id ) 
				],
				'Candidates' => [ 
						'Applied List' => '#',
						'CV Search' => '#',
						'Your Favorite CV' => '#' 
				// 'Recommend CV' => '#',
				// 'Product & Service' => [
				// 'Select a Plan' => '#',
				// 'Your Credit' => '#',
				// 'Plan History' => '#',
				// ],
				],
				'Feature' => [ 
						'Companies' => '#',
						'Agencies' => '#' 
				],
				'Account Setting' => [ 
						'My Profile' => '#',
						'Change Email' => '#',
						'Change Password' => '#',
						'Logout' => \URL::route ( 'user.logout' ) 
				] 
		] 
];
?>