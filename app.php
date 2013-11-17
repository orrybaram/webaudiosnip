
<?php

    //make an array of all files in audio directory, and the first is our current file
    $dir    = 'media';
    $ssh_dir = '/home/jasonsigal/itp.jasonsigal.cc/webaudiosnip/example/media';
    $files_list = scandir($dir);

    // function to reset the files list
    function resetFiles($flist) {
    //  $flist = scandir($dir);
        //unset the weird things in the folder that don't have audio extensions (<5 strlen) and then recreate the array without them.
        foreach ($flist as $key => $value) {
            if (strlen($value) < 5) {
                unset($flist[$key]);
                }
            }
        $flist = array_values($flist);  //ah, now that's a clean array!
        return $flist;
        }

    $files_list = resetFiles($files_list);

    //global variables that should be set every time page refreshes
    $current_file = $files_list[0];
    $temp_file = null;
    $old_file = null;
    $orig_file_name = null;
    $orig_file_ext = null;
    $undo_file = null;

    // print_r($files_list);

    //if change file, then change the file. And if any of the other buttons are selected, also keep the file as selected in "file swap"
    if (isset($_POST[change_file]) || isset($_POST[revers]) || isset($_POST[highpass]) || isset($_POST[lowpass]) || isset($_POST[speed_change_big]) || isset($_POST[speed_change_small]) || isset($_POST[undo])) {
        $current_file = $_POST[file_swap];
        $orig_file_name = substr($current_file, 0, strlen($current_file) - 4); //extract original filename pre extension
        $orig_file_ext = substr($current_file,strlen($current_file)-4,4);  //extract original extension
        $undo_file = $orig_file_name."_undo".$orig_file_ext;
        //echo($_post[cfile]);
        } else {
        $current_file = $files_list[0];
        }

    //if undo, then undo file becomes current file, and current file becomes the undo file (you only get one step of undo capability, in the future would be cool to make this an array)
    //
    //  (add code here) //

    if (isset($_POST[undo])) {

        //create a new file that has the same name as the old file but subtract ".wav" then add time then add wav again
        $orig_file_name = substr($current_file, 0, strlen($current_file) - 4); //extract original filename pre extension
        $orig_file_ext = substr($current_file,strlen($current_file)-4,4);  //extract original extension

        //change the name of undo file to _temp
        exec("mv ".$ssh_dir."/".$undo_file." ".$ssh_dir."/".$orig_file_name."_temp".$orig_file_ext);

        //change the name of current_file to _undo
        exec("mv ".$ssh_dir."/".$current_file." ".$ssh_dir."/".$orig_file_name."_undo".$orig_file_ext);

        //change the name of undo file (now known as "_temp") to current file's name
        exec("mv ".$ssh_dir."/".$orig_file_name."_temp".$orig_file_ext." ".$ssh_dir."/".$current_file);
    }

    if (isset($_POST[revers])) {
        
        //create a new file that has the same name as the old file but subtract ".wav" then add time then add wav again
        $orig_file_name = substr($current_file, 0, strlen($current_file) - 4); //extract original filename pre extension
        $orig_file_ext = substr($current_file,strlen($current_file)-4,4);  //extract original extension
        $temp_file = $orig_file_name.time().$orig_file_ext;  //combine with timestamp
        $output = exec("/home/jasonsigal/soxtest/bin/sox ".$ssh_dir."/".$current_file." ".$ssh_dir."/".$temp_file." reverse");
        //mv oldname newname   rename current file to undo file so the name is $orig_file_name."_undo".$orig_file_ext
        //echo($output."\n");
        exec("mv ".$ssh_dir."/".$current_file." ".$ssh_dir."/".$orig_file_name."_undo".$orig_file_ext);
        //echo($output."\n");
        //rename temp file to current file
        exec("mv ".$ssh_dir."/".$temp_file." ".$ssh_dir."/".$current_file);
        //echo($output."\n");
        $undo_file = $orig_file_name."_undo".$orig_file_ext;
            /*
            echo("The Current File is ".$ssh_dir."/".$current_file);
            echo("\n");
            echo("The Undo File is ".$ssh_dir."/".$undo_file);

            echo($temp_file);
            echo($ssh_dir."/".$current_file);
            //echo($output);
            */
        }