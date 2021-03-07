<?php
/**
 * CosineSimilarity measures a cosine similarity between two vectors
 *
 */
namespace App\Libraries;

class Cosinesimilarity {

    public static function similarity(array $vec1, array $vec2)
    {
        // perhitungan cosine similarity
        $vectorKey = array_keys(array_merge($vec1, $vec2));
        $dotProduct = 0;
        $magnitudeVec1 = 0;
        $magnitudeVec2 = 0;
        foreach ($vectorKey as $key) 
        {
            $keyVec1Val = isset($vec1[$key])?$vec1[$key]:0;
            $keyVec2Val = isset($vec2[$key])?$vec2[$key]:0;
            $dotProduct += ($keyVec1Val * $keyVec2Val);
            $magnitudeVec1 += ($keyVec1Val * $keyVec1Val);
            $magnitudeVec2 += ($keyVec2Val * $keyVec2Val);
        }
        $magnitudeVec1 = sqrt($magnitudeVec1);
        $magnitudeVec2 = sqrt($magnitudeVec2);
        // hitung a / b
        $similarity = $dotProduct / ($magnitudeVec1 * $magnitudeVec2);
        return $similarity;
    }  
    
  protected function _dotProduct(array $vec1, array $vec2) {
    $result = 0;
    
    foreach (array_keys($vec1) as $key1) {
      foreach (array_keys($vec2) as $key2) {
	       if ($key1 === $key2) $result += $vec1[$key1] * $vec2[$key2];
      }
    }
    
    return $result;
  }
  
  protected function _absVector(array $vec) {
    $result = 0;
    
    foreach (array_values($vec) as $value) {
      $result += $value * $value;
    }
    
    return sqrt($result);
  }
}
