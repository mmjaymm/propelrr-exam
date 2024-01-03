<?php

class BubbleSort
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->sortingProcess();
    }

    private function sortingProcess()
    {
        $n = count($this->data);
        $swap = true;

        do {
            $swap = false;
            for ($i = 0; $i < $n - 1; $i++) {
                if ($this->data[$i] > $this->data[$i + 1]) {
                    $temp = $this->data[$i];
                    $this->data[$i] = $this->data[$i + 1];
                    $this->data[$i + 1] = $temp;

                    $swap = true;
                }
            }
        } while ($swap);
    }

    public function getMedian()
    {
        $n = count($this->data);
        $midian = (int)($n / 2);

        if ($n % 2 == 0) {
            return ($this->data[$midian - 1] + $this->data[$midian]) / 2;
        } else {
            return $this->data[$midian];
        }
    }

    public function getLargestValue()
    {
        return end($this->data);
    }
}

class MyClass
{
    public function processArray(array $inputArray)
    {
        $bubbleSort = new BubbleSort($inputArray);

        $median = $bubbleSort->getMedian();
        echo "The Median is : $median\n";

        $largestValue = $bubbleSort->getLargestValue();
        echo "The Largest Value is: $largestValue\n";
    }
}

$inputArray = [8, 4, 10, 2, 7, 6]; //sample array of integer
$mainClass = new MyClass();
$mainClass->processArray($inputArray);
