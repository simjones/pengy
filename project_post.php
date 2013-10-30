<?php

class ProjectPost
{

public $id;
public $projectName;
public $organizer;
public $dateStarted;
public $dateEnded;
public $assignTo;
public $comments;
public $status;

function __construct($inId=null, $inProjectName=null, $inOrganizer=null, $inDateStart=null, $inDateEnd=null, $inAssignTo=null, $inComments=null, $inStatus=null)
{
	if (!empty($inId))
	{
		$this->id = $inId;
	}
	if (!empty($inProjectName))
	{
		$this->projectName = $inProjectName;
	}
	
	if (!empty($inOrganizer))
	{
		$this->organizer = $inOrganizer;
	}
	
	if (!empty($inDateStart))
	{
		$splitDate = explode("-", $inDateStart);
		$this->dateStarted = $splitDate[1] . "/" . $splitDate[2] . "/" . $splitDate[0];
	}
	
	if (!empty($inDateEnd))
	{
		$splitDate = explode("-", $inDateEnd);
		$this->dateEnded = $splitDate[1] . "/" . $splitDate[2] . "/" . $splitDate[0];
	}

	if (!empty($inAssignTo))
	{
		$this->organizer = $inOrganizer;
	}
	
	if (!empty($inComments))
	{
		$this->comments = $inComments;
	}
	if (!empty($inStatus))
	{
		$this->status = $inStatus;
	}

}

}

?>
