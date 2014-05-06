<?
class FilestackDirs {

    /** @var string */
    public $file;

    /** @var string */
    public $banner;

    /** @var string */
    public $img_full;

    /** @var string */
    public $thumb;


    /**
     * @param string $filestack
     * @param string $bannerstack
     * @param string $imgstack
     */
    public function __construct($filestack, $bannerstack, $imgstack) {
        $this->file = $filestack;
        $this->banner = $bannerstack;
        $this->thumbnail = $imgstack . "/thumb";
        $this->img_full  = $imgstack . "/full";
    }

}
