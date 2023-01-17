<?php
function print_empty_item($pic_id,$pic_url,$item_desc,$item_point){
    echo'<div class="col-sm-4">';
            echo'<div class="card m-3">';
              echo'<div class="card-header bg-transparent border">';
                echo'<div class="row">';
                    echo'<div class="col-sm-8 p-3"><p class="h5" style="color:#222020;font-family:Helvetica, sans-serif;box-sizing: border-box;">';echo $item_desc;echo'</p></div>';
                echo'</div>';
              echo'</div>';
              echo'<div class="card-body">';
                echo"<img src=$pic_url class='card-img-top' alt='Falshdisk' width='10%' height='auto'>";
                echo'<p class="card-text ps-3 pt-3" style="color:#222020;font-family:"Helvetica, sans-serif";box-sizing:border-box;">';echo $item_desc;echo'</p>';
                echo'<div class="row px-3">';
                    echo'<div class="col text-start" style="color:#222020;font-family:"Helvetica, sans-serif";box-sizing:border-box;">';echo $item_point;echo' Point</div>';
                    echo'</div>';
              echo'</div>';
            echo'</div>';
        echo'</div>';

}
?>