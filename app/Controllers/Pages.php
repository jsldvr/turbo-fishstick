<?php
/**
 * Learning CodeIgniter
 * @author jorge
 */

/**
 * Pages App Controller
 * 
 * You have created a class named Pages, with a `view()` method that accepts one 
 * argument named `$page`. It also has an `index()` method, the same as the 
 * default controller found in `app/Controllers/Home.php;` that method displays 
 * the CodeIgniter welcome page.
 */

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

/**
 * Pages
 * 
 * Note: There are two `view()` functions referred to in this tutorial. One is 
 * the class method created with `public function view($page = 'home')` and 
 * `return view('welcome_message')` for displaying a view. Both are technically 
 * a function. But when you create a function in a class, it’s called a method.
 * 
 * The Pages class is extending the BaseController class that extends the 
 * CodeIgniter\Controller class. This means that the new Pages class can 
 * access the methods and properties defined in the CodeIgniter\Controller 
 * class (system/Controller.php).
 * 
 * The controller is what will become the center of every request to your web 
 * application. Like any PHP class, you refer to it within your controllers 
 * as $this.
 */

class Pages extends BaseController
{
    public function view($page = 'home')
    {
        // check whether the requested page actually exists
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer');
    }
}