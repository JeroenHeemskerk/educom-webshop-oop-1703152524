<?php
include_once "BasicDoc.php";
// require_once "../data_access_layer.php";
// require_once "../session_manager.php";

abstract class ProductDoc extends BasicDoc
{
  // protected $data;
  protected $model;
  public function __construct($model)
  {
    $this->model = $model;
  }


  protected function showHeaderContent()
  {
    $this->showTitle();
    $this->showCssLinks();
    $this->showHeader();
  }

  private function showTitle()
  {
    echo "<title>";
    // echo $this->data["title"];
    // echo ucfirst($this->data['page']);
    echo ($this->model->page);
    echo "</title>";
  }

  private function showCssLinks()
  {
    echo "<link rel=\"stylesheet\" href=\"./CSS/stylesheet.css\">";
    echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">";
    echo "<link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">";
  }

  protected function showBodyContent()
  {
    echo "<div class=\"text\">";
    $this->showMenu();
    $this->showContent();
    // $this->showForm();
    echo "</div>";
    $this->showFooter();
  }

  protected function showHeader()
  {
    // echo "<h1>";
    // echo $this->data["header"];
    // echo "</h1>";
  }

  private function showMenuItem($link, $label)
  {
    echo "<li><a href=\"index.php?page=$link\">$label</a></li>";
  }
  // private function showMenu()
  // {
  //   $menu['menu'] = array(
  //     'home' => 'Home',
  //     'about' => 'About',
  //     'contact' => 'Contact',
  //     'webshop' => 'Webshop',
  //     'top5' => 'Top 5'
  //   );
  //   echo '<nav>' . PHP_EOL;
  //   echo '<ul class="menu">' . PHP_EOL;
  //   foreach ($menu['menu'] as $link => $label)
  //   {
  //     $this->showMenuItem($link, $label);
  //   }
  //   echo '</ul>' . PHP_EOL;
  //   echo '</nav>' . PHP_EOL;
  // }

  // private function showMenu()
  // {
  //   // Default menu items
  //   $menuItems = [
  //     'home' => 'Home',
  //     'about' => 'About',
  //     'contact' => 'Contact',
  //     'webshop' => 'Webshop',
  //     'top5' => 'Top 5'
  //   ];

  //   // Check if the user is logged in
  //   if ($this->model->getData('isLoggedIn'))
  //   {
  //     // Add 'Logout' and other user-specific items to the menu
  //     $menuItems['shoppingcart'] = 'ShoppingCart';
  //     $menuItems['logout'] = 'Logout[' . $this->model->getData('userName') . ']'; // Assuming userName is set in the model
  //     $menuItems['change_password'] = 'Change Password';
  //   } else
  //   {
  //     // Add 'Register' and 'Login' to the menu for guests
  //     $menuItems['register'] = 'Register';
  //     $menuItems['login'] = 'Login';
  //   }

  //   echo '<nav>' . PHP_EOL;
  //   echo '<ul class="menu">' . PHP_EOL;
  //   foreach ($menuItems as $link => $label)
  //   {
  //     $this->showMenuItem($link, $label);
  //   }
  //   echo '</ul>' . PHP_EOL;
  //   echo '</nav>' . PHP_EOL;
  // }

  private function showMenu()
  {
    $this->model->showMenu();
    // $menuItems = [
    //   'home' => 'Home',
    //   'about' => 'About',
    //   'contact' => 'Contact',
    //   'webshop' => 'Webshop',
    //   'top5' => 'Top 5'
    // ];

    // if ($this->model->getData('isLoggedIn'))
    // {
    //   $menuItems['shoppingcart'] = 'ShoppingCart';
    //   $menuItems['logout'] = 'Logout[' . $this->model->getData('userName') . ']';
    //   $menuItems['change_password'] = 'Change Password';
    // } else
    // {
    //   $menuItems['register'] = 'Register';
    //   $menuItems['login'] = 'Login';
    // }

    // echo '<nav>' . PHP_EOL;
    // echo '<ul class="menu">' . PHP_EOL;
    // foreach ($menuItems as $link => $label)
    // {
    //   $this->showMenuItem($link, $label);
    // }
    // echo '</ul>' . PHP_EOL;
    // echo '</nav>' . PHP_EOL;
  }



  protected function showContent()
  {

  }

  private function showFooter()
  {
    echo "<footer>";
    echo "<p>&copy; Amr Adwan 2023</p>";
    echo "</footer>";
  }

  abstract protected function showForm();

  abstract protected function getError($form, $key);
}
?>