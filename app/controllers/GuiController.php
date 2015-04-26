<?php

class GuiController extends \BaseController {

    public function changePassword() {
        return View::make('ui.changePassword');
    }
}
