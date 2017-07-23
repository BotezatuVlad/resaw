<?php

/*
 * (c) Vlad Botezatu <botezatu.vlad@yahoo.com>
 *
 * This source file is subject to the GNU GPLv3 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace freshcode\Resaw;

class Resaw
{
	#----------------------------------------
	#	constants
	#----------------------------------------
	/**
	 * Default export height
	 */
	const EXPORT_DEFAULT_HEIGHT = 540;
	
	/**
	 * Ddefault export width
	 */
	const EXPORT_DEFAULT_WIDTH = 960;
	
	/**
	 * Export in GD
	 */
	const EXPORT_GD = 'GD';
	
	/**
	 * Export in GD 2
	 */
	const EXPORT_GD2 = 'GD2';
	
	/**
	 * Export as JPG
	 */
	const EXPORT_JPG = 'JPG';
	
	/**
	 * Export as PNG
	 */
	const EXPORT_PNG = 'PNG';
	
	/**
	 * Export as Wireless Bitmap
	 */
	const EXPORT_WBMP = 'WBMP';
	
	/**
	 * Export as WebP
	 */
	const EXPORT_WEBP = 'WEBP';
	
	/**
	 * Export as XBM image
	 */
	const EXPORT_XBM = 'XBM';
	
	/**
	 * Path base name
	 */
	const PATHINFO_BASENAME = 'basename';
	
	/**
	 * Path folder name
	 */
	const PATHINFO_DIRNAME = 'dirname';
	
	/**
	 * Path extension
	 */
	const PATHINFO_EXTENSION = 'extension';
	
	/**
	 * Path file name
	 */
	const PATHINFO_FILENAME = 'filename';
	
	/**
	 * Crop the image
	 */
	const RESIZE_CROP = 'CROP';
	
	/**
	 * Copy the
	 */
	const RESIZE_DUPLICATE = 'DUPLICATE';
	
	/**
	 * Resize and crop the image
	 */
	const RESIZE_SCALE_CROP = 'SCALE_CROP';
	
	/**
	 * Scale the image
	 */
	const RESIZE_SCALE = 'SCALE';
	
	/**
	 * Ddefault horizontal margin
	 */
	const WATERMARK_DEFAULT_HORIZONTAL_MARGIN = 10;
	
	/**
	 * The default thext to be written on the watermark
	 */
	const WATERMARK_DEFAULT_TEXT = 'WATERMARK';
	
	/**
	 * The default text color for the watermark
	 */
	const WATERMARK_DEFAULT_TEXT_COLOR = 0xFFFFFF;
	
	/**
	 * Default vertical margin
	 */
	const WATERMARK_DEFAULT_VERTICAL_MARGIN = 10;
	
	/**
	 * Watermark position bottom left
	 */
	const WATERMARK_POSITION_BOTTOM_LEFT = 'BOTTOM_LEFT';
	
	/**
	 * Watermark position bottom right
	 */
	const WATERMARK_POSITION_BOTTOM_RIGHT = 'BOTTOM_RIGHT';
	
	/**
	 * Watermark position center
	 */
	const WATERMARK_POSITION_CENTER = 'CENTER';
	
	/**
	 * Watermark position top left
	 */
	const WATERMARK_POSITION_TOP_LEFT = 'TOP_LEFT';
	
	/**
	 * Watermark position top right
	 */
	const WATERMARK_POSITION_TOP_RIGHT = 'TOP_RIGHT';
	
	/**
	 * Stores the default watermark height
	 */
	const WATERMARK_SIZE_HEIGHT = 70;
	
	/**
	 * Stores the default watermark height
	 */
	const WATERMARK_SIZE_WIDTH = 100;
	
	/**
	 * Watermark type image
	 */
	const WATERMARK_TYPE_IMAGE = 'IMAGE';
	
	/**
	 * Watermark type image pattern
	 */
	const WATERMARK_TYPE_IMAGE_PATTERN = 'IMAGE_PATTERN';
	
	/**
	 * Watermark type text
	 */
	const WATERMARK_TYPE_TEXT = 'TEXT';
	
	/**
	 * Watermark type text pattern
	 */
	const WATERMARK_TYPE_TEXT_PATTERN = 'TEXT_PATTERN';
	
	
	#----------------------------------------
	#	public properties
	#----------------------------------------
	/**
	 * Default export image height
	 *
	 * @var int
	 */
	public $exportedImageHeight = self::EXPORT_DEFAULT_HEIGHT;
	
	/**
	 * Default export image width
	 *
	 * @var int
	 */
	public $exportedImageWidth = self::EXPORT_DEFAULT_WIDTH;
	
	/**
	 * Exported file path
	 *
	 * @var mixed
	 */
	public $exportedPath;
	
	/**
	 * Exported image quality
	 *
	 * @var int
	 */
	public $exportedQuality = 72;
	
	/**
	 * Stores the type of export
	 *
	 * @var string
	 */
	public $exportType = self::EXPORT_JPG;
	
	/**
	 * Stores the resize type
	 *
	 * @var string
	 */
	public $resizeType = self::RESIZE_DUPLICATE;
	
	/**
	 * Stores the path to the uploaded file
	 *
	 * @var string
	 */
	public $uploadedImagePath;
	
	/**
	 * Stores watermark details
	 *
	 * It can be a string or an array o strings, each line will be put on it's own.
	 * It also can be the path to an image
	 *
	 * @var mixed {[] | string}
	 */
	public $watermark;
	
	/**
	 * Stores the default watermark height
	 *
	 * @var int
	 */
	public $watermarkHeight = self::WATERMARK_SIZE_HEIGHT;
	
	/**
	 * Watermark horizontal margin
	 *
	 * used only for sigle watermarks
	 *
	 * @var int
	 */
	public $watermarkHorizontalMargin = self::WATERMARK_DEFAULT_HORIZONTAL_MARGIN;
	
	/**
	 * Store watermark position
	 *
	 * @var string
	 */
	public $watermarkPosition = self::WATERMARK_POSITION_BOTTOM_RIGHT;
	
	/**
	 * Watermark text color
	 *
	 * @var string
	 */
	public $watermarkTextColor = self::WATERMARK_DEFAULT_TEXT_COLOR;
	
	/**
	 * Store a boolean value about an gif image beeing animated
	 *
	 * @var boolean
	 */
	public $watermarkType = null;
	
	/**
	 * Watermark vertical margin
	 *
	 * used only for sigle watermarks
	 *
	 * @var int
	 */
	public $watermarkVerticalMargin = self::WATERMARK_DEFAULT_VERTICAL_MARGIN;
	
	/**
	 * Stores the default watermark width
	 *
	 * @var int
	 */
	public $watermarkWidth = self::WATERMARK_SIZE_WIDTH;
	
	/**
	 * Use transparency when applying watermark
	 *
	 * @var int
	 */
	public $watermarkWithTransparency = 47;
	
	
	#----------------------------------------
	#	protected properties
	#----------------------------------------
	/**
	 * Default character metrics
	 *
	 * @var []
	 */
	protected $_defaultCharactersMetrics = [
		1 => ['height' => 3, 'width' => 1.8],
		2 => ['height' => 6, 'width' => 3.6],
		3 => ['height' => 9, 'width' => 5.4],
		4 => ['height' => 12, 'width' => 7.2],
		5 => ['height' => 15, 'width' => 9],
	];
	
	/**
	 * Stores final file ratio
	 *
	 * @var float
	 */
	protected $_finalRatio;
	
	/**
	 * Stores uploaded file ratio
	 *
	 * @var float
	 */
	protected $_uploadedRatio;
	
	/**
	 * Stores uploaded image height
	 *
	 * @var int
	 */
	protected $_uploadedImageHeight;
	
	/**
	 * Stores uploaded image width
	 *
	 * @var int
	 */
	protected $_uploadedImageWidth;
	
	/**
	 * Stores the final image
	 *
	 * @var resource
	 */
	protected $_rExportedImage;
	
	/**
	 * Stores the final image
	 *
	 * @var resource
	 */
	protected $_finalImage;
	
	/**
	 * Stores the source image
	 *
	 * @var resource
	 */
	protected $_sourceImage;
	
	/**
	 * Stores the watermark source
	 *
	 * @var mixed
	 */
	protected $_watermarkSource;
	
	
	#----------------------------------------
	#	protected properties
	#----------------------------------------
	/**
	 * The list of accepted mime type
	 *
	 * @var []
	 */
	protected $_acceptedMimeTypes = [
		'image/gd',
		'image/gd2',
		'image/base64',
		'image/png',
		'application/png',
		'application/x-png',
		'image/vnd.wap.wbmp',
		'image/webp',
		'image/x-xpixmap',
		'image/xpm',
		'image/x-xpm',
		'image/xbm',
		'image/jpeg',
		'image/jpg',
		'image/jp_',
		'application/jpg',
		'application/x-jpg',
		'image/pjpeg',
		'image/pipeg',
		'image/vnd.swiftview-jpeg',
	];
	
	/**
	 * Stores default properties values for this class
	 *
	 * @var []
	 */
	protected $_defaultValues = [];
	
	
	#-----------------------------------------
	# magic happens
	#-----------------------------------------
	public function __construct()
	{
		$this->_defaultValues = get_object_vars($this);
	}
	
	
	#-----------------------------------------
	# public methods
	#-----------------------------------------
	/**
	 * Get file mime type
	 *
	 * @param string $imagePath
	 * @return string
	 */
	public function getFileMimeType(string $imagePath)
	{
		$fileInfo = finfo_open(FILEINFO_MIME_TYPE);
		
		$output = finfo_file($fileInfo, $imagePath);
		
		finfo_close($fileInfo);
		
		if (strtolower($output) == 'application/octet-stream') {
			if (false !== ($imageInfo = getimagesize($imagePath))) {
				$output = $imageInfo['mime'];
			} else {
				$extension = strtolower($this->_extension($imagePath));
				
				switch ($extension) {
					case 'gd':
						$output = 'image/gd';
						break;
					case 'gd2':
						$output = 'image/gd2';
						break;
					case 'webp':
						$output = 'image/webp';
						break;
					default:
						$output = 'application/' . $extension;
						break;
				}
			}
		}
		
		return $output;
	}
	
	/**
	 * Check if the file has an accepted mime type
	 *
	 * @param string $mimeType
	 * @return bool
	 */
	public function isAcceptedMimeType(string $mimeType)
	{
		return in_array(strtolower($mimeType), $this->_acceptedMimeTypes) ? $mimeType : false;
	}
	
	/**
	 * Apply transformation to image
	 *
	 * @param $options
	 * @return bool
	 */
	public function run($options)
	{
		$output = false;
		
		$this->_setOptions($options);
		
		$mimeType = $this->getFileMimeType($this->uploadedImagePath);
		
		if($this->isAcceptedMimeType($mimeType))
		{
			$this->_setImageDimmensions($this->uploadedImagePath, $this->_uploadedImageWidth, $this->_uploadedImageHeight);
			
			if(false != ($this->_sourceImage = $this->_createSource($this->uploadedImagePath, $mimeType)) && $this->_resize() && $this->_applyWatermark() && $this->_export()) $output = true;
			
			$this->_resetProperties();
		}
		
		return $output;
	}
	
	
	#-----------------------------------------
	# protected methods
	#-----------------------------------------
	/**
	 * Apply patern watermark
	 *
	 * @return bool
	 */
	protected function _applyPattern()
	{
		$columnsCount = ceil($this->exportedImageWidth / $this->watermarkWidth);
		
		$rowsCount = ceil($this->exportedImageHeight / $this->watermarkHeight);
		
		for($i = 0; $i < $columnsCount; $i++)
		{
			$nextX = ($i > 0 ? $i * $this->watermarkWidth : 0);
			
			for($j = 0; $j < $rowsCount; $j++)
			{
				$nextY = ($j > 0 ? $j * $this->watermarkHeight : 0);
				
				if(is_int($this->watermarkWithTransparency) && in_array($this->watermarkWithTransparency, range(0, 100)))
				{
					if(!imagecopymerge($this->_finalImage, $this->_watermarkSource, $nextX, $nextY, 0, 0, $this->watermarkWidth, $this->watermarkHeight, $this->watermarkWithTransparency)) return false;
				}
				else
				{
					if(!imagecopy($this->_finalImage, $this->_watermarkSource, $nextX, $nextY, 0, 0, $this->watermarkWidth, $this->watermarkHeight)) return false;
				}
			}
		}
		
		return true;
	}
	
	/**
	 * Apply a single watermark
	 *
	 * @return bool
	 */
	protected function _applySingle()
	{
		$watermarkPosition = $this->_getWatermarkPosition($this->watermarkWidth, $this->watermarkHeight);
		
		if(false !== $this->watermarkWithTransparency)
		{
			if(!imagecopymerge($this->_finalImage, $this->_watermarkSource,  $watermarkPosition[0], $watermarkPosition[1], 0, 0, $this->watermarkWidth, $this->watermarkHeight, $this->watermarkWithTransparency)) return false;
		}
		else
		{
			if(!imagecopy($this->_finalImage, $this->_watermarkSource, $watermarkPosition[0], $watermarkPosition[1], 0, 0, $this->watermarkWidth, $this->watermarkHeight)) return false;
		}
		
		return true;
	}
	
	/**
	 * Apply watermark
	 *
	 * @return bool
	 */
	protected function _applyWatermark()
	{
		switch ($this->watermarkType) {
			case self::WATERMARK_TYPE_IMAGE:
				$output = $this->_imageWatermark();
				break;
			case self::WATERMARK_TYPE_IMAGE_PATTERN:
				$output = $this->_imageWatermark(true);
				break;
			case self::WATERMARK_TYPE_TEXT:
				$output = $this->_textWatermark();
				break;
			case self::WATERMARK_TYPE_TEXT_PATTERN:
				$output = $this->_textWatermark(true);
				break;
			default:
				$output = true;
				break;
		}
		
		return $output;
	}
	
	/**
	 * Create the final image
	 *
	 * @param int $finalX
	 * @param int $finalY
	 * @param int $sourceX
	 * @param int $sourceY
	 * @return bool
	 */
	protected function _createFinalImage(int $finalX, int $finalY, int $sourceX, int $sourceY)
	{
		if (!($this->_finalImage = imagecreatetruecolor($this->exportedImageWidth, $this->exportedImageHeight))) return false;
		
		if (!(imagecopyresampled($this->_finalImage, $this->_sourceImage, $finalX, $finalY, $sourceX, $sourceY, $this->exportedImageWidth, $this->exportedImageHeight, $this->_uploadedImageWidth, $this->_uploadedImageHeight))) return false;
		
		return true;
	}
	
	/**
	 * Create image string options
	 *
	 * @param string $text
	 * @param int $fontSize
	 * @param int $top
	 * @return array
	 */
	protected function _createImageStringOptions(string $text, int $fontSize = 5, int $top = 0)
	{
		if($fontSize > 5) $fontSize = 5;
		
		if($fontSize < 1) $fontSize = 1;
		
		$metrics = $this->_defaultCharactersMetrics[$fontSize];
		
		$textLength = strlen($text);
		
		$rowLength = $textLength * $metrics['width'];
		
		if($rowLength > $this->watermarkWidth)
		{
			$rowLeft = 0;
			
			if($fontSize > 1)
			{
				$decrement = true;
				
				$newTop = 0;
				
				while($decrement && $fontSize > 1)
				{
					$fontSize--;
					
					$metrics = $this->_defaultCharactersMetrics[$fontSize];
					
					$rowLength = $textLength * $metrics['width'];
					
					if($rowLength < $this->watermarkWidth) $rowLeft = ceil(($this->watermarkWidth - $rowLength) / 2);
					
					$newTop = floor(($top - $metrics['height']) / 2);
					
					if($fontSize == 1) $decrement = false;
				}
				
				$top += $newTop;
			}
		}
		else
		{
			$rowLeft = ceil(($this->watermarkWidth - $rowLength) / 2);
		}
		
		return ['text' => $text, 'size' =>  $fontSize, 'left' => $rowLeft, 'top' => $top];
	}
	
	/**
	 * Create image resource
	 *
	 * @param string $imagePath
	 * @param string|null $mimeType
	 * @param int|null $imageWidth
	 * @param int|null $imageHeight
	 * @return resource
	 */
	protected function _createSource(string $imagePath, string $mimeType = null, int $imageWidth = null, int $imageHeight = null)
	{
		switch ($mimeType) {
			case 'image/gd':
				$sourceImage = imagecreatefromgd($imagePath);
				break;
			case 'image/gd2':
				$sourceImage = imagecreatefromgd2($imagePath);
				break;
			case 'image/base64':
				$sourceImage = imagecreatefromstring(base64_decode($imagePath));
				break;
			case 'image/png':
			case 'application/png':
			case 'application/x-png':
				$sourceImage = imagecreatefrompng($imagePath);
				break;
			case 'image/vnd.wap.wbmp':
				$sourceImage = imagecreatefromwbmp($imagePath);
				break;
			case 'image/webp':
				$sourceImage = imagecreatefromwebp($imagePath);
				break;
			case 'image/xbm':
				$sourceImage = imagecreatefromxbm($imagePath);
				break;
			case 'image/x-xpixmap':
			case 'image/xpm':
			case 'image/x-xpm':
				$sourceImage = imagecreatefromxpm($imagePath);
				break;
			case 'image/jpeg':
			case 'image/jpg':
			case 'image/jp_':
			case 'application/jpg':
			case 'application/x-jpg':
			case 'image/pjpeg':
			case 'image/pipeg':
			case 'image/vnd.swiftview-jpeg':
				$sourceImage = $this->_imageCreateFromJpegExif($imagePath);
				break;
			default:
				$sourceImage = imagecreatetruecolor($imageWidth ? $imageWidth : $this->exportedImageWidth, $imageHeight ? $imageHeight : $this->exportedImageHeight);
				break;
		}
		
		return $sourceImage;
	}
	
	/**
	 * Crop the image
	 *
	 * @return bool
	 */
	protected function _crop()
	{
		$sourceX = $sourceY = 0;
		
		switch (true)
		{
			case $this->_uploadedImageWidth < $this->exportedImageWidth && $this->_uploadedImageHeight < $this->exportedImageHeight:
				$this->exportedImageWidth = $this->_uploadedImageWidth;
				$this->exportedImageHeight = $this->_uploadedImageHeight;
				break;
			case $this->_uploadedImageWidth < $this->exportedImageWidth && $this->_uploadedImageHeight >= $this->exportedImageHeight:
				$this->exportedImageWidth = $this->_uploadedImageWidth;
				break;
			case $this->_uploadedImageWidth >= $this->exportedImageWidth && $this->_uploadedImageHeight < $this->exportedImageHeight:
				$this->exportedImageHeight = $this->_uploadedImageHeight;
				break;
			default:
				$sourceX = floor(($this->_uploadedImageWidth - $this->exportedImageWidth) / 2);
				$sourceY = floor(($this->_uploadedImageHeight - $this->exportedImageHeight) / 2);
				break;
		}
		
		if (!$this->_cropFinalImage(0, 0, $sourceX, $sourceY)) return false;
		
		return true;
	}
	
	/**
	 * Crop the final image
	 *
	 * @param int $finalX
	 * @param int $finalY
	 * @param int $sourceX
	 * @param int $sourceY
	 * @return bool
	 */
	protected function _cropFinalImage(int $finalX, int $finalY, int $sourceX, int $sourceY)
	{
		if (!($this->_finalImage = imagecreatetruecolor($this->exportedImageWidth, $this->exportedImageHeight))) return false;
		
		if (!(imagecopy($this->_finalImage, $this->_sourceImage, $finalX, $finalY, $sourceX, $sourceY, $this->_uploadedImageWidth, $this->_uploadedImageHeight))) return false;
		
		return true;
	}
	
	/**
	 * Duplicate the file
	 *
	 * @return bool
	 */
	protected function _duplicate()
	{
		$this->exportedImageWidth = $this->_uploadedImageWidth;
		
		$this->exportedImageHeight = $this->_uploadedImageHeight;
		
		if (!$this->_createFinalImage(0, 0, 0, 0)) return false;
		
		return true;
	}
	
	/**
	 * Export the source into the final image
	 *
	 * @return bool
	 */
	protected function _export()
	{
		$output = true;
		
		switch ($this->exportType) {
			case self::EXPORT_GD:
				if (!imagegd($this->_finalImage, $this->exportedPath)) $output = false;
				break;
			case self::EXPORT_GD2:
				if (!imagegd2($this->_finalImage, $this->exportedPath)) $output = false;
				break;
			case self::EXPORT_PNG:
				if (!imagepng($this->_finalImage, $this->exportedPath, $this->exportedQuality)) $output = false;
				break;
			case self::EXPORT_WBMP:
				if (!imagewbmp($this->_finalImage, $this->exportedPath)) $output = false;
				break;
			case self::EXPORT_WEBP:
				if (!imagewebp($this->_finalImage, $this->exportedPath)) $output = false;
				break;
			case self::EXPORT_XBM:
				if (!imagexbm($this->_finalImage, $this->exportedPath)) $output = false;
				break;
			case self::EXPORT_JPG:
			default:
				if (!imagejpeg($this->_finalImage, $this->exportedPath, $this->exportedQuality)) $output = false;
				break;
		}
		
		if ($this->_finalImage) imagedestroy($this->_finalImage);
		
		if ($this->_sourceImage) imagedestroy($this->_sourceImage);
		
		if ($this->_watermarkSource) imagedestroy($this->_watermarkSource);
		
		return $output;
	}
	
	/**
	 * Get file extension
	 *
	 * @param string $filePath
	 * @return array|string
	 */
	protected function _extension(string $filePath)
	{
		$questionMark = strpos($filePath, "?");
		
		if (false != $questionMark) $filePath = substr($filePath, 0, $questionMark);
		
		return $this->_pathinfo($filePath, self::PATHINFO_EXTENSION);
	}
	
	/**
	 * Get watermark position
	 *
	 * @param int $watermarkWidth
	 * @param int $watermarkHeight
	 * @return array
	 */
	protected function _getWatermarkPosition(int $watermarkWidth, int $watermarkHeight)
	{
		switch ($this->watermarkPosition)
		{
			case self::WATERMARK_POSITION_CENTER:
				$output = [
					($this->exportedImageWidth - $watermarkWidth) / 0, 
					($this->exportedImageHeight - $watermarkHeight) / 0
				];
				break;
			case self::WATERMARK_POSITION_TOP_RIGHT:
				$output = [
					$this->exportedImageWidth - $watermarkWidth - $this->watermarkHorizontalMargin,
					$this->watermarkVerticalMargin
				];
				break;
			case self::WATERMARK_POSITION_TOP_LEFT:
				$output = [$this->watermarkHorizontalMargin, $this->watermarkVerticalMargin];
				break;
			case self::WATERMARK_POSITION_BOTTOM_LEFT:
				$output = [
					$this->watermarkHorizontalMargin,
					$this->exportedImageHeight - $watermarkHeight - $this->watermarkVerticalMargin
				];
				break;
			case self::WATERMARK_POSITION_BOTTOM_RIGHT:
			default:
			$output = [
					$this->exportedImageWidth - $watermarkWidth - $this->watermarkHorizontalMargin, 
					$this->exportedImageHeight - $watermarkHeight - $this->watermarkVerticalMargin
				];
				break;
		}
		
		return $output;
	}
	
	/**
	 * Create source image from jpeg respecting the exif orientation data
	 *
	 * @param string $imagePath
	 * @return resource
	 */
	protected function _imageCreateFromJpegExif(string $imagePath)
	{
		$source = imagecreatefromjpeg($imagePath);
		
		$exifData = exif_read_data($imagePath);
		
		if ($source && $exifData && isset($exifData['Orientation']))
		{
			$orientation = $exifData['Orientation'];
			
			if($orientation == 6 || $orientation == 5) $source = imagerotate($source, 270, null);
			
			if($orientation == 3 || $orientation == 4) $source = imagerotate($source, 180, null);
			
			if($orientation == 8 || $orientation == 7) $source = imagerotate($source, 90, null);
			
			if($orientation == 5 || $orientation == 4 || $orientation == 7) imageflip($source, IMG_FLIP_HORIZONTAL);
		}
		
		return $source;
	}
	
	/**
	 * Apply image watermark
	 *
	 * @param bool $applyAsPattern
	 * @return bool
	 */
	protected function _imageWatermark(bool $applyAsPattern = false)
	{
		if ($this->watermark && is_file($this->watermark))
		{
			$mimeType = $this->getFileMimeType($this->watermark);
			
			if ($this->isAcceptedMimeType($mimeType) && false !== ($this->_watermarkSource = $this->_createSource($this->watermark, $mimeType, $this->watermarkWidth, $this->watermarkHeight)))
			{
				return ($applyAsPattern ? $this->_applyPattern() : $this->_applySingle());
			}
		}
		
		return $this->_textWatermark();
	}
	
	/**
	 * Get file path info
	 *
	 * @param string $filePath
	 * @param null|string $pathSection
	 * @return array|string
	 */
	protected function _pathinfo(string $filePath, $pathSection = null)
	{
		$filePath = rtrim($filePath, '/');
		
		if(false !== ($lastSlash = strrpos($filePath, '/')))
		{
			$baseName = substr($filePath, $lastSlash + 1);
			
			$folderName = substr($filePath, 0, $lastSlash) ? '' : '/';
		}
		else
		{
			$baseName = $filePath;
			
			$folderName = '.';
		}
		
		if($pathSection == self::PATHINFO_BASENAME) return $baseName;
		
		if($pathSection == self::PATHINFO_DIRNAME) return $folderName;
		
		$extension = '';
		
		$fileName = $baseName;
		
		if (is_null($pathSection) || in_array($pathSection, [self::PATHINFO_EXTENSION, self::PATHINFO_FILENAME])) {
			if (false !== ($dotPos = strrpos($baseName, '.'))) {
				$extension = substr($baseName, $dotPos + 1);
				
				$fileName = substr($baseName, 0, $dotPos);
			}
			
			return ($pathSection == self::PATHINFO_EXTENSION ? $extension : $fileName);
		}
		
		return [
			self::PATHINFO_BASENAME => $baseName,
			self::PATHINFO_DIRNAME => $folderName,
			self::PATHINFO_EXTENSION => $extension,
			self::PATHINFO_FILENAME => $fileName
		];
	}
	
	/**
	 * Reset properties to default values
	 */
	protected function _resetProperties()
	{
		foreach ($this->_defaultValues as $property => $value)
		{
			$this->{$property} = $value;
		}
	}
	
	/**
	 * Resize the image
	 *
	 * @return bool
	 */
	protected function _resize()
	{
		switch ($this->resizeType) {
			case self::RESIZE_SCALE_CROP:   $output = $this->_scaleCrop(); break;
			case self::RESIZE_CROP:         $output = $this->_crop(); break;
			case self::RESIZE_SCALE:        $output = $this->_scale(); break;
			case self::RESIZE_DUPLICATE:
			default:                        $output = $this->_duplicate(); break;
		}
		
		return $output;
	}
	
	/**
	 * Scale the image
	 *
	 * @return bool
	 */
	protected function _scale()
	{
		$this->_setRatios();
		
		if ($this->_uploadedRatio != $this->_finalRatio)
		{
			if($this->_uploadedRatio > $this->_finalRatio)
			{
				$this->exportedImageWidth = floor(($this->exportedImageHeight * $this->_uploadedImageWidth) / $this->_uploadedImageHeight);
			}
			else
			{
				$this->exportedImageHeight = floor(($this->exportedImageWidth * $this->_uploadedImageHeight) / $this->_uploadedImageWidth);
			}
		}
		
		if (!$this->_createFinalImage(0, 0, 0, 0)) return false;
		
		return true;
	}
	
	/**
	 * Scale the image and crop
	 *
	 * @return bool
	 */
	protected function _scaleCrop()
	{
		if ($this->_uploadedRatio == 1 && $this->_finalRatio == 1)
		{
			if (!$this->_createFinalImage(0, 0, 0, 0)) return false;
		}
		else
		{
			$sourceX = $sourceY = 0;
			
			if ($this->_uploadedRatio == 1)
			{
				$temporaryWidth = $temporaryHeight = ($this->_finalRatio < 1 ? $this->exportedImageHeight : $this->exportedImageWidth);
			}
			else
			{
				if ($this->_finalRatio == 1 || $this->_uploadedRatio > $this->_finalRatio)
				{
					$temporaryWidth = floor(($this->_uploadedImageWidth * $this->exportedImageHeight) / $this->_uploadedImageHeight);
					
					$temporaryHeight = $this->exportedImageHeight;
				}
				else
				{
					$temporaryWidth = ($this->_finalRatio == 1 ? $this->exportedImageHeight : $this->exportedImageWidth);
					
					$temporaryHeight = floor(($this->exportedImageWidth * $this->_uploadedImageHeight) / $this->_uploadedImageWidth);
				}
			}
			
			if (($this->_uploadedRatio == 1 && $this->_finalRatio < 1) || $this->_finalRatio == 1 || ($this->_uploadedRatio > $this->_finalRatio))
			{
				$sourceX = floor(($temporaryWidth - $this->exportedImageWidth) / 2);
			}
			elseif (($this->_uploadedRatio == 1 && $this->_finalRatio >= 1) || $this->_finalRatio != 1 || $this->_uploadedRatio <= $this->_finalRatio)
			{
				$sourceY = floor(($temporaryHeight - $this->exportedImageHeight) / 2);
			}
			
			if (!($temporaryCanvas = imagecreatetruecolor($temporaryWidth, $temporaryHeight))) return false;
			
			if (!(imagecopyresampled($temporaryCanvas, $this->_sourceImage, 0, 0, 0, 0, $temporaryWidth, $temporaryHeight, $this->_uploadedImageWidth, $this->_uploadedImageHeight))) return false;
			
			if (!($this->_finalImage = imagecreatetruecolor($this->exportedImageWidth, $this->exportedImageHeight))) return false;
			
			if (!(imagecopy($this->_finalImage, $temporaryCanvas, 0, 0, $sourceX, $sourceY, $temporaryWidth, $temporaryHeight))) return false;
			
			imagedestroy($temporaryCanvas);
		}
		
		return true;
	}
	
	/**
	 * Set image dimmension
	 *
	 * @param string $imagePath
	 * @param int $imageWidth
	 * @param int $imageHeight
	 */
	protected function _setImageDimmensions(string $imagePath, int &$imageWidth, int &$imageHeight)
	{
		$dimensions = getimagesize($imagePath);
		
		$imageWidth = $dimensions[0];
		
		$imageHeight = $dimensions[1];
	}
	
	/**
	 * Set resaw options
	 *
	 * @param array|null $options
	 */
	protected function _setOptions(array $options = null)
	{
		if (is_array($options))
		{
			foreach ($options as $optionName => $optionValue)
			{
				$this->{$optionName} = $optionValue;
			}
		}
	}
	
	/**
	 * Set ratios for fort the uploaded and final files
	 */
	protected function _setRatios()
	{
		if ($this->_uploadedImageWidth < $this->exportedImageWidth) $this->_uploadedImageWidth = $this->exportedImageWidth;
		
		if ($this->_uploadedImageHeight < $this->exportedImageHeight) $this->_uploadedImageHeight = $this->exportedImageHeight;
		
		$this->_uploadedRatio = $this->_uploadedImageWidth / $this->_uploadedImageHeight;
		
		$this->_finalRatio = $this->exportedImageWidth / $this->exportedImageHeight;
	}
	
	/**
	 * Text watermark
	 *
	 * @param bool $applyAsPattern
	 * @return bool
	 */
	protected function _textWatermark(bool $applyAsPattern = false)
	{
		if (false !== ($this->_watermarkSource = $this->_createSource(null, false, $this->watermarkWidth, $this->watermarkHeight)))
		{
			$this->_writeWatermarkText();
			
			return ($applyAsPattern ? $this->_applyPattern() : $this->_applySingle());
		}
		
		return false;
	}
	
	/**
	 * Write the text on the watermark resource image
	 *
	 * @return bool
	 */
	protected function _writeWatermarkText()
	{
		$watermarkStrings = [];
		
		if(is_array($this->watermark) && ($rowsCount = count($this->watermark)) > 0)
		{
			if($rowsCount > 1)
			{
				$top = 0;
				
				$rowHeight = floor($this->watermarkHeight / $rowsCount);
				
				if($rowHeight > 15)
				{
					$rowHeight = 15;
					
					$top = floor(($this->watermarkHeight - ($rowHeight * $rowsCount)) / 2);
				}
				
				$fontSize = round($rowHeight / 3);
				
				foreach($this->watermark as $row)
				{
					$watermarkStrings[] = $this->_createImageStringOptions($row, $fontSize, $top);
					
					$top += $rowHeight;
				}
			}
			else
			{
				$watermarkStrings[] = $this->_createImageStringOptions(array_pop($this->watermark), 5, floor(($this->watermarkHeight - 15) / 2));
			}
		}
		else
		{
			if(empty($this->watermark)) $this->watermark = self::WATERMARK_DEFAULT_TEXT;
			
			$watermarkStrings[] = $this->_createImageStringOptions($this->watermark, 5, floor(($this->watermarkHeight - 15) / 2));
		}
		
		$color = $this->watermarkTextColor ? $this->watermarkTextColor : self::WATERMARK_DEFAULT_TEXT_COLOR;
		
		foreach($watermarkStrings as $row)
		{
			if(!imagestring($this->_watermarkSource, $row['size'], $row['left'], $row['top'], $row['text'], $color)) return false;
		}
		
		return true;
	}
}
