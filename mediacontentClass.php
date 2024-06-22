<?php
class MediaContent{
    public $Contentid;
    public $contentType;
    public $contentName;
    public function __construct($Contentid,$contentType,$contentName) {
        $this->Contentid = $Contentid;
        $this->contentType = $contentType;
        $this->contentName = $contentName;
    }
}