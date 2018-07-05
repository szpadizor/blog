<?

 class  Router{

     private $routes;
     public function go(){
        $this->routes = include(ROOT.'/core/routes.php');




      if (!empty($_SERVER['REQUEST_URI'])){
        $uri = trim($_SERVER['REQUEST_URI'],'/');
          //print_r($uri);
      }
      foreach ($this->routes as $address => $rout){
          if(preg_match("~$address~",$uri)){

   // підміняю blog/blogpost/$1/$2  на blog/blogpost/oleg/22
   //  виходить шлях в якому вказано контролер/екшен/ім'я блогера/номер статті

    $internalRoute = preg_replace("~$address~",$rout,$uri);

   // ділю шлях з routes.php на частини для виначення контролера та екшена
   // ділить там де находить слеш '/' (blog/blogpost/oleg/22), на 4 частини всі частини
   // попадають в масив, стають його елементами.

    $divide = explode('/',$internalRoute);


    // визначаю і'мя контролера і видаляю з масиву 0-вий запис, в якому містисься
    // назва контролера

    $controllerName = array_shift($divide).'Controller';
        // напр. виходить $controllerName = blogController
       // оскільки файли контролерів починаються з великої
       // робимо першу букву великою
    $controllerName = ucfirst($controllerName);
       //  напр. виходить $controllerName = BlogController

    $action='action'.ucfirst(array_shift($divide));

        // в масиві $divide  залишились параметри [0] => oleg, [1]=> 22

        // створюю шлях до необхідного контролера
    $controllerWay = ROOT.'/controllers/'.$controllerName.'.php';
    include ($controllerWay);
   /* debug($controllerWay);
    debug($action);*/
    $controllerRun = new $controllerName;
    $controllerRun->$action($divide);
        if($controllerRun == true){break;}

          }
      }
    }
 }