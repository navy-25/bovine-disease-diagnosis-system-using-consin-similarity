<?php

namespace App\Http\Controllers\Peternak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sastrawi\Stemmer\StemmerFactory;
use Sastrawi\StopWordRemover\StopWordRemoverFactory;

class InfoController extends Controller
{
	protected $stemmer;
	protected $stopword;

	public function __construct()
	{
		$stemmerFactory = new StemmerFactory();
		$stopwordFactory = new StopWordRemoverFactory();

		$this->stemmer  = $stemmerFactory->createStemmer();
        $this->stopword = $stopwordFactory->createStopWordRemover();
	}
    public function cari(Request $request)
    {
    	$q = $request->get('q');
    	$keyword   = $this->stemmer->stem($q);
        $keyword	= $this->stopword->remove($keyword);
        $gejala = \App\Gejala::where('nama', 'like', '%'.$keyword.'%')->limit(6)->get();
    	$artikel = $this->similarity_artikel($q);
    	$penyakit = $this->similarity_penyakit($q);

    	$varToView = [
    		'q'				=> $q,
    		'dt_artikel'	=>	$artikel,
    		'dt_penyakit'	=>	$penyakit,
    		'dt_gejala'		=>	$gejala];
    	
        return view('menu.peternak.cari-info', $varToView);
    }
    public function cekGejala(Request $request)
    {
    	$gejala = \App\Gejala::whereIn('id', $request->gejala)->get();
    	$diagnosa = \App\Diagnosa::whereHas("gejala", function ($q) use ($request)
    	{
    		$q->whereIn('id', $request->gejala);
    	})->get();
    	return view('menu.peternak.diagnosa', ['dt_gejala'=>$gejala, 'dt_diagnosa'=>$diagnosa]);
    }
    public function artikel($id='')
    {
    	if(empty($id))
    		return view('menu.peternak.artikel', ['data' => \App\Artikel::orderBy('id', 'DESC')->paginate(6)]);
    	else
	    	return view('menu.peternak.single-artikel', ['artikel' => \App\Artikel::findOrFail($id)]);
    }
    public function penyakit($id)
    {
    	return view('menu.peternak.single-penyakit', ['penyakit' => \App\Penyakit::findOrFail($id)]);
    }
    private function similarity_penyakit($keyword)
	{
		// stem
        $keyword   = $this->stemmer->stem($keyword);
        $keyword	= $this->stopword->remove($keyword);
		
		// menghitung TF
		$tf_query = array_filter(array_count_values(str_word_count($keyword, 1)));

		$dokumen = array();
		// ambil data materi dari database
		$data 	= \App\Penyakit::all();
		foreach ($data as $d) {
			// pre-processing
			$out = $this->stemmer->stem($d->gejala);
			$out = $this->stopword->remove($out);
			// menghitung TF
			$tf = array_filter(array_count_values(str_word_count($out, 1)));
			$mirip = round(\Cosine::similarity($tf_query,$tf), 2);
			if(($mirip*100) > 0){
				$dokumen[] = (object) array(
					'id' => $d->id,
					'nama' => $d->nama,
					'gejala' => substr($d->gejala, 0, 160).'...',
					'gambar' => $d->getDokumentasi(),
					'mirip' => ($mirip*100).'%',
					'similarity' => $mirip,
					'url' => url('info/penyakit/'.$d->id)
				);
			}
		}
		if (count($dokumen) > 0) {
			usort($dokumen, function ($a, $b){
			    return $a->similarity < $b->similarity;
			});
			$hasil = array_slice($dokumen, 1, 10);
			$response = array(
				'status' => 'success', 
				'data' => $hasil);
		} else {
			$response = array(
				'status' => 'error', 
				'message' => "Tidak ditemukan dokumen yang mirip");
		}
		return (object) $response;

	}
    private function similarity_artikel($keyword)
	{
		// stem
        $keyword   = $this->stemmer->stem($keyword);
        $keyword	= $this->stopword->remove($keyword);
		
		// menghitung TF
		$tf_query = array_filter(array_count_values(str_word_count($keyword, 1)));

		$dokumen = array();
		// ambil data materi dari database
		$data 	= \App\Artikel::all();
		foreach ($data as $d) {
			$dt_sinopsis_asal = $d->sinopsis;
			$dt_konten_asal = $d->konten;
			$mix = $dt_sinopsis_asal . ' '. $dt_konten_asal;
			// pre-processing
			$out = $this->stemmer->stem($mix);
			$out = $this->stopword->remove($out);
			// menghitung TF
			$tf = array_filter(array_count_values(str_word_count($out, 1)));
			$mirip = round(\Cosine::similarity($tf_query,$tf), 2);
			if(($mirip*100) > 0){
				$dokumen[] = (object) array(
					'id' => $d->id,
					'judul' => $d->judul,
					'sinopsis' => substr($d->sinopsis, 0, 160).'...',
					'gambar' => $d->getDokumentasi(),
					'mirip' => ($mirip*100).'%',
					'similarity' => $mirip,
					'url' => url('info/artikel/'.$d->id)
				);
			}
		}
		if (count($dokumen) > 0) {
			usort($dokumen, function ($a, $b){
			    return $a->similarity < $b->similarity;
			});
			$hasil = array_slice($dokumen, 1, 10);
			$response = array(
				'status' => 'success', 
				'data' => $hasil);
		} else {
			$response = array(
				'status' => 'error', 
				'message' => "Tidak ditemukan dokumen yang mirip");
		}
		return (object) $response;

	}
}
