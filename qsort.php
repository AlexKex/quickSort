<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="ru-RU" xml:lang="ru-RU">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
  <div id="php_code">
  <p>Это реализация на PHP</p>
  <?php
    function quickSort(&$arr, $low, $high) {
        $i = $low;                
        $j = $high;
        $middle = $arr[ ( $low + $high ) / 2 ];  // middle - опорный элемент; в нашей реализации он находится посередине между low и high
        do {
            while($arr[$i] < $middle) ++$i;  // ищем элементы для правой части
            while($arr[$j] > $middle) --$j;  // ищем элементы для левой части
            if($i <= $j){           
                // перебрасываем элементы
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
                // следующая итерация
                $i++; $j--;
            }
        } 
        while($i < $j);
        
        if($low < $j){
          // рекурсивно вызываем сортировку для левой части
          quickSort($arr, $low, $j);
        } 

        if($i < $high){
          // рекурсивно вызываем сортировку для правой части
          quickSort($arr, $i, $high);
        } 
    }
   
  $test = range(0,10);
  shuffle($test);
  echo "<p>Входной массив</p><pre>";
  print_r($test);
  echo "</pre>";
   
  quickSort($test, 0, count($test) - 1);

  echo "<p>Результат</p><pre>";
  print_r($test);
  echo "</pre>";
  ?>
  </div>

  <div id="js_code">
  <p>Это реализация на JavaScript</p>
  <p>Входной массив</p>
  <div id="unsorted"></div>
  <p>Результат</p>
  <div id="sorted"></div>
  </div>
  <div id="refresh" onclick="refresh()">Обновить</div>
</body>
  <script>
    function refresh(){
      window.location.reload();
    }

    function quickSort(arr, low, high) {
        var i = low;                
        var j = high;
        var middle = arr[ Math.round(( low + high ) / 2) ];  // middle - опорный элемент; в нашей реализации он находится посередине между low и high
        
        do {
            while(arr[i] < middle)
              {
                ++i;  // ищем элементы для правой части
              } 
            while(arr[j] > middle)
              {
                --j;  // ищем элементы для левой части
              }
            if(i <= j){           
                // перебрасываем элементы
                var temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
                // следующая итерация
                i++; j--;
            }
        } 
        while(i < j);
        
        if(low < j){
          // рекурсивно вызываем сортировку для левой части
          quickSort(arr, low, j);
        } 

        if(i < high){
          // рекурсивно вызываем сортировку для правой части
          quickSort(arr, i, high);
        } 
    }

  function printArray(array, selector_id){
    var elem = document.getElementById(selector_id);
    for ( var i = 0; i < array.length; i++ ) {
        elem.innerHTML += array[i] + '&nbsp;';
      }
  }

  Array.prototype.shuffle = function() {
    for (var i = this.length - 1; i > 0; i--) {
      var num = Math.floor(Math.random() * (i + 1));
      var d = this[num];
      this[num] = this[i];
      this[i] = d;
  }
  return this;
  }


    var test = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    test.shuffle();
    printArray(test, "unsorted");
    quickSort(test, 0, test.length-1);
    printArray(test, "sorted");
  </script>
  </div>

  <style>
  #php_code, #js_code{
    border: 1px solid #A5A5A5;
    border-radius: 10px 10px 10px 10px;
    float: left;
    margin: 5px;
    padding: 10px;
    width: 44%;
  }

  #refresh{
    background: none repeat scroll 0 0 green;
    border: 1px solid #A5A5A5;
    border-radius: 10px 10px 10px 10px;
    clear: both;
    color: white;
    cursor: pointer;
    margin: 0 auto;
    padding: 5px;
    width: 70px;
  }
  </style>
</html>