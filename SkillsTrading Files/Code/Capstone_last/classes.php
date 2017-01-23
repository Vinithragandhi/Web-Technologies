<?php
//inheritance concept is used, as the skilldetails table has username as the foreign key 
class SkillDetails extends UserDetails {
	public $UserName, $SkillName, $SkillCategory, $SkillDescription, $Skill2Name, $Skill2Category, $Skill2Description, $Skill3Name, $Skill3Category, $Skill3Description;
	
}

class UserDetails {
	public $UserName, $FirstName, $LastName, $Age, $Phone, $Email, $Password, $SecurityQuestion1, $SecurityQuestion2, $Answer1, $Answer2, $Address1, $Address2, $City, $State, $Zip, $Availability;
}
//inheritance concept is used, as the messagedetails table has the ToUser as the username from user table
class MessageDetails extends UserDetails {
	public $MessageID, $Message, $ToUser, $FromUser, $Timestamp, $Status;
}
