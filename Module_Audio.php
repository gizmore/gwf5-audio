<?php
final class Module_Audio extends GWF_Module
{
	public $module_priority = 30;
	
	public function getClasses() { return ['GDO_AudioFile', 'GDO_AudioIcon']; }
	
	public function getConfig()
	{
		return array(
			GDO_Path::make('lame_mp3_path')->initial('/usr/bin/lame')->label('lamemp3_path'),
		);
	}
	public function cfgLamePath() { return $this->getConfigValue('lame_mp3_path'); }

	####################
	### MP3File info ###
	####################
	public function mp3Info(GWF_File $file)
	{
		$this->includeClass('3p/MP3File');
		$mp3file = new MP3File($file->getPath());
		$duration = $mp3file->getDuration();
		$bitrate = $mp3file->getBitrate();
		return [$duration, $bitrate];
	}
}
