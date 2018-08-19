<?php
require_once(dirname(__DIR__) . "/Misc/document_access.php");

class App{
	public function __construct($route = "", $autoload = false){
		$main = Router::get("main", $route);
		$path = __DIR__ . "/View/pages/" . $main . ".php";
		
		/*
			If you are creating page directly and not using Page Class, you may enable $autoload = true in new App() at index.php
		*/
		if($autoload){
			if(is_file(__DIR__ . "/View/pages/" . $main . ".php")){
				Loader::Include("header");
				include_once($path);
				Loader::Include("footer");
			}else{
				die("Requested file " . $main . ".php not found in current application directory.");
			}
		}else{
			$page = new Page();
			$page->addMetaTop();
			$page->addCssLibrary(
				array(
					'<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">',
					'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">'
				)
			);
			$page->addLoadCss('assets/css/custom.css');
			$page->addCustomCss("
				.h-mt-20{
					margin-top: 20px;
				}
				
				.h-mb-20{
					margin-bottom: 20px;
				}
			");
			$page->addTopScriptLibrary('
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
			');
			
			switch($main){
				case "index":
				case "Home":
					$page->title = "Intelhost Cloud: Public File share & download";
					$page->loadPage("index");
					$page->Render();
				break;
				
				case "files":
					$page->title = "Intelhost Cloud: Download  File";
					$page->loadPage("file", $route);
					$page->Render();
				break;
				
				case "folders":
					$page->title = "Intelhost Cloud: Download Folder";
					$page->loadPage("folder", $route);
					$page->Render();
				break;
				
				
				
				
				
				
				
				
				
				
				
				/*
				* Please left below cases and do not remove these line
				*/
				case "assets":
					$filename = Router::get("path", $route);
					
					if(!empty($filename)){
						Loader::Asset($filename);
					}else{
						$page->title = "Page Not Found";
						$page->loadPage("404");
						$page->Render();
					}
				break;
				
				case "medias":
					Loader::Image($route);
				break;
				
				default:
					$page->title = "Page Not Found";
					$page->loadPage("404");
					$page->Render();
				break;
			}
		}
	}
}

?>