<?php 
// my custom helper
namespace App\Helpers;
/**
 * 
 */
class MyHelper
{
	public static function getStatusChat($id='')
	{
		switch ($id) {
			case 1:
				return MyHelper::withLabel('warning', 'Menunggu respon pakar');
				break;
			case 2:
				return MyHelper::withLabel('success', 'Berjalan');
				break;
			case 3:
				return MyHelper::withLabel('primary', 'Selesai');
				break;
			default:
				# code...
				break;
		}
	}
	public static function withLabel($typ, $str)
	{
		return '<label class="label label-'.$typ.'">'.$str.'</label>';
	}
	public static function getTimeAgo($date)
	{

	  $timestamp = strtotime($date);	
	   
	   $strTime = array("detik", "menit", "jam", "hari", "bulan", "tahun");
	   $length = array("60","60","24","30","12","10");

	   $currentTime = time();
	   if($currentTime >= $timestamp) {
			$diff     = time()- $timestamp;
			for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
			$diff = $diff / $length[$i];
			}

			$diff = round($diff);
			return $diff . " " . $strTime[$i] . " yg lalu ";
	   }
	   return '';
	}
	public static function getListKategoriArtikel($id=0)
	{
		$arr = [
			1=>[
				'nama'=>'Pakan', 
				'ikon'=>'images/kategori-artikel/pakan.png', 
				'deskripsi'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'], 
			2=>[
				'nama'=>'Kandang', 
				'ikon'=>'images/kategori-artikel/kandang.png', 
				'deskripsi'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'],
			3=>[
				'nama'=>'Sapi', 
				'ikon'=>'images/kategori-artikel/sapi.png', 
				'deskripsi'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'],
			4=>[
				'nama'=>'Pedet', 
				'ikon'=>'images/kategori-artikel/pedet.png', 
				'deskripsi'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'],
			5=>[
				'nama'=>'Budidaya', 
				'ikon'=>'images/kategori-artikel/budidaya.png', 
				'deskripsi'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.']
		];
		if(empty($id))
			return json_decode(json_encode($arr));
		else
			return json_decode(json_encode($arr[$id]));
	}
}
?>