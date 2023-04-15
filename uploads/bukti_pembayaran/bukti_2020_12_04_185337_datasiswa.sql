/*
SQLyog Professional
MySQL - 10.4.8-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `student` (
	`student_id` int (11),
	`name` text ,
	`birthday` text ,
	`age` text ,
	`place_birth` text ,
	`sex` text ,
	`m_tongue` text ,
	`religion` text ,
	`blood_group` text ,
	`address` text ,
	`city` text ,
	`state` text ,
	`nationality` text ,
	`phone` text ,
	`email` text ,
	`ps_attended` text ,
	`ps_address` text ,
	`ps_purpose` text ,
	`class_study` text ,
	`date_of_leaving` text ,
	`am_date` text ,
	`tran_cert` text ,
	`dob_cert` text ,
	`mark_join` text ,
	`physical_h` text ,
	`password` text ,
	`father_name` text ,
	`mother_name` text ,
	`class_id` text ,
	`section_id` int (11),
	`roll` text ,
	`transport_id` int (11),
	`house_id` int (11),
	`student_category_id` int (11),
	`club_id` int (11),
	`session` text ,
	`card_number` text ,
	`issue_date` text ,
	`expire_date` text ,
	`more_entries` text ,
	`login_status` text ,
	`dormitory_id` int (11),
	`hostel_room_id` int (11)
); 
insert into `student` (`student_id`, `name`, `birthday`, `age`, `place_birth`, `sex`, `m_tongue`, `religion`, `blood_group`, `address`, `city`, `state`, `nationality`, `phone`, `email`, `ps_attended`, `ps_address`, `ps_purpose`, `class_study`, `date_of_leaving`, `am_date`, `tran_cert`, `dob_cert`, `mark_join`, `physical_h`, `password`, `father_name`, `mother_name`, `class_id`, `section_id`, `roll`, `transport_id`, `house_id`, `student_category_id`, `club_id`, `session`, `card_number`, `issue_date`, `expire_date`, `more_entries`, `login_status`, `dormitory_id`, `hostel_room_id`) values('45','Udemy Student II','09/30/2003','16','Lagos','female','Mother Tongue','Muslim','B+','Address','City','Lagos','Canadian','+912345667','student@student.com','Previous school attended','Previous school address','Purpose Of Leaving','Class In Which Was Studying','2011-08-10','2011-08-19','Yes','Yes','Yes','No','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','','','2','3','5bf8161','0','1','2','1','2019-2020','','','','','0','2','2'),
('46','Zozibini Tunzi','10/31/2001','','1','male','1','Islam','1','a','a','a','a','aa','admin1@admin.com','aaaa','aaaa','aaa','aaa','2011-08-19','2011-08-19','No','Yes','Yes','Yes','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','','','2','3','08834e3','0','1','2','1','2020-2021','','','','','','2','2'),
('47','dafdada','11/15/2020','','1','male','1','1','1','1','1','1','1','1','twte@gmai.com','1','1','1','1','2011-08-19','2011-08-19','No','No','No','No','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','','','2','3','9abf636','0','1','2','1','2020-2021','','','','','','2','2'),
('48','Ika Nurjana','11/15/2020','','1','male','1','Islam','A+','f','f','a','1','aa','bqczccdxudzgbkvopp@tsyefn.com','aaaa','g','g','g','2011-08-19','2011-08-19','No','Yes','Yes','','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','','','2','3','4eee6dc','0','1','2','1','2020-2021','','','','','','2','2'),
('49','Zozibini Tunzi','11/15/2020','','1','male','1','1','1','1','1','1','1','','zozi@bini.com','1','1','1','1','2011-08-19','2011-08-19','Yes','Yes','Yes','Yes','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','','','2','4','1f97f92','0','1','2','1','2020-2021','','','','','','2','2');
