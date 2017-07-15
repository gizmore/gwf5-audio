<?php
final class GDO_AudioFile extends GDO_File
{
	public function __construct()
	{
		parent::__construct();
		$this->audioFile();
	}
	
	public function audioFile()
	{
		$this->mime('audio/mp3');
		$this->mime('audio/mpeg');
		return $this;
	}
	
	public function gdoAfterCreate()
	{
		$file = $this->getGDOValue();
		$info = Module_Audio::instance()->mp3Info($file);
		$file->saveVars(array(
			'file_duration' => $info[0],
			'file_bitrate' => $info[1],
		));
	}
	
}
