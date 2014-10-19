<?php
/**
 * Created by PhpStorm.
 * User: usama_000
 * Date: 10/19/14
 * Time: 5:20 PM
 */

namespace Lib\Messages;

class MsgSys {
    public function __construct($msgType, $msgText) {
        Session::flash('messages', $$msgType);
        Sesson::flash('msgText', $msgText);
    }
}