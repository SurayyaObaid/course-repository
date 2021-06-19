<?php
            $folder_name=$_POST['createfolder'];
            if (!file_exists($output_dir . $folder_name))/* Check folder exists or not */
			{
				@mkdir($output_dir . $folder_name, 0777);/* Create folder by using mkdir function */
	            echo "Folder Created";/* Success Message */
			}
			?>