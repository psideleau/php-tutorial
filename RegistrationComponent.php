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
        return "<form class=\"form\" method=\"$this->method\" action=\"$this->action\"$noValidateHtml5>";
    }

    function displayForm() {
        $form = $this->createFormElement();
        echo <<<EOD
        $form
           <div class="form-group">
               <label for="name">Name:</label>
               <input type="text" name="name" id="name" required maxlength="100">
           </div>
           <div class="form-group">
               <label class="control-label" for="name">Email:</label>
               <input type="email" name="email" id="email" required>
           </div>
           <input type="submit" name="submit" value="Register" class="btn btn-primary"/>
        </form>
EOD;

    }

}