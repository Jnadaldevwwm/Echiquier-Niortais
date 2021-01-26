<?php

function img64ToPng($data){
    if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
        $data = substr($data, strpos($data, ',') + 1);
        $type = strtolower($type[1]); // jpg, png, gif
    
        if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
            throw new \Exception('invalid image type');
        }
        $data = str_replace( ' ', '+', $data );
        $data = base64_decode($data);
    
        if ($data === false) {
            throw new \Exception('base64_decode failed');
        }
    } else {
        throw new \Exception('did not match data URI with image data');
    }
    $nomImg = md5(uniqid()).".{$type}";
    file_put_contents($nomImg, $data);
    rename($nomImg,'images/articleImg/'.$nomImg);
}

function articleImageReplacer($content){
    $testString = '<p>bonjour</p><p>voici une image</p><img src=\'blablabla\'>Voila c\'est tout';
    $resultats = array();
    $pattern = '/<img([\w\W]+?)>/';
    preg_match($pattern, $testString, $resultats);
    print_r($matches);
}




// <?php 
//     $data = "data:image/png;base64,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ym7UTVEmo+OEDIr1BbCjo8L/Nmmao8NkLjKqJrEfx8ff6gGA7wDgq2R8fGzX+PhXVLcjdwHozJnU7hOGQ180e9QnqEdfYvifGvpfyRsOMDq88ToAAAAJcEhZcwAACxMAAAsTAQCanBgAAAXXaVRYdFhNTDpjb20uYWRvYmUueG1wAAAAAAA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzE0NSA3OS4xNjM0OTksIDIwMTgvMDgvMTMtMTY6NDA6MjIgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE5IChNYWNpbnRvc2gpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0xMC0wMlQxMTo1MjoyMSswMjowMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAyMC0xMC0wMlQxMTo1MjoyMSswMjowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMTAtMDJUMTE6NTI6MjErMDI6MDAiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ODhmODgzMDgtY2I0My00NjIzLTg5MjctODRhNjY4NGE0OGRlIiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6ZDgzMWJkYzItYjliZS1iZTRhLTgzMjAtMTM0ZTM5MWUwNmU5IiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6Y2UwYTJmYTktODI1Ni00NDA5LTgzYjUtMmE2ZDMxOTk3MDFiIiBkYzpmb3JtYXQ9ImltYWdlL3BuZyIgcGhvdG9zaG9wOkNvbG9yTW9kZT0iMyI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6Y2UwYTJmYTktODI1Ni00NDA5LTgzYjUtMmE2ZDMxOTk3MDFiIiBzdEV2dDp3aGVuPSIyMDIwLTEwLTAyVDExOjUyOjIxKzAyOjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxOSAoTWFjaW50b3NoKSIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6ODhmODgzMDgtY2I0My00NjIzLTg5MjctODRhNjY4NGE0OGRlIiBzdEV2dDp3aGVuPSIyMDIwLTEwLTAyVDExOjUyOjIxKzAyOjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxOSAoTWFjaW50b3NoKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5W9thwAAAIBUlEQVRIx51Xa2wU1xX+5rG7XtbrGtv4ERfipQEXjHFDFWSbUkhFcdJU4aVQAaXGBYVQFAT8oKhSSIsiIlCjghShUJEiRCgigIIBY6zg0jZtrOIioAjFpQFhNzTYULBjL/bu7Mz0O3d21sZ9/OhIx3PnzL3n8Z3vnFkDoy9dB4LBjBjhILRQwH8XQzBcgaAWdl0XvlQ985yWlROpNMdEIuqcaULXNG4XY49f2qjnMZQ6ijvindwd/rGo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";


// function img64ToPng($data){
//     if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
//         $data = substr($data, strpos($data, ',') + 1);
//         $type = strtolower($type[1]);
    
//         if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
//             throw new \Exception('invalid image type');
//         }
//         $data = str_replace( ' ', '+', $data );
//         $data = base64_decode($data);
    
//         if ($data === false) {
//             throw new \Exception('base64_decode error');
//         }
//     } else {
//         throw new \Exception('did not match data URI with image data');
//     }
//     $nomImg = md5(uniqid()).".{$type}";
//     file_put_contents($nomImg, $data);
//     rename($nomImg,'dossier/'.$nomImg);
// }
// //img64ToPng($data);

// function articleImageReplacer($content){
//     $testString = "<p>bonjour</p><p>voici une image</p><img src='blablabla'> Voila une autre <img src='uneautreimg.jpg'>";
//     $resultats = array();
//     $pattern = '/<img([\w\W]+?)>/';
//     preg_match_all($pattern, $testString, $resultats);
//     foreach($resultats[1] as $value){
//         $nomRempaclement = 'testRempalcement';

//         $testString = str_replace($value,$nomRempaclement,$testString);
//     }
//     echo $testString;
//     //print_r($resultats);
// }
// articleImageReplacer('alo');