<?
class FilestackDirs {

    /** @var string */
    private $original;

    /** @var string */
    private $thumbnail;


    /**
     * @param string $original
     * @param string $thumbnail
     */
    public function __construct($original, $thumbnail) {
        $this->original = $original;
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return string
     */
    public function getOriginal() {
        return $this->original;
    }
)
    /**
     * @return string
     */
    public function getThumbnail() {
        return $this->thumbnail;
    }
