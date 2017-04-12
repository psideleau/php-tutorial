<?php
/**
 * Created by PhpStorm.
 * User: paulsideleau
 * Date: 4/11/17
 * Time: 7:39 PM
 */

namespace Treehouse;


class Registration
{
    private  $method;
    private  $action;

    function __construct(string $method, string $action) {
        $this->method = $method;
        $this->action = $action;
    }

    function createFormElement() {
        return "<form method=\"$this->method\" action=\"$this->action\" novalidate>";
    }

    function displayForm() {
        $form = $this->createFormElement();
        echo <<<EOD
        $form
           <label for="name">Name</label>
           <input type="text" name="name" id="name" required maxlength="100">
           <label for="name">email</label>
           <input type="email" name="email" id="email" required>
           <input type="submit" name="submit" value="Log In"/>
        </form>
EOD;

    }

}