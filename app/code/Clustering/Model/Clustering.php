<?php

namespace App\Clustering\Model;

use Phpml\Clustering\KMeans;
use stdClass;


/**
 * Class Clustering
 * @package Model
 */
class Clustering
{
    /**
     * @return false|string
     * @throws \Phpml\Exception\InvalidArgumentException
     */
    public function getData()
    {
        //$lines = file(__DIR__ . '../../../../../data/1000.csv');
        $lines = file(__DIR__ . '../../../../../data/region-sales.csv');

        foreach ($lines as &$line) {
            $row = explode(',', $line);
            $line = [(float)$row[0], (float)$row[1]];
        }

        $clusterer = new KMeans(10);
        $clusters = $clusterer->cluster($lines);

        $result = [];
        foreach ($clusters as $key => $cluster) {
            $group = new stdClass();
            $group->name = $key;
            $group->data = [];
            foreach ($cluster as $sample) {
                if(1 == rand(1,2)) {
                    $group->data[] = [$sample[0], $sample[1]];
                }
            }
            $result[] = $group;
        }

        return json_encode($result);
    }
}

