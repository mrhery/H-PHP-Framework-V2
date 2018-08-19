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
			$page->addMetaTop('
				<meta charset="utf-8" />
				<meta http-equiv="X-UA-Compatible" content="IE=edge" />
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
			');
			
		
			$page->addCssLibrary(
				array('
					<link href="' . Router::pathToAsset($route) . 'assets/css/custom.css" rel="stylesheet" type="text/css" media="all" />
				')
			);
			
		//	$page->addLoadCss('assets/css/custom.css');
			$page->addCustomCss("
				body{
					background-color: blue;
				}
			");
			
			$page->addTopScriptLibrary('
				<script src="'. Router::pathToAsset($route) .'assets/js/custom.js"></script>
			');
			
			$page->addBottomScriptLibrary('
				<script src="'. Router::pathToAsset($route) .'assets/js/custom.js"></script>
				
			');
			
			//$page->setMainMenu("widgets/main_menu.php", $route);
			//$page->setFooter("widgets/footer.php");
			//$page->setBodyAttribute('class="fixed-nav sticky-footer bg-dark" id="page-top"');
			
			switch($main){
				/*
					Public area
				*/
				case "index":
				case "Home":
				case "home":
					$page->title = "Hery PHP Framework V2 - Master Hery";
					$page->loadPage("index");
					$page->Render();
				break;
				
				
				
				
				
				#################################################################
				#################################################################
				
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