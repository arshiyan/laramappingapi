<?php
namespace App\Traits;

trait FileTrait
{
    /**
     * @param $fileCollect
     * @param $yamlCollect
     * @return mixed
     */
    public function mapping($fileCollect, $yamlCollect)
    {
        $yamlArray = $yamlCollect->all();

        foreach ($fileCollect as $key => $value) {
            if(is_array($value) && ! empty($value)) {
                foreach ($value as $nestedKey => $nestedValue)
                {
                    $checkArray = $yamlArray[$nestedKey] ?? null;
                    if (! empty($checkArray)) {
                        $value[$checkArray] = $nestedValue;

                        unset($value[$nestedKey]);

                        $fileCollect[$key] = $value;

                    }

                }

            } else {
                if (isset($yamlArray[$key]) && $key != $yamlArray[$key]) {
                    $fileCollect[$yamlArray[$key]] = ! empty($value) ? $value : null;
                    unset($fileCollect[$key]);
                }
            }
        }
        return $fileCollect;
    }

    /**
     * @param $xmlstring
     * @return mixed
     */
    public function xmlToArray($xmlstring){

        $xml = simplexml_load_string($xmlstring, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);

        return $array;

    }
}
