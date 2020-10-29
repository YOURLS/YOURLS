<?php


			//error_reporting( E_ALL );
			//ini_set( 'display_errors', '1' );

			// load the system
			include ( 'inc/load.php' );

			// check for session
			$session = new mySession(true);
            $session->setName( 'metro_shrink' );
			$data = $session->get();


			// basic stats data
			$total_urls = $db->fetch( 'SELECT COUNT(*) AS TOTAL FROM ' . $config['table_prefix'] . $config['table_name'] . $add_query );
			$total_urls = $total_urls[0]['TOTAL'];

			$today_urls = $db->fetch( 'SELECT COUNT(*) AS TOTAL FROM ' . $config['table_prefix'] . $config['table_name'] .
			     ' WHERE DATE(created) = DATE(CURDATE())' );
			$today_urls = $today_urls[0]['TOTAL'];

			$total_hits = $db->fetch( 'SELECT SUM(hits) AS TOTAL FROM ' . $config['table_prefix'] . $config['table_name'] );
			$total_hits = $total_hits[0]['TOTAL'] ? $total_hits[0]['TOTAL'] : 0;


            
            // for non ajax requests
            $value='';
            $qrcode = 'display:none;';
            $error = '';     
                   
			// check if have session
            if (isset($data['data']['status'])){
                if($data['data']['status']=='custom_old'){
                    $value = $data['data']['full'];
                    $error = 'Custom name already taken!';
                } else{
                    $value = $data['data']['url'];
                    $qrcode = 'background-image:url(' . $data['data']['url'] . '.qrcode?s=100);';
                }
            }
            
            // handle errors
            if (isset($data['error'])){
                $error = $data['error']['msg'];
            }
            $show_error = $error==''?'display:none;':'';
	    
	    
            
            // kill session data
			$session->kill();
	    $template = $config['shrinky_template'];
            include ( 'inc/templates/'.$template.'/index.tpl' );
