<?php

namespace App\Helper;

class RegexConstant
{
    const REGEXPHONE = '/^[0-9]{10,12}$/';

    const REGEXEMAIL = '/^([a-z0-9+-]+)(.[a-z0-9+_-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/ix';
}
