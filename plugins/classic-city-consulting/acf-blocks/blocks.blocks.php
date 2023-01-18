<?php

// THE BLOCKS
add_action('init', 'ccc_custom_acf_blocks');
function ccc_custom_acf_blocks() {

	if(function_exists('acf_register_block_type') ) {

        // Alert Bar
        acf_register_block_type(array(
            'name'              => 'alert-bar',
            'title'             => 'Alert Bar',
            'description'       => 'Bar that shows the content of the alert from Theme Settings',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/alert-bar.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M320 69.25L567.8 33.86C578.7 32.29 589.3 38.43 593.4 48.7L626.6 131.7C633.8 149.6 623.6 169.7 604.1 174.6L437.3 218.1C420.8 222.3 403.5 215.7 394 201.7L320 91.66L245.1 201.7C236.5 215.8 219.2 222.3 202.7 218.1L35.04 174.6C16.38 169.7 6.201 149.6 13.36 131.7L46.57 48.7C50.68 38.43 61.29 32.29 72.25 33.86L320 69.25zM28.22 137.7C24.64 146.6 29.73 156.7 39.06 159.1L206.7 202.6C216.6 205.1 226.1 201.2 232.7 192.7L306.2 83.45L69.98 49.7C66.33 49.18 62.79 51.22 61.42 54.65L28.22 137.7zM333.8 83.45L407.3 192.7C413 201.2 423.4 205.1 433.3 202.6L600.9 159.1C610.3 156.7 615.4 146.6 611.8 137.7L578.6 54.65C577.2 51.22 573.7 49.18 570 49.7L333.8 83.45zM560 216.1L576 211.6V378.5C576 400.5 561 419.7 539.6 425.1L331.6 477.1C323.1 479 316 479 308.4 477.1L100.4 425.1C78.99 419.7 63.1 400.5 63.1 378.5V211.6L79.1 216.1V378.5C79.1 393.2 89.99 406 104.2 409.6L311.1 461.5V199.1C311.1 195.6 315.6 191.1 319.1 191.1C324.4 191.1 328 195.6 328 199.1V461.5L535.8 409.6C550 406 560 393.2 560 378.5L560 216.1z"/></svg>',
            'keywords'          => array( 'alert', 'message' )
        ));


        // Container
        acf_register_block_type(array(
            'name'              => 'container',
            'title'             => 'Container',
            'description'       => 'Container',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/container.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M320 69.25L567.8 33.86C578.7 32.29 589.3 38.43 593.4 48.7L626.6 131.7C633.8 149.6 623.6 169.7 604.1 174.6L437.3 218.1C420.8 222.3 403.5 215.7 394 201.7L320 91.66L245.1 201.7C236.5 215.8 219.2 222.3 202.7 218.1L35.04 174.6C16.38 169.7 6.201 149.6 13.36 131.7L46.57 48.7C50.68 38.43 61.29 32.29 72.25 33.86L320 69.25zM28.22 137.7C24.64 146.6 29.73 156.7 39.06 159.1L206.7 202.6C216.6 205.1 226.1 201.2 232.7 192.7L306.2 83.45L69.98 49.7C66.33 49.18 62.79 51.22 61.42 54.65L28.22 137.7zM333.8 83.45L407.3 192.7C413 201.2 423.4 205.1 433.3 202.6L600.9 159.1C610.3 156.7 615.4 146.6 611.8 137.7L578.6 54.65C577.2 51.22 573.7 49.18 570 49.7L333.8 83.45zM560 216.1L576 211.6V378.5C576 400.5 561 419.7 539.6 425.1L331.6 477.1C323.1 479 316 479 308.4 477.1L100.4 425.1C78.99 419.7 63.1 400.5 63.1 378.5V211.6L79.1 216.1V378.5C79.1 393.2 89.99 406 104.2 409.6L311.1 461.5V199.1C311.1 195.6 315.6 191.1 319.1 191.1C324.4 191.1 328 195.6 328 199.1V461.5L535.8 409.6C550 406 560 393.2 560 378.5L560 216.1z"/></svg>',
            'keywords'          => array( 'container', 'box' ),
            'supports'		    => [
                'anchor'		=> true,
                'customClassName'	=> true,
                'jsx' 			=> true,
            ]
        ));

        // Font Awesome Icon
        acf_register_block_type(array(
            'name'              => 'font-awesome-icon',
            'title'             => 'Font Awesome Icon',
            'description'       => 'Displays a Font Awesome icon',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/font-awesome-icon.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M480 0H32C14.3 0 0 14.3 0 32v128c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32zM32 512h288V384H32v128zm160-160h288V224H192v128zM32 224v128h128V224H32zm320 288h128V384H352v128z"/></svg>',
            'keywords'          => array( 'font', 'icon', 'image', 'awesome' )
        ));

        // Hero
        acf_register_block_type(array(
            'name'              => 'hero',
            'title'             => 'Hero',
            'description'       => 'Hero section for pages',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/hero.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M448 472c0 4.422-3.594 8-8 8h-112C323.6 480 320 476.4 320 472s3.594-8 8-8h48V264h-304v200h48C124.4 464 128 467.6 128 472S124.4 480 120 480h-112C3.594 480 0 476.4 0 472s3.594-8 8-8h48v-416h-48C3.594 48 0 44.42 0 40S3.594 32 8 32h112C124.4 32 128 35.58 128 40S124.4 48 120 48h-48v200h304V48h-48C323.6 48 320 44.42 320 40S323.6 32 328 32h112C444.4 32 448 35.58 448 40S444.4 48 440 48h-48v416h48C444.4 464 448 467.6 448 472z"/></svg>',
            'keywords'          => array( 'header', 'hero' ),
        ));

        // Icon List
        acf_register_block_type(array(
            'name'              => 'icon-list',
            'title'             => 'Icon List',
            'description'       => 'Pulls from the repeater on the Theme Options page for all icons',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/icon-list.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M496 27.52C496 22.47 491.4 18.68 486.4 19.67L358.4 45.27C354.7 46.02 352 49.3 352 53.12V207.1C352 234.5 323.3 256 288 256C252.7 256 224 234.5 224 208C224 181.5 252.7 160 288 160C307.1 160 324.3 166.3 336 176.3V53.12C336 41.68 344.1 31.83 355.3 29.58L483.3 3.982C498.1 1.012 512 12.37 512 27.52V175.1C512 202.5 483.3 224 448 224C412.7 224 384 202.5 384 176C384 149.5 412.7 128 448 128C467.1 128 484.3 134.3 496 144.3V27.52zM288 176C273.5 176 260.9 180.4 252.3 186.9C243.8 193.3 240 200.9 240 208C240 215.1 243.8 222.7 252.3 229.1C260.9 235.6 273.5 240 288 240C302.5 240 315.1 235.6 323.7 229.1C332.2 222.7 336 215.1 336 207.1C336 200.9 332.2 193.3 323.7 186.9C315.1 180.4 302.5 176 288 176zM448 144C433.5 144 420.9 148.4 412.3 154.9C403.8 161.3 400 168.9 400 176C400 183.1 403.8 190.7 412.3 197.1C420.9 203.6 433.5 208 448 208C462.5 208 475.1 203.6 483.7 197.1C492.2 190.7 496 183.1 496 175.1C496 168.9 492.2 161.3 483.7 154.9C475.1 148.4 462.5 144 448 144zM485.4 272.8L451.4 368H493.3C503.6 368 512 376.4 512 386.7C512 392.5 509.3 397.1 504.8 401.5L366.1 509.4C363.9 511.1 361.2 512 358.4 512C349.8 512 343.7 503.4 346.6 495.2L380.6 400H338.2C328.1 400 320 391.9 320 381.8C320 376.3 322.6 370.1 326.1 367.5L465.8 258.7C468 256.9 470.8 255.1 473.6 255.1C482.2 255.1 488.3 264.6 485.4 272.8L485.4 272.8zM336 381.8C336 383 336.1 384 338.2 384H392C394.6 384 397 385.3 398.5 387.4C400 389.5 400.4 392.2 399.5 394.7L365.7 489.4L494.9 388.9C495.6 388.4 496 387.6 496 386.7C496 385.2 494.8 384 493.3 384H440C437.4 384 434.1 382.7 433.5 380.6C431.1 378.5 431.6 375.8 432.5 373.3L466.3 278.7L336.8 380.1C336.3 380.5 336 381.2 336 381.8L336 381.8zM200 408C200 438.9 174.9 464 144 464C113.1 464 88 438.9 88 408C88 377.1 113.1 352 144 352C174.9 352 200 377.1 200 408zM144 448C166.1 448 184 430.1 184 408C184 385.9 166.1 368 144 368C121.9 368 104 385.9 104 408C104 430.1 121.9 448 144 448zM208.8 289.7L216 304H240C266.5 304 288 325.5 288 352V464C288 490.5 266.5 512 240 512H48C21.49 512 0 490.5 0 464V352C0 325.5 21.49 304 48 304H71.1L79.16 289.7C84.58 278.8 95.66 271.1 107.8 271.1H180.2C192.3 271.1 203.4 278.8 208.8 289.7L208.8 289.7zM48 320C30.33 320 16 334.3 16 352V464C16 481.7 30.33 496 48 496H240C257.7 496 272 481.7 272 464V352C272 334.3 257.7 320 240 320H206.1L194.5 296.8C191.8 291.4 186.3 287.1 180.2 287.1H107.8C101.7 287.1 96.18 291.4 93.47 296.8L81.89 320H48zM59.72 6.047C82.49 2.252 105.7 9.686 122 26.01L128 31.1L133.1 26.01C150.3 9.686 173.5 2.252 196.3 6.047C230.7 11.79 256 41.61 256 76.54V79.45C256 100.2 247.4 120 232.2 134.2L141.8 218.5C138.1 222 133.1 224 128 224C122.9 224 117.9 222 114.2 218.5L23.79 134.2C8.617 120 0 100.2 0 79.45V76.54C0 41.61 25.26 11.79 59.72 6.047V6.047zM110.7 37.32C98.03 24.65 80.02 18.88 62.35 21.83C35.6 26.29 15.1 49.43 15.1 76.54V79.45C15.1 95.78 22.78 111.4 34.71 122.5L125.1 206.8C125.9 207.6 126.9 208 127.1 208C129.1 208 130.1 207.6 130.9 206.8L221.3 122.5C233.2 111.4 239.1 95.78 239.1 79.45V76.54C239.1 49.43 220.4 26.29 193.6 21.83C175.1 18.88 157.1 24.65 145.3 37.32L127.1 54.63L110.7 37.32z"/></svg>',
            'keywords'          => array( 'icon', 'link', 'social' ),

        ));

        // Icon Pod
        acf_register_block_type(array(
            'name'              => 'icon-pod',
            'title'             => 'Icon Pod',
            'description'       => 'A simple pod that is headlined by an icon',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/icon-pod.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M496 27.52C496 22.47 491.4 18.68 486.4 19.67L358.4 45.27C354.7 46.02 352 49.3 352 53.12V207.1C352 234.5 323.3 256 288 256C252.7 256 224 234.5 224 208C224 181.5 252.7 160 288 160C307.1 160 324.3 166.3 336 176.3V53.12C336 41.68 344.1 31.83 355.3 29.58L483.3 3.982C498.1 1.012 512 12.37 512 27.52V175.1C512 202.5 483.3 224 448 224C412.7 224 384 202.5 384 176C384 149.5 412.7 128 448 128C467.1 128 484.3 134.3 496 144.3V27.52zM288 176C273.5 176 260.9 180.4 252.3 186.9C243.8 193.3 240 200.9 240 208C240 215.1 243.8 222.7 252.3 229.1C260.9 235.6 273.5 240 288 240C302.5 240 315.1 235.6 323.7 229.1C332.2 222.7 336 215.1 336 207.1C336 200.9 332.2 193.3 323.7 186.9C315.1 180.4 302.5 176 288 176zM448 144C433.5 144 420.9 148.4 412.3 154.9C403.8 161.3 400 168.9 400 176C400 183.1 403.8 190.7 412.3 197.1C420.9 203.6 433.5 208 448 208C462.5 208 475.1 203.6 483.7 197.1C492.2 190.7 496 183.1 496 175.1C496 168.9 492.2 161.3 483.7 154.9C475.1 148.4 462.5 144 448 144zM485.4 272.8L451.4 368H493.3C503.6 368 512 376.4 512 386.7C512 392.5 509.3 397.1 504.8 401.5L366.1 509.4C363.9 511.1 361.2 512 358.4 512C349.8 512 343.7 503.4 346.6 495.2L380.6 400H338.2C328.1 400 320 391.9 320 381.8C320 376.3 322.6 370.1 326.1 367.5L465.8 258.7C468 256.9 470.8 255.1 473.6 255.1C482.2 255.1 488.3 264.6 485.4 272.8L485.4 272.8zM336 381.8C336 383 336.1 384 338.2 384H392C394.6 384 397 385.3 398.5 387.4C400 389.5 400.4 392.2 399.5 394.7L365.7 489.4L494.9 388.9C495.6 388.4 496 387.6 496 386.7C496 385.2 494.8 384 493.3 384H440C437.4 384 434.1 382.7 433.5 380.6C431.1 378.5 431.6 375.8 432.5 373.3L466.3 278.7L336.8 380.1C336.3 380.5 336 381.2 336 381.8L336 381.8zM200 408C200 438.9 174.9 464 144 464C113.1 464 88 438.9 88 408C88 377.1 113.1 352 144 352C174.9 352 200 377.1 200 408zM144 448C166.1 448 184 430.1 184 408C184 385.9 166.1 368 144 368C121.9 368 104 385.9 104 408C104 430.1 121.9 448 144 448zM208.8 289.7L216 304H240C266.5 304 288 325.5 288 352V464C288 490.5 266.5 512 240 512H48C21.49 512 0 490.5 0 464V352C0 325.5 21.49 304 48 304H71.1L79.16 289.7C84.58 278.8 95.66 271.1 107.8 271.1H180.2C192.3 271.1 203.4 278.8 208.8 289.7L208.8 289.7zM48 320C30.33 320 16 334.3 16 352V464C16 481.7 30.33 496 48 496H240C257.7 496 272 481.7 272 464V352C272 334.3 257.7 320 240 320H206.1L194.5 296.8C191.8 291.4 186.3 287.1 180.2 287.1H107.8C101.7 287.1 96.18 291.4 93.47 296.8L81.89 320H48zM59.72 6.047C82.49 2.252 105.7 9.686 122 26.01L128 31.1L133.1 26.01C150.3 9.686 173.5 2.252 196.3 6.047C230.7 11.79 256 41.61 256 76.54V79.45C256 100.2 247.4 120 232.2 134.2L141.8 218.5C138.1 222 133.1 224 128 224C122.9 224 117.9 222 114.2 218.5L23.79 134.2C8.617 120 0 100.2 0 79.45V76.54C0 41.61 25.26 11.79 59.72 6.047V6.047zM110.7 37.32C98.03 24.65 80.02 18.88 62.35 21.83C35.6 26.29 15.1 49.43 15.1 76.54V79.45C15.1 95.78 22.78 111.4 34.71 122.5L125.1 206.8C125.9 207.6 126.9 208 127.1 208C129.1 208 130.1 207.6 130.9 206.8L221.3 122.5C233.2 111.4 239.1 95.78 239.1 79.45V76.54C239.1 49.43 220.4 26.29 193.6 21.83C175.1 18.88 157.1 24.65 145.3 37.32L127.1 54.63L110.7 37.32z"/></svg>',
            'keywords'          => array( 'icon', 'pod', 'box' ),

        ));

        // Logo
        acf_register_block_type(array(
            'name'              => 'logo',
            'title'             => 'Logo',
            'description'       => 'Pulls the Logo from the Theme options page',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/logo.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M368 320h-64V192h64C412.2 192 448 156.2 448 112S412.2 32 368 32S288 67.82 288 112v64H160v-64C160 67.82 124.2 32 80 32S0 67.82 0 112S35.82 192 80 192h64v128h-64C35.82 320 0 355.8 0 400S35.82 480 80 480S160 444.2 160 400v-64h128v64c0 44.18 35.82 80 80 80s80-35.82 80-80S412.2 320 368 320zM304 112c0-35.29 28.71-64 64-64s64 28.71 64 64s-28.71 64-64 64h-64V112zM80 176c-35.29 0-64-28.71-64-64s28.71-64 64-64s64 28.71 64 64v64H80zM144 400c0 35.29-28.71 64-64 64s-64-28.71-64-64s28.71-64 64-64h64V400zM160 320V192h128v128H160zM368 464c-35.29 0-64-28.71-64-64v-64h64c35.29 0 64 28.71 64 64S403.3 464 368 464z"/></svg>',
            'keywords'          => array( 'logo', 'brand', 'box' ),

        ));

        // Podcast Single Content
        acf_register_block_type(array(
            'name'              => 'podcast-single-content',
            'title'             => 'Podcast Single Content',
            'description'       => 'Only use this block on a Single Podcast template; shows all podcast information',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/podcast-single-content.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M480 0H32C14.3 0 0 14.3 0 32v128c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32zM32 512h288V384H32v128zm160-160h288V224H192v128zM32 224v128h128V224H32zm320 288h128V384H352v128z"/></svg>',
            'keywords'          => array( 'podcast', 'audio', 'template' )
        ));


        // Podcast Callout
        acf_register_block_type(array(
            'name'              => 'podcast-callout',
            'title'             => 'Podcast Callout',
            'description'       => 'Only use this block on a Single Podcast template',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/podcast-callout.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M480 0H32C14.3 0 0 14.3 0 32v128c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32zM32 512h288V384H32v128zm160-160h288V224H192v128zM32 224v128h128V224H32zm320 288h128V384H352v128z"/></svg>',
            'keywords'          => array( 'podcast', 'audio', 'template' )
        ));

        // Podcast Embed
        acf_register_block_type(array(
            'name'              => 'podcast-embed',
            'title'             => 'Podcast Embed',
            'description'       => 'Only use this block on a Single Podcast template',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/podcast-embed.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M480 0H32C14.3 0 0 14.3 0 32v128c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32zM32 512h288V384H32v128zm160-160h288V224H192v128zM32 224v128h128V224H32zm320 288h128V384H352v128z"/></svg>',
            'keywords'          => array( 'podcast', 'audio', 'template' )
        ));

        // Podcast Quote
        acf_register_block_type(array(
            'name'              => 'podcast-quote',
            'title'             => 'Podcast Quote',
            'description'       => 'Only use this block on a Single Podcast template',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/podcast-quote.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M480 0H32C14.3 0 0 14.3 0 32v128c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32zM32 512h288V384H32v128zm160-160h288V224H192v128zM32 224v128h128V224H32zm320 288h128V384H352v128z"/></svg>',
            'keywords'          => array( 'podcast', 'audio', 'template' )
        ));

        // Podcast Sponsors
        acf_register_block_type(array(
            'name'              => 'podcast-sponsors',
            'title'             => 'Podcast Sponsors',
            'description'       => 'Only use this block on a Single Podcast template',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/podcast-sponsors.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M480 0H32C14.3 0 0 14.3 0 32v128c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32zM32 512h288V384H32v128zm160-160h288V224H192v128zM32 224v128h128V224H32zm320 288h128V384H352v128z"/></svg>',
            'keywords'          => array( 'podcast', 'audio', 'template' )
        ));

        // Podcast Summary
        acf_register_block_type(array(
            'name'              => 'podcast-summary',
            'title'             => 'Podcast Summary',
            'description'       => 'Only use this block on a Single Podcast template',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/podcast-summary.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M480 0H32C14.3 0 0 14.3 0 32v128c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32zM32 512h288V384H32v128zm160-160h288V224H192v128zM32 224v128h128V224H32zm320 288h128V384H352v128z"/></svg>',
            'keywords'          => array( 'podcast', 'audio', 'template' )
        ));

        // Podcast Transcript
        acf_register_block_type(array(
            'name'              => 'podcast-transcript',
            'title'             => 'Podcast Transcript',
            'description'       => 'Only use this block on a Single Podcast template; Transcript',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/podcast-transcript.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M480 0H32C14.3 0 0 14.3 0 32v128c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32zM32 512h288V384H32v128zm160-160h288V224H192v128zM32 224v128h128V224H32zm320 288h128V384H352v128z"/></svg>',
            'keywords'          => array( 'podcast', 'audio', 'template' )
        ));

        // Success
        acf_register_block_type(array(
            'name'              => 'success',
            'title'             => 'Success',
            'description'       => 'Row of Success icons',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/success.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><defs><style>.fa-secondary{opacity:.4}</style></defs><path class="fa-primary" d="M160 64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V192H0V112C0 85.49 21.49 64 48 64H96V32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32V64z"/><path class="fa-secondary" d="M0 192H448V464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192z"/></svg>',
            'keywords'          => array( 'success', 'icon' ),
        ));

        // This Post Button
        acf_register_block_type(array(
            'name'              => 'this-post-button',
            'title'             => 'This Post Button',
            'description'       => 'For use within Query Blocks (button for This Post)',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/this-post-button.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M448 472c0 4.422-3.594 8-8 8h-112C323.6 480 320 476.4 320 472s3.594-8 8-8h48V264h-304v200h48C124.4 464 128 467.6 128 472S124.4 480 120 480h-112C3.594 480 0 476.4 0 472s3.594-8 8-8h48v-416h-48C3.594 48 0 44.42 0 40S3.594 32 8 32h112C124.4 32 128 35.58 128 40S124.4 48 120 48h-48v200h304V48h-48C323.6 48 320 44.42 320 40S323.6 32 328 32h112C444.4 32 448 35.58 448 40S444.4 48 440 48h-48v416h48C444.4 464 448 467.6 448 472z"/></svg>',
            'keywords'          => array( 'post', 'read more' ),
        ));

        // People Detail
        acf_register_block_type(array(
            'name'              => 'people-details',
            'title'             => 'People Details',
            'description'       => '',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/people-detail.php',
            'category'          => prefix(),
            'keywords'          => array( 'people', 'pod', 'person' ),

        ));
        // Fifty Fifty
        acf_register_block_type(array(
            'name'              => 'fifty-fifty',
            'title'             => 'Fifty Fifty',
            'description'       => 'Two column layout with a full sized image in one of the columns',
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/fifty-fifty.php',
            'category'          => prefix(),
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M496 27.52C496 22.47 491.4 18.68 486.4 19.67L358.4 45.27C354.7 46.02 352 49.3 352 53.12V207.1C352 234.5 323.3 256 288 256C252.7 256 224 234.5 224 208C224 181.5 252.7 160 288 160C307.1 160 324.3 166.3 336 176.3V53.12C336 41.68 344.1 31.83 355.3 29.58L483.3 3.982C498.1 1.012 512 12.37 512 27.52V175.1C512 202.5 483.3 224 448 224C412.7 224 384 202.5 384 176C384 149.5 412.7 128 448 128C467.1 128 484.3 134.3 496 144.3V27.52zM288 176C273.5 176 260.9 180.4 252.3 186.9C243.8 193.3 240 200.9 240 208C240 215.1 243.8 222.7 252.3 229.1C260.9 235.6 273.5 240 288 240C302.5 240 315.1 235.6 323.7 229.1C332.2 222.7 336 215.1 336 207.1C336 200.9 332.2 193.3 323.7 186.9C315.1 180.4 302.5 176 288 176zM448 144C433.5 144 420.9 148.4 412.3 154.9C403.8 161.3 400 168.9 400 176C400 183.1 403.8 190.7 412.3 197.1C420.9 203.6 433.5 208 448 208C462.5 208 475.1 203.6 483.7 197.1C492.2 190.7 496 183.1 496 175.1C496 168.9 492.2 161.3 483.7 154.9C475.1 148.4 462.5 144 448 144zM485.4 272.8L451.4 368H493.3C503.6 368 512 376.4 512 386.7C512 392.5 509.3 397.1 504.8 401.5L366.1 509.4C363.9 511.1 361.2 512 358.4 512C349.8 512 343.7 503.4 346.6 495.2L380.6 400H338.2C328.1 400 320 391.9 320 381.8C320 376.3 322.6 370.1 326.1 367.5L465.8 258.7C468 256.9 470.8 255.1 473.6 255.1C482.2 255.1 488.3 264.6 485.4 272.8L485.4 272.8zM336 381.8C336 383 336.1 384 338.2 384H392C394.6 384 397 385.3 398.5 387.4C400 389.5 400.4 392.2 399.5 394.7L365.7 489.4L494.9 388.9C495.6 388.4 496 387.6 496 386.7C496 385.2 494.8 384 493.3 384H440C437.4 384 434.1 382.7 433.5 380.6C431.1 378.5 431.6 375.8 432.5 373.3L466.3 278.7L336.8 380.1C336.3 380.5 336 381.2 336 381.8L336 381.8zM200 408C200 438.9 174.9 464 144 464C113.1 464 88 438.9 88 408C88 377.1 113.1 352 144 352C174.9 352 200 377.1 200 408zM144 448C166.1 448 184 430.1 184 408C184 385.9 166.1 368 144 368C121.9 368 104 385.9 104 408C104 430.1 121.9 448 144 448zM208.8 289.7L216 304H240C266.5 304 288 325.5 288 352V464C288 490.5 266.5 512 240 512H48C21.49 512 0 490.5 0 464V352C0 325.5 21.49 304 48 304H71.1L79.16 289.7C84.58 278.8 95.66 271.1 107.8 271.1H180.2C192.3 271.1 203.4 278.8 208.8 289.7L208.8 289.7zM48 320C30.33 320 16 334.3 16 352V464C16 481.7 30.33 496 48 496H240C257.7 496 272 481.7 272 464V352C272 334.3 257.7 320 240 320H206.1L194.5 296.8C191.8 291.4 186.3 287.1 180.2 287.1H107.8C101.7 287.1 96.18 291.4 93.47 296.8L81.89 320H48zM59.72 6.047C82.49 2.252 105.7 9.686 122 26.01L128 31.1L133.1 26.01C150.3 9.686 173.5 2.252 196.3 6.047C230.7 11.79 256 41.61 256 76.54V79.45C256 100.2 247.4 120 232.2 134.2L141.8 218.5C138.1 222 133.1 224 128 224C122.9 224 117.9 222 114.2 218.5L23.79 134.2C8.617 120 0 100.2 0 79.45V76.54C0 41.61 25.26 11.79 59.72 6.047V6.047zM110.7 37.32C98.03 24.65 80.02 18.88 62.35 21.83C35.6 26.29 15.1 49.43 15.1 76.54V79.45C15.1 95.78 22.78 111.4 34.71 122.5L125.1 206.8C125.9 207.6 126.9 208 127.1 208C129.1 208 130.1 207.6 130.9 206.8L221.3 122.5C233.2 111.4 239.1 95.78 239.1 79.45V76.54C239.1 49.43 220.4 26.29 193.6 21.83C175.1 18.88 157.1 24.65 145.3 37.32L127.1 54.63L110.7 37.32z"/></svg>',
            'keywords'          => array( 'image', 'content', 'column', '50' ),
            'supports'          => [
                'anchor'        => true,
                'customClassName'   => true,
                'jsx'           => true,
            ]

        ));

        // ACCORDION
        acf_register_block(array(
            'name'              => 'accordion',
            'title'             => __('Accordion'),
            'description'       => __('A custom accordion block.'),
            'category'          => prefix(),
            'icon'              => 'arrow-down-alt2',
            'keywords'          => array( 'accordion', 'read more' ),
            'render_template'   => CCC_ACF_BLOCK_PATH.'templates/accordion.php',
            'supports'          => [
                'anchor'        => true,
                'customClassName'   => true,
                'jsx'           => true,
            ]
        ));



    }
}