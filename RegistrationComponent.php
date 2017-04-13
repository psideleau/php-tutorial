<?php
namespace Treehouse;


class RegistrationComponent
{
    private  $method;
    private  $action;
    private  $validate = true;

    function __construct(string $method, string $action) {
        $this->method = $method;
        $this->action = $action;
    }

    function enableValidation(bool $enabled) {
        $this->validate = $enabled;
    }

    function createFormElement() {
        $noValidateHtml5 = $this->validate ? "" : " novalidate";
        return "<form method=\"$this->method\" action=\"$this->action\"$noValidateHtml5>";
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