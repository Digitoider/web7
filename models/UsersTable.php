<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 22.05.2017
 * Time: 20:55
 */
require_once 'libs/ActiveRecord.php';
class UsersTable extends ActiveRecord
{
    public static $table = 'users';
}