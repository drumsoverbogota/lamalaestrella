<!DOCTYPE html>
<html>
        <head>
                <title><?php echo $title; ?></title>
				<style>
					
					.center {
					    margin: auto;
					    width: 60%;
					    
						}

				.top-image {
				    display: block;
				    margin-left: auto;
				    margin-right: auto;					    						
					/*width: 25%;*/
					width: 50vw;
					min-width: 300px;	
					margin-bottom: 3cm;		

				}
						
					body {
						background-color: rgb(255, 255, 204);
						margin-top: 2em;
						font-family: "Arial", "Helvetica", sans-serif;
					}
					select {
					    width: 100%;
					    padding: 16px 20px;
					    border: none;
					    border-radius: 4px;
					    background-color: #f1f1f1;
					}

					input[type=input] {
					    width: 100%;
					    padding: 6px 10px;
					    margin: 8px 0;
					    box-sizing: border-box;
					}
					textarea {
					    width: 100%;
					    height: 150px;
					    padding: 12px 20px;
					    box-sizing: border-box;
					    border: 2px solid #ccc;
					    border-radius: 4px;
					    background-color: #f8f8f8;
					    resize: none;
					}		

					table {
						margin-left: auto;
						margin-right: auto;
						border-collapse: collapse;
						width: 70%;

					}
					table, th, td {
						border: 0px solid black;
					}
					h1.title{
					    text-align: center;
					}
					a { 
						color: inherit; 
					} 
					table{
						border-collapse:separate; 
						border-spacing:0.5em;
					}
.wrap {
    width: 320px;
    height: 192px;
    padding: 0;
    overflow: hidden;
}
.frame {
    /*width: 1280px;
    height: 786px;*/
    border: 0;
    -ms-transform: scale(0.75);
    -moz-transform: scale(0.75);
    -o-transform: scale(0.75);
    -webkit-transform: scale(0.75);
    transform: scale(0.75);
    
    -ms-transform-origin: 0 0;
    -moz-transform-origin: 0 0;
    -o-transform-origin: 0 0;
    -webkit-transform-origin: 0 0;
    transform-origin: 0 0;
}				
				</style>                
        </head>
        <body>        
        	<a href="<?php echo site_url('/'); ?>"><img class="top-image" src="<?php echo base_url('images/lamalatransparentec.png'); ?>"></a>
        	</br>
